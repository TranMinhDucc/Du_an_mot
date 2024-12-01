<?php

require_once '../models/Cart.php';
require_once '../models/Ship.php';
require_once '../models/User.php';
class OrderController
{
    protected $cart;
    protected $ship;
    protected $user;
    public function __construct()
    {
        $this->cart = new Cart();
        $this->ship = new Ship();
        $this->user = new User();
    }
    public function index()
    {
        $user = $this->user->getUserById($_SESSION['user']['id']);
        $ships = $this->ship->getAllShip();
        $carts = $this->cart->getAllCart();


        include '../views/client/checkout/checkout.php';
    }
}
