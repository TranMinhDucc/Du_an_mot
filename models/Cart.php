<?php
    require_once '../connect/connect.php';

class Cart extends connect
{
    public function getAllCart()
    {
        $sql = 'SELECT 
                cart_items.cart_id as cart_id,
                cart_items.quantity as quantity,
                products.name AS product_name,
                products.slug AS product_slug,
                products.images AS product_image,
                products_variants.price AS variant_price, 
                products_variants.sale_price AS variant_sale_price,
                variant_weights.weight AS variant_weight_name
        FROM cart_items
            LEFT JOIN products ON cart_items.product_id = products.id   
            LEFT JOIN products_variants ON products_variants.product_id = products.id
            LEFT JOIN variant_weights ON products_variants.variant_weight_id = variant_weights.id

        WHERE cart_items.user_id = ?
        ';

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addToCart($user_id, $product_id, $variant_id, $quantity)
    {
        $sql = 'INSERT INTO cart_items(user_id, product_id, variant_id, quantity) values(?,?,?,?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$user_id, $product_id, $variant_id, $quantity]);
    }

    public function checkCart() {
        $sql = 'SELECT * FROM cart_items WHERE user_id = ? AND product_id = ? AND variant_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['id'], $_POST['product_id'], $_POST['variant_id']]);
        return $stmt -> fetch();
    }

    public function updateCart($user_id, $product_id, $variant_id, $quantity) {
        $sql = 'UPDATE cart_items SET quantity = ? WHERE user_id = ? AND product_id = ? AND variant_id =?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$quantity, $user_id, $product_id, $variant_id]);
    }
    
    public function updateCartById($cart_id, $quantity) {
        $sql = 'UPDATE cart_items SET quantity = ? WHERE cart_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$quantity, $cart_id]);
    }

    public function deleteCart($cart_id) {
        $sql = 'DELETE FROM cart_items WHERE cart_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$cart_id]);
    } 
    
    public function getCouponByCode($coupon_code) {
        $sql = 'SELECT * FROM coupons WHERE coupons_code = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$coupon_code]);
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }
}
