<?php require_once 'functions/helpers.php' ?>
<?php require_once 'functions/pdo_connection.php';
session_start();

//get category posts
if ((isset($_GET['category_id']) && !empty($_GET['category_id']))) {
    global $pdo;
    $query = "select posts.* , categories.name as category_name  from posts join categories on 
    posts.category_id = categories.id where posts.status = 1 and posts.category_id  = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['category_id']]);
    $posts = $stmt->fetchAll();
    $notFound = false;
    if (!$posts) {
        $notFound = true;
    }
} else {
    $notFound = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'layouts/header.php' ?>
</head>
<body>
<section id="app">
    <?php require_once "layouts/top-nav.php" ?>


    <section class="container my-5">
        <?php
        if ($notFound == false) {
            foreach ($posts as $post) { ?>
                <section class="row">
                    <section class="col-12">
                        <h1><?= $post->category_name ?></h1>
                        <hr>
                    </section>
                </section>
                <section class="row">

                    <section class="col-md-4">
                        <section class="mb-2 overflow-hidden" style="max-height: 15rem;">
                            <img class="img-fluid" src="<?= asset($post->image) ?>" alt="">
                        </section>
                        <h2 class="h5 text-truncate"><?= $post->title ?></h2>
                        <p><?= substr($post->body , 0 ,80) ?></p>
                        <p><a class="btn btn-primary" href="<?= url('show-post.php?post_id' .$post->id) ?>" role="button">View details »</a></p>
                    </section>

                </section>
            <?php }}else{ ?>
            <section class="row">
                <section class="col-12">
                    <h1>Category not found</h1>
                </section>
            </section>
       <?php } ?>

    </section>
</section>
<?php require_once 'layouts/scripts.php' ?>
</body>
</html>