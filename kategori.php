<?php

require_once "inc/Koneksi.php";
require_once "app/Kategori.php";

$kat = new Kategori();
$rows = $kat->tampil();

?>
<div class="title">
    <h2>Daftar Kategori</h2>
    <a href="index.php?p=kat_input">Tambah Kategori</a>
</div>

<table>
    <tr>
        <th>NO</th>
        <th>NAMA</th>
        <th>KETERANGAN</th>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>
    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['kat_id']; ?></td>
            <td><?php echo $row['kat_nama']; ?></td>
            <td><?php echo $row['kat_keterangan']; ?></td>
            <td><a href="kat_edit.php?id=<?php echo $row['kat_id']; ?>">Edit</a></td>
            <td><a href="kat_delete.php?id=<?php echo $row['kat_id']; ?>">Delete</a></td>
        </tr>
    <?php } ?>
</table>