<?php 

class Login extends Koneksi {

    public function login()
    {
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $sql = "SELECT * FROM tb_users WHERE user_email=:user_email AND user_password=PASSWORD(:user_password)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_email", $user_email);
        $stmt->bindParam(":user_password", $user_password);
        $stmt->execute();

        $row = $stmt->fetch();

        if ($stmt->rowCount() > 0) {

            session_start();

            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_nama'] = $row['user_nama'];
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
    }
}
