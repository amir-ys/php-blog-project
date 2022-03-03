<?php

try {
    $option = [ PDO::ATTR_ERRMODE => Pdo::ERRMODE_EXCEPTION ,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ  ];

    $pdo = new PDO("mysql:host=localhost;dbname=php_blog_project" , 'root' , '');

     return $pdo ;

}catch (PDOException $e){
    echo 'error: ' . $e->getMessage() ;
}