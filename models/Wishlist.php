<?php
require_once '../connect/connect.php';
class wishlist extends Connect
{
    public function listWishlist()
    {
        $sql = 'SELECT
        products.* FROM favourites
        LEFT JOIN products ON favourites.product_id = products.id
        ';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addWishList()
    {
        $sql = 'INSERT INTO favourites(user_id, product_id, quantity, created_at) value(?, ?, 1, now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_SESSION['user']['id'], $_GET['product_id']]);
    }
    public function deleteWishList()
    {
        $sql = 'DELETE FROM favourites WHERE favourite_id =?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['favourite_id ']]);
    }
    public function checkWishlist()
    {
        $sql = 'SELECT * FROM favourites WHERE user_id=? AND product_id=?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['id'] ?? null, $_GET['product_id']]);
        return $stmt->fetch();
    }
}
