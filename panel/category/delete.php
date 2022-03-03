<?php
require_once '../../functions/pdo_connection.php' ;
require_once '../../functions/helpers.php';

global $pdo;

if ((isset($_GET['category_id']) && !empty($_GET['category_id']))) {
    $query = "delete from categories where id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['category_id']]);
    redirect('panel/category');
}else{
    redirect('panel/category');
}