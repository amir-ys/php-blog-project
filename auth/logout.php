<?php
require_once '../functions/helpers.php';
session_start();

if (isset($_SESSION['user'])){
    session_destroy();
    redirect('index.php');
}