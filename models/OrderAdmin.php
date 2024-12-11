<?php
require_once '../connect/connect.php';

class Orders extends connect
{
    public function listOrder()
    {
        $sql = "SELECT * FROM order_detail ORDER BY order_detail_id  DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function update($status, $id)
    {
        $sql = "UPDATE order_detail SET status=? WHERE order_detail_id=?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$status, $id]);
    }

    public function status()
    {

        $order_detail_id = $_GET['id'];

        $sql = "SELECT * FROM order_detail WHERE order_detail_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
