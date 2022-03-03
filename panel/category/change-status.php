<?php
require_once '../../functions/pdo_connection.php' ;
require_once '../../functions/helpers.php';

global $pdo;

if ((isset($_GET['category_id']))) {
    $query = "select status from categories  where id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['category_id']]);
    $category = $stmt->fetch();


    $query = "update categories set status = ?  where id = ?";
    $stmt = $pdo->prepare($query);
    if ($category->status == 1){
    $stmt->execute([ 0 ,  $_GET['category_id']]);
    }elseif($category->status == 0){
    $stmt->execute([ 1 ,  $_GET['category_id']]);
    }
    redirect('panel/category');
}else{
    redirect('panel/category');
}