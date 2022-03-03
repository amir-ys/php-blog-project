<?php


//config
define('BASE_URL' , 'http://localhost/www/php_blog_project/');

//helpers


//redirect
function redirect ($url){
    header( "location:" . trim(BASE_URL , '/ ') . '/' . trim($url , '/ '));
}

//url
function url($url){
    return  trim(BASE_URL , '/ ') . '/' . trim($url , '/ ');
}

//asset
function asset($file){
    return  trim(BASE_URL , '/ ') . '/' . trim($file , '/ ');
}

//die dump
function dd($value){
    echo '<pre>' ;
    var_dump($value);
    die();
}