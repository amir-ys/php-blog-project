<?php require_once  '../../functions/helpers.php' ?>
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

                <form action="create.php" method="post">
                    <section class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name ...">
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