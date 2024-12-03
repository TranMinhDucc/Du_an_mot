<?php
require_once '../connect/connect.php';
class Dashboard extends Connect
{
    public function CountUser()
    {
        $sql = "SELECT COUNT(id) AS count_user FROM users;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function CountUserToday()
    {
        $sql = "SELECT COUNT(id) AS count_user FROM users WHERE created_at >= CURDATE() AND created_at < CURDATE() + INTERVAL 1 DAY;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function CountOrder()
    {
        $sql = "SELECT COUNT(order_detail_id ) AS count_order FROM order_detail;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function CountOrderToday()
    {
        $sql = "
            SELECT COUNT(order_detail_id) AS count_order
            FROM order_detail
            WHERE created_at >= CURDATE() AND created_at < CURDATE() + INTERVAL 1 DAY;
        ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function countRevenueAll(){
        $sql = "
            SELECT SUM(amount) AS totalAmountOrder
            FROM order_detail
        ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function countRevenueToday()
    {
        $sql = "
            SELECT SUM(amount) AS totalAmountOrder
            FROM order_detail
            WHERE created_at >= CURDATE() AND created_at < CURDATE() + INTERVAL 1 DAY;
        ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
