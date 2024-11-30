<?php

class AdminLienHeModel extends connect {

        public function insertLienhe($fullname,$email,$phone,$title, $detail) {
        try {
            $sql = 'INSERT INTO lien_he (fullname, email, phone,title,detail) VALUES (:fullname, :email, :phone,:title,:detail)';

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
    public function getAllLienhe() {
        try {
            $sql = 'SELECT * FROM lien_he ORDER BY created_at DESC';

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return [];
        }
    }

    public function getOneLienhe($id) {
        try {
            $sql = 'SELECT * FROM lien_he WHERE id = :id';

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return null;
        }
    }

    
    public function updateLienhe($id, $detail) {
        try {
            $sql = 'UPDATE lien_he SET detail = :detail WHERE id = :id';

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':detail' => $detail
            ]);

            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

 
    public function destroyLienhe($id) {
        try {
            $sql = 'DELETE FROM lien_he WHERE id = :id';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }
    


    
}