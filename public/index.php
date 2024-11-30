<?php
session_start();
require_once '../controllers/admin/CategoryController.php';
require_once '../controllers/admin/ProductController.php';
require_once '../controllers/admin/DashboardController.php';
require_once '../controllers/admin/SettingController.php';
require_once '../controllers/admin/CouponAdminController.php';
require_once '../models/Settings.php';
require_once '../controllers/client/HomeController.php';
require_once '../controllers/client/AuthController.php';
require_once '../controllers/client/ProfileController.php';
require_once '../controllers/client/CartController.php';
$action = isset($_GET['act']) ? $_GET['act'] : 'client';
$categoryAdmin = new CategoryController();
$productAdmin = new ProductController();
$couponAdmin = new CouponAdminController();


$profile = new ProfileController();
$dashboard = new DashboardController();
$setting = new SettingController();
$cart = new CartController();
//========================== CLIENT
$auth = new authController();
$home = new HomeController();
switch ($action) {
    case 'admin':
        $dashboard->index();
        break;
    case 'product':
        $productAdmin->index();
        break;
    case 'product-create':
        $productAdmin->create();
        break;
    case 'product-store':
        $productAdmin->store();
        break;
    case 'product-edit':
        $productAdmin->edit();
        break;
    case 'product-update':
        $productAdmin->update();
        break;
    case 'product-variant-delete':
        $productAdmin->deleteProductVariant();
        break;
    case 'product-delete':
        $productAdmin->deleteProduct();
        break;
    case 'category':
        $categoryAdmin->index();
        break;
    case 'category-create':
        $categoryAdmin->addCategory();
        break;
    case 'category-edit':
        $categoryAdmin->updateCategory();
        break;
    case 'category-delete':
        $categoryAdmin->deleteCategory($_GET['id']);
        break;
    case 'setting':
        $setting->index();
        break;
    case 'coupon':
        $couponAdmin->index();
        break;
    case 'coupon-create':
        $couponAdmin->create();
        break;
    case 'coupon-edit':
        $couponAdmin->edit();
        break;
    case 'coupon-update':
        $couponAdmin->update();
        break;
    case 'coupon-delete':
        $couponAdmin->delete();
        break;

        // ======================== CLIENT ===========================

    case 'client':
        $home->index();
        break;
    case 'product-detail':
        // include '../views/client/product-detail.php';
        $home->getProductDetail();
        break;
    case 'products':
        include '../views/client/products.php';
        break;
        // ======================== AUTH ===========================

    case 'register':
        $auth->registers();
        break;
    case 'login':
        $auth->signins();
        break;
        // ======================== USER ===========================
    case 'profile';
        include '../views/client/user/dashboard.php';
        break;
    case 'update-profile';
        $profile->updateProfile();
        break;
    case 'carts';
        $cart->index();
        break;
    case 'addToCart-byNow';
        $cart->addToCartOderByNow();
        break;
    case 'update-cart';
        $cart->update();
        break;
    case 'delete-cart';
        $cart->delete();
        break;
    case 'checkout';
        include '../views/client/checkout/checkout.php.php';
        break;
}
