<?php
require_once '../connect/connect.php';
class Order extends Connect
{
    public function addOrder(
        $user_id,
        $product_id,
        $variant_id,
        $order_detail_id,
        $quantity
    ) {
        $sql = 'INSERT INTO orders(user_id, product_id, variant_id, order_detail_id, quantity,created_at, updated_at) value(?, ?, ?, ?, ?, now(), now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_SESSION['user']['user_id'], $product_id, $variant_id, $order_detail_id, $quantity]);
    }
    public function addOrderDetail($name, $email, $phone, $address, $amount, $note, $user_id, $coupon_id, $shipping_id)
    {
        $sql = 'INSERT INTO order_detail(name, email, phone, address, amount, note, user_id, coupon_id, shipping_id, created_at, updated_at	) value (?, ?, ?, ?, ?, ?, ?, ?, ?, now(), now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $email, $phone, $address, $amount, $note, $user_id, $coupon_id, $shipping_id]);
    }
}
