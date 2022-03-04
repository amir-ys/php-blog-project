<?php require_once  '../../functions/helpers.php' ?>
<?php require_once  '../../functions/pdo_connection.php' ?>
<?php
require_once '../../functions/check-login.php';
global $pdo;

if ((isset($_GET['post_id']) && !empty($_GET['post_id']))) {
    $path = dirname(dirname(__DIR__));

    //get post
    global $pdo;
    $query = "select * from posts where id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['post_id']]);
    $post = $stmt->fetch();

    if (!$post){
        redirect('panel/post');
    }
    if (file_exists($path . $post->image)){
        unlink($path . $post->image);
    }


        $query = "delete from posts where id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['post_id']]);
    redirect('panel/post');
} else {
    redirect('panel/post');
}