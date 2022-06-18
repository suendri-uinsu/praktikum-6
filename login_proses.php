<?php 

require_once "inc/Koneksi.php";
require_once "app/Login.php";

$lgn = new Login();

if (isset($_POST['b_login'])) {
    $lgn->login();
    header("location:index.php");
}

if (isset($_POST['b_logout'])) {
    $lgn->logout();
    header("location:index.php");
}
