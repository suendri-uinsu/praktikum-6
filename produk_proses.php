<?php 

require_once "inc/Koneksi.php";
require_once "app/Produk.php";

session_start();

$prd = new Produk();

if (isset($_POST['b_simpan'])) {
    $prd->simpan();
    header("location:index.php?p=produk");
}

if (isset($_POST['btn_update'])) {
    $prd->update();
    header("location:index.php?p=produk");
}