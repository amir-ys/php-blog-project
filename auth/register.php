<?php
require_once '../functions/pdo_connection.php' ;
require_once '../functions/helpers.php'; ?>
<?php

if ((isset($_POST['email']) && !empty($_POST['email']))
&& isset($_POST['first_name']) && !empty($_POST['first_name'])
&& isset($_POST['last_name']) && !empty($_POST['last_name'])
&& isset($_POST['password']) && !empty($_POST['password'])
&& isset($_POST['confirm']) && !empty($_POST['confirm'])
) {
    global $pdo;
    //check password && confirm is correct
    if ($_POST['password'] == $_POST['confirm']) {
        //check password length
        if (strlen($_POST['password']) >= 6){
            //check email is unique
            $query = "select * from users  where email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$_POST['email']]);
        $user = $stmt->fetch();
        if (!$user && $user->email != $_POST['email']) {
            //store user in db
            $query = "insert into users(email , first_name , last_name , password , created_at )  values(? , ? , ?  ,? , now())";
            $stmt = $pdo->prepare($query);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->execute([$_POST['email'], $_POST['first_name'], $_POST['last_name'], $password]);
            //redirect user to login
            redirect('auth/login.php');
        } else {
        $error = 'شما از قبل ثبت نام کرده اید.';
        }
    }else{
        $error = 'فیلد رمز عبور باید 6 رقم باشد.';
        }
    }else{
        $error = 'فیلد رمز عبور با فیلد تکرار رمز عبور مطابقت ندارد.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once '../../functions/check-login.php' ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP blog panel</title>
        <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css') ?>" media="all" type="text/css">
        <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>" media="all" type="text/css">
    </head></head>

<body>
<section id="app">

    <?php if (isset($error)) echo $error; ?>

    <section style="height: 100vh; background-color: #138496;" class="d-flex justify-content-center align-items-center">
        <section style="width: 20rem;">
            <h1 class="bg-warning rounded-top px-2 mb-0 py-3 h5">PHP Tutorial login</h1>
            <section class="bg-light my-0 px-2"><small class="text-danger"></small></section>
            <form class="pt-3 pb-1 px-2 bg-light rounded-bottom" action="<?= url('auth/register.php') ?>" method="post">
                <section class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email ...">
                </section>
                <section class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first_name ...">
                </section>
                <section class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last_name ...">
                </section>
                <section class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password ...">
                </section>
                <section class="form-group">
                    <label for="confirm">Confirm</label>
                    <input type="password" class="form-control" name="confirm" id="confirm" placeholder="confirm ...">
                </section>
                <section class="mt-4 mb-2 d-flex justify-content-between">
                    <input type="submit" class="btn btn-success btn-sm" value="register">
                    <a class="" href="">login</a>
                </section>
            </form>
        </section>
    </section>

</section>
<?php require_once  '../panel/layouts/scripts.php'?>

</body>

</html>