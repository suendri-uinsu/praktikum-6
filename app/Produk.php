<?php

class Produk extends Koneksi
{

    public function tampil()
    {
        $sql = "SELECT p.*, k.kat_nama as KAT
                FROM tb_produk p
                INNER JOIN tb_kategori k
                ON p.produk_id_kat=k.kat_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];

        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
        }

        return $data;
    }

    public function simpan()
    {

        $produk_id_kat = $_POST['produk_id_kat'];
        $produk_id_user = $_SESSION['user_id'];
        $produk_kode = $_POST['produk_kode'];
        $produk_nama = $_POST['produk_nama'];
        $produk_hrg = $_POST['produk_hrg'];
        $produk_keterangan = $_POST['produk_keterangan'];
        $produk_stock = $_POST['produk_stock'];

        if (isset($_FILES['produk_photo'])) {

            $file_name = $_FILES['produk_photo']['name'];
            $file_tmp = $_FILES['produk_photo']['tmp_name'];
            $file_ext = strtolower(end(explode('.', $_FILES['produk_photo']['name'])));

            $file_name_new = md5(time() . $file_name) . '.' . $file_ext;

            $file_dir = "layouts/uploads/";

            if (move_uploaded_file($file_tmp, $file_dir . $file_name_new)) {
                $sql = "INSERT INTO tb_produk (
                    produk_id_kat,
                    produk_id_user,
                    produk_kode,
                    produk_nama,
                    produk_hrg,    
                    produk_keterangan,
                    produk_stock,
                    produk_photo)
                    VALUES (
                    :produk_id_kat,
                    :produk_id_user,
                    :produk_kode,
                    :produk_nama,
                    :produk_hrg,
                    :produk_keterangan,
                    :produk_stock,
                    :produk_photo)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":produk_id_kat", $produk_id_kat);
                $stmt->bindParam(":produk_id_user", $produk_id_user);
                $stmt->bindParam(":produk_kode", $produk_kode);
                $stmt->bindParam(":produk_nama", $produk_nama);
                $stmt->bindParam(":produk_hrg", $produk_hrg);
                $stmt->bindParam(":produk_keterangan", $produk_keterangan);
                $stmt->bindParam(":produk_stock", $produk_stock);
                $stmt->bindParam(":produk_photo", $file_name_new);
                $stmt->execute();
            }
        } else {
            $sql = "INSERT INTO tb_produk (
                produk_id_kat,
                produk_id_user,
                produk_kode,
                produk_nama,
                produk_hrg,    
                produk_keterangan,
                produk_stock)
                VALUES (
                :produk_id_kat,
                :produk_id_user,
                :produk_kode,
                :produk_nama,
                :produk_hrg,
                :produk_keterangan,
                :produk_stock)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":produk_id_kat", $produk_id_kat);
            $stmt->bindParam(":produk_id_user", $produk_id_user);
            $stmt->bindParam(":produk_kode", $produk_kode);
            $stmt->bindParam(":produk_nama", $produk_nama);
            $stmt->bindParam(":produk_hrg", $produk_hrg);
            $stmt->bindParam(":produk_keterangan", $produk_keterangan);
            $stmt->bindParam(":produk_stock", $produk_stock);
            $stmt->execute();
        }    
    }

    public function edit($id)
    {

        $sql = "SELECT * FROM tb_produk WHERE produk_id=:produk_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":produk_id", $id);
        $stmt->execute();

        $row = $stmt->fetch();

        return $row;
    }

    public function update()
    {
        $produk_id_kat = $_POST['produk_id_kat'];
        $produk_id_user = $_POST['produk_id_user'];
        $produk_kode = $_POST['produk_kode'];
        $produk_nama = $_POST['produk_nama'];
        $produk_hrg = $_POST['produk_hrg'];
        $produk_keterangan = $_POST['produk_keterangan'];
        $produk_stock = $_POST['produk_stock'];
        $produk_photo = $_POST['produk_photo'];
        $produk_id = $_POST['produk_id'];

        $sql = "UPDATE tb_produk SET 
            produk_id_kat=:produk_id_kat,
            produk_id_user=:produk_id_user,
            produk_kode=:produk_kode,
            produk_nama=:produk_nama,
            produk_hrg=:produk_hrg,    
            produk_keterangan=:produk_keterangan,
            produk_stock=:produk_stock,
            produk_photo=:produk_photo
        WHERE produk_id=:produk_id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":produk_id_kat", $produk_id_kat);
        $stmt->bindParam(":produk_id_user", $produk_id_user);
        $stmt->bindParam(":produk_kode", $produk_kode);
        $stmt->bindParam(":produk_nama", $produk_nama);
        $stmt->bindParam(":produk_hrg", $produk_hrg);
        $stmt->bindParam(":produk_keterangan", $produk_keterangan);
        $stmt->bindParam(":produk_stock", $produk_stock);
        $stmt->bindParam(":produk_photo", $produk_photo);
        $stmt->bindParam(":produk_id", $produk_id);
        $stmt->execute();
    }

    public function delete($id)
    {

        $sql = "DELETE FROM tb_produk WHERE produk_id=:produk_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":produk_id", $id);
        $stmt->execute();
    }
}
