<?php require_once  'functions/helpers.php' ?>
<?php require_once  'functions/pdo_connection.php';
session_start(); ?>
<?php
global $pdo;
// get post
if ((isset($_GET['post_id']) && !empty($_GET['post_id']))) {
    $query = "select posts.* , categories.name as category_name  from posts
    join categories on posts.category_id = categories.id where posts.status = 1 and posts.id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['post_id']]);
    $post = $stmt->fetch();
    $notFound = false;
    if (!$post){
        $notFound = true;
    }
}else{
    $notFound = true;
}




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
            <?php if ($notFound == false) { ?>
            <section class="col-md-12">
                <h1><?= $post->title ?></h1>
                <h5 class="d-flex justify-content-between align-items-center">
                    <a href="<?= url('category.php?category_id=' . $post->category_id) ?>"><?= $post->category_name ?></a>
                    <span class="date-time"><?= $post->created_at ?></span>
                </h5>
                <article class="bg-article p-3">
                    <img class="float-right mb-2 ml-2" style="width: 18rem;" src="<?= asset($post->image) ?>" alt="">
                    <?= $post->body ?>
                </article>


            </section>
            <?php }else{ ?>
                <h2>post not found!</h2>
            <?php } ?>
        </section>
    </section>

</section>
<?php require_once  'layouts/scripts.php'?>
</body>
</html>