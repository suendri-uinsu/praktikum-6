<?php 

require_once "inc/Koneksi.php";
require_once "app/Kategori.php";

$id = $_GET['id'];

$kat = new Kategori();
$rows = $kat->delete($id);

?>

Data berhasil dihapus!

<a href="kat_tampil.php">Kembali</a>