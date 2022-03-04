<?php require_once  'functions/helpers.php' ?>
<?php require_once  'functions/pdo_connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once  'layouts/header.php'?>
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
                <p><a class="btn btn-primary" href="<?= url('show-post.php?post_id=' . $post->id)?>" role="button">View details »</a></p>
            </section>
            <?php endforeach;  ?>

        </section>
    </section>

</section>
<?php require_once  'layouts/scripts.php'?>
</body>
</html><?php
