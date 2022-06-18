<?php

require_once "inc/Koneksi.php";
require_once "app/Kategori.php";

$kat = new Kategori();
$rows = $kat->tampil();

?>

<h2>Tambah Produk</h2>

<form action="produk_proses.php" method="POST">
    <table>
        <tr>
            <td>Kategori</td>
            <td>
                <select name="produk_id_kat">
                    <?php foreach ($rows as $row) { ?>
                        <option value="<?php echo $row['kat_id']; ?>"><?php echo $row['kat_nama']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Kode</td>
            <td><input type="text" name="produk_kode"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="produk_nama"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="produk_hrg"></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>
                <textarea name="produk_keterangan" cols="50" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td>Stock</td>
            <td><input type="text" name="produk_stock"></td>
        </tr>
        <tr>
            <td>Photo</td>
            <td><input type="file" name="produk_photo"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="b_simpan" value="SIMPAN"></td>
        </tr>
    </table>
</form>