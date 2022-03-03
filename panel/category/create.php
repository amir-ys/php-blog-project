<?php require_once  '../../functions/helpers.php' ?>
<?php require_once  '../../functions/pdo_connection.php' ?>
<?php
global $pdo ;
if ((isset($_POST['name']) && !empty($_POST['name'])) && isset($_POST['status']) && !empty($_POST['status'])){
$query = "insert into categories(name,status , created_at) values( ? , ? , now())";
$stmt = $pdo->prepare($query);
$stmt->execute([$_POST['name'] , $_POST['status']]);
redirect('panel/category');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../layouts/header.php'?>
</head>

<body>
<section id="app">
    <?php require_once '../layouts/top-nav.php' ?>

    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">
                <?php require_once '../layouts/sidebar.php' ?>

            </section>
            <section class="col-md-10 pt-3">

                <form action="<?= url('panel/create.php') ?>" method="post">
                    <section class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name ...">
                    </section>
                    <section class="form-group">
                        <label for="name">status</label>
                        <select name="status" class="form-control" >
                            <option value="1">enable</option>
                            <option value="0">disable</option>
                        </select>

                    </section>
                    <section class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </section>

                </form>

            </section>
        </section>
    </section>

</section>

<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
</body>

</html>