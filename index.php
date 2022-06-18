<?php

session_start();

if (isset($_SESSION['login']) and $_SESSION['login'] == true) {
    require_once "layouts/dashboard.php";
} else {
    require_once "layouts/home.php";
}
