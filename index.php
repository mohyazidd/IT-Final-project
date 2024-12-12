<?php

if(!isset($_SESSION['login'])) {
    header('location: ./auth/login.php');
    exit;
}

if(isset($_SESSION['login'])) {
    header('location: ./style/index.php');
    exit;
}