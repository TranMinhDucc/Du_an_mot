<?php

require_once '../connect/connect.php';
class Coupon extends connect
{
    public function listCoupon()
    {
        $sql = 'SELECT * FROM coupons';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCoupon($name, $coupons_type, $coupons_code, $start_date, $end_date, $quantity, $coupon_value, $status) {
        $sql = 'INSERT INTO coupons( name, coupons_type, coupons_code, start_date, end_date, quantity, coupon_value, status, created_at, updated_at) value ( ?, ?, ?, ?, ?, ?, ?, ?, now(), now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $coupons_type, $coupons_code, $start_date, $end_date, $quantity, $coupon_value, $status]);
    }

    public function editCoupon() {
        $sql = 'SELECT * FROM coupons WHERE coupon_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['coupon_id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCoupon($name, $coupons_type, $coupons_code, $start_date, $end_date, $quantity, $coupon_value, $status) {
        $sql = 'UPDATE coupons SET name = ?, coupons_type = ?, coupons_code = ?, start_date = ?, end_date = ? , quantity = ?, coupon_value = ?, status = ?, updated_at = now() WHERE coupon_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $coupons_type, $coupons_code, $start_date, $end_date, $quantity, $coupon_value, $status, $_GET['coupon_id']]);
    }

    public function deleteCoupon() {
        $sql = 'DELETE FROM coupons WHERE coupon_id =?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['coupon_id']]);
    }
}
