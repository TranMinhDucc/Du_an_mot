<?php
require_once '../connect/connect.php';
class UsersAdmin extends connect
{
    public function listUser()
    {
        $sql = 'SELECT * FROM `users`';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function Role()
    {
        $sql = 'SELECT * FROM `role`';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function create($name,$email, $password, $role_id)
    {
        $spl = 'INSERT INTO users(name, email, password, role_id) VALUES (?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($spl);
        return $stmt->execute([$name,$email, $password, $role_id]);
    }
    public function update($name, $address, $email, $phone, $password, $role_id, $id)
    {
        $sql = 'UPDATE users SET name = ?,  address = ?, email = ?, phone = ?, password = ?, role_id = ? WHERE id = ?';

        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $address, $email, $phone, $password, $role_id, $id]);
    }
    public function detail()
    {
        $sql = 'select * from users where id=?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function checkEmail($email){
        echo $sql = 'SELECT * FROM users WHERE email=? LIMIT 1';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
