<?php
require_once '../Connect/connect.php';
class LienHeModel extends connect {

   

    // Thêm một liên hệ của khách hàng vào cơ sở dữ liệu
    public function insertLienHe($fullname, $email,$phone,$title,$detail) {
        try {
            $sql = 'INSERT INTO lien_he (fullname, email,phone,title, detail) VALUES (:fullname, :email,:phone,:title, :detail)';

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([
                ':fullname' => $fullname,
                ':email' => $email,
                ':phone' => $phone,
                ':title' => $title,
                ':detail' => $detail
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

}
?>