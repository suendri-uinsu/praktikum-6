<?php 

require_once "inc/Koneksi.php";
require_once "app/Produk.php";

$produk = new Produk();
$rows = $produk->tampil();

?>

<a href="index.php?p=produk_input">Tambah Produk</a>
<table>
    <tr>
        <th>NO</th>
        <th>KATEGORI</th>
        <th>KODE</th>
        <th>NAMA</th>
        <th>HARGA</th>
        <th>STOCK</th>
        <th>DETAIL</th>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>
    <?php foreach ($rows as $row) { ?>
    <tr>
        <td><?php echo $row['produk_id']; ?></td>
        <td><?php echo $row['KAT']; ?></td>
        <td><?php echo $row['produk_kode']; ?></td>
        <td><?php echo $row['produk_nama']; ?></td>
        <td><?php echo $row['produk_hrg']; ?></td>
        <td><?php echo $row['produk_stock']; ?></td>
        <td><a href="index.php?p=produk_detail&id=<?php echo $row['produk_id']; ?>">Detail</a></td>
        <td><a href="index.php?p=produk_edit&id=<?php echo $row['produk_id']; ?>">Edit</a></td>
        <td><a href="index.php?p=produk_delete&id=<?php echo $row['produk_id']; ?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>
