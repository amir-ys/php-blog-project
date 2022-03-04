<?php require_once  '../../functions/helpers.php' ?>
<?php require_once  '../../functions/pdo_connection.php' ?>
<?php
global $pdo;

if ((isset($_GET['post_id']) && !empty($_GET['post_id']))) {
    $query = "delete from posts where id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['post_id']]);
    redirect('panel/post');
} else {
    redirect('panel/post');
}