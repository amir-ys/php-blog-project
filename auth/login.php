<?php  require_once '../functions/pdo_connection.php' ;
require_once '../functions/helpers.php'; ?>
<?php
session_start();

if (isset($_SESSION['user'])){
    redirect('panel');
}

if ((isset($_POST['email']) && !empty($_POST['email']))
    && isset($_POST['password']) && !empty($_POST['password'])
) {
    global $pdo;
    $query = "select * from users  where email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch();
    if ($user){
        if (password_verify($_POST['password'] , $user->password)){
            $_SESSION['user'] = $user->id;
            redirect('panel');
        }else{
            $error = 'فیلد ایمیل یا رمز عبور اشتباه هست' ;
        }
    }else{
        $error = 'فیلد ایمیل یا رمز عبور اشتباه هست';
    }
}else{
    if (!empty($_POST))
    $error = 'تمام فیلد ها اجبار ی است';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once  '../panel/layouts/header.php'?>
</head>

<body>
<section id="app">

    <section style="height: 100vh; background-color: #138496;" class="d-flex justify-content-center align-items-center">
        <section style="width: 20rem;">
            <h1 class="bg-warning rounded-top px-2 mb-0 py-3 h5">PHP Tutorial login</h1>
            <section class="bg-light my-0 px-2"><small class="text-danger">
                    <?php  if (isset($error)) echo $error ?>
                </small></section>
            <form class="pt-3 pb-1 px-2 bg-light rounded-bottom" action="" method="post">
                <section class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email ...">
                </section>
                <section class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password ...">
                </section>
                <section class="mt-4 mb-2 d-flex justify-content-between">
                    <input type="submit" class="btn btn-success btn-sm" value="login">
                    <a class="" href="<?= url('auth/register.php') ?>">register</a>
                </section>
            </form>
        </section>
    </section>

</section>
<?php require_once  '../panel/layouts/scripts.php'?>
</body>

</html>