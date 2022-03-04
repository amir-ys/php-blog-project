<?php
require_once '../../functions/check-login.php';
require_once '../../functions/pdo_connection.php' ;
require_once '../../functions/helpers.php';

global $pdo;

if ((isset($_GET['post_id']))) {
    $query = "select status from posts  where id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['post_id']]);
    $post = $stmt->fetch();


    $query = "update posts set status = ?  where id = ?";
    $stmt = $pdo->prepare($query);
    if ($post->status == 1){
        $stmt->execute([ 0 ,  $_GET['post_id']]);
    }elseif($post->status == 0){
        $stmt->execute([ 1 ,  $_GET['post_id']]);
    }
    redirect('panel/post');
}else{
    redirect('panel/post');
}