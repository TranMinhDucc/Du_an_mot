<?php
require_once '../Connect/connect.php';

class User extends connect
{

    public function register($name, $email, $password)
    {
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO users (name, email, password, role_id,created_at, updated_at) VALUES (?, ?, ?, 4, now(), now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $email, $hash_password]);
    }


    public function signin($email, $password)
    {
        $sql = 'SELECT * FROM users WHERE email = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    public function updateUser($name, $image, $address, $email, $phone, $gender)
    {
        $sql = 'UPDATE users SET name=?, avatar=?, address=?, email=?, phone=?, gender=?, updated_at = CURRENT_TIMESTAMP WHERE id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $image, $address, $email, $phone, $gender, $_SESSION['user']['id']]);
    }

    public function updatePassUser($newPassword)
    {
        $hash_password = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = 'UPDATE users SET password=?  WHERE id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$hash_password, $_SESSION['user']['id']]);
    }

    public function getUserById($id)
    {
        $sql = 'SELECT * FROM users WHERE id=?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function checkEmail($email)
    {
        $sql = 'SELECT * FROM users WHERE email=? LIMIT 1';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function infOrder(){
        $sql = '
            SELECT 
                order_detail.order_detail_id    AS order_id,
                order_detail.created_at         AS created_at,
                SUM(orders.quantity)            AS order_quantity,
                orders.user_id                  AS order_user_id,
                order_detail.status             AS order_status,
                order_detail.amount             AS total_amount
            FROM order_detail
            LEFT JOIN orders ON order_detail.order_detail_id = orders.order_detail_id
            WHERE orders.user_id = ?
            GROUP BY order_detail.order_detail_id,  orders.user_id, order_detail.status
            ORDER BY order_detail.created_at DESC


        ';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAllOrder(){
        $sql = '
            SELECT 
                COUNT(*) AS  countAllStatus
            FROM order_detail   
            WHERE user_id = ? 
        ';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['id']]);
        return $stmt->fetch();
    }

    public function countOrderDelivered(){
        $sql = '
            SELECT 
                status, COUNT(*) AS  totalStatus
            FROM order_detail   
            WHERE user_id = ? AND status = "Delivered"
        ';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['id']]);
        return $stmt->fetch();
    }
}
