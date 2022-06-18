<?php 

require_once "inc/Koneksi.php";
require_once "app/Kategori.php";

$id = $_GET['id'];
$kat = new Kategori();

$row = $kat->edit($id);
?>


<form action="kat_proses.php" method="post">
    <input type="hidden" name="kat_id" value="<?php echo $row['kat_id']; ?>">
    <table>
        <tr>
            <td>NAMA</td>
            <td><input type="text" name="kat_nama" value="<?php echo $row['kat_nama']; ?>"></td>
        </tr>
        <tr>
            <td>KETERANGAN</td>
            <td><input type="text" name="kat_keterangan" value="<?php echo $row['kat_keterangan']; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn_update" value="UPDATE"></td>
        </tr>
    </table>
</form>