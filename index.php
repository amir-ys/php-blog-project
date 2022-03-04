<?php require_once  'functions/helpers.php' ?>
<?php require_once  'functions/pdo_connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP tutorial</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="all" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" media="all" type="text/css">
</head>
<body>
<section id="app">

    <?php require_once "layouts/top-nav.php"?>

    <section class="container my-5">
        <!-- Example row of columns -->
        <section class="row">
            <?php
            global $pdo;
            $query = 'select * from posts where status = 1 order by created_at desc';
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $posts = $stmt->fetchAll();
            ?>
            <?php foreach ($posts as $post): ?>
            <section class="col-md-4">
                <section class="mb-2 overflow-hidden" style="max-height: 15rem;">
                    <img class="img-fluid"  height="200" width="300" src="<?= asset($post->image) ?>" alt=""></section>
                <h2 class="h5 text-truncate"><?= $post->title ?></h2>
                <p><?= substr($post->body , 0 ,50) ?></p>
                <p><a class="btn btn-primary" href="" role="button">View details »</a></p>
            </section>
            <?php endforeach;  ?>

        </section>
    </section>

</section>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html><?php
