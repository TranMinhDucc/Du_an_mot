<?php
require_once '../models/Wishlist.php';
class WishlistController extends wishlist
{
    public function index()
    {
        $listWishlist = $this->listWishlist();

        include '../views/client/wishList.php';
    }
    public function add()
    {
        $checkWishlist = $this->checkWishlist();
        if ($checkWishlist) {
            $_SESSION['error'] = "Sản phẩm này đã có trong danh sách yêu thích";
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
        $addWishlist = $this->addWishList();
        if ($addWishlist) {
            $_SESSION['success'] = "Thêm sản phẩm yêu thích thành công!";
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            $_SESSION['error'] = "Thêm sản phẩm yêu thích không thành công!";
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
