<?php 
require_once '../Connect/connect.php';

class User extends connect {
   
    public function register($name, $email, $password) {
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO users (name, email, password, role_id) VALUES (?, ?, ?, 4)'; 
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $email, $hash_password]);
    }

   
    public function signin($email, $password) {
        $sql = 'SELECT * FROM users WHERE email = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user; 
        }
        return false;
    }

    public function updateUser($name, $image,$address, $email, $phone, $gender){
        $sql = 'UPDATE users SET name=?, avatar=?, address=?, email=?, phone=?, gender=? WHERE id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $image,$address, $email, $phone, $gender, $_SESSION['user']['id']]);
    }

    public function updatePassUser($newPassword){
        $hash_password = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = 'UPDATE users SET password=?  WHERE id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$hash_password, $_SESSION['user']['id']]);
    }
    
    public function getUserById($id){
        $sql = 'SELECT * FROM users WHERE id=?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function checkEmail($email){
        $sql = 'SELECT * FROM users WHERE email=? LIMIT 1';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
?>