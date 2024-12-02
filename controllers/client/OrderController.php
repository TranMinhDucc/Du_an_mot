<?php

require_once '../models/Cart.php';
require_once '../models/Ship.php';
require_once '../models/User.php';
require_once '../models/Order.php';
class OrderController
{
    protected $cart;
    protected $ship;
    protected $user;
    protected $order;
    public function __construct()
    {
        $this->cart = new Cart();
        $this->ship = new Ship();
        $this->user = new User();
        $this->order = new Order();
    }
    public function index()
    {
        $user = $this->user->getUserById($_SESSION['user']['id']);
        $ships = $this->ship->getAllShip();
        $carts = $this->cart->getAllCart();


        include '../views/client/checkout/checkout.php';
    }
    public function checkout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {

            $carts = $this->cart->getAllCart();
            // echo '<pre>';
            // print_r($carts);
            // print_r($_SESSION);
            // echo '<pre>';
            // die();
            // var_dump($_POST);
            // die();
            $orderdetail = $this->order->addOrderDetail(

                $_POST['name'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['address'],
                $_POST['amount'],
                $_POST['note'],

                $_SESSION['user']['id'],
                $_POST['shipping_id'],
                $_POST['coupon_id'] == '' ? null : $_POST['coupon_id'],


            );


            if ($orderdetail) {
                $orderdetail_id = $this->order->getLastInsert();

                foreach ($carts as $cart) {
                    $this->order->addOrder($cart['cart_user_id'], $cart['cart_product_id'], $cart['cart_variant_id'], $orderdetail_id, $cart['quantity']);
                    $this->cart->deleteCart($cart['cart_id']);
                }
                header("Location: ?act=client");
                $_SESSION['success'] = "Đặt hàng thành công";
                unset($_SESSION['coupon']);
                exit();
            } else {
                $_SESSION['success'] = "Đặt hàng không thành công";
                header("Location: /checkout");

                exit();
            }
        }
    }
}
