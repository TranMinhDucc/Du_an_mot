<?php
session_start();
require_once '../controllers/admin/CategoryController.php';
require_once '../controllers/admin/ProductController.php';
require_once '../controllers/admin/AdminLienHeController.php';
require_once '../controllers/admin/UserController.php';
require_once '../controllers/admin/DashboardController.php';
require_once '../controllers/admin/SettingController.php';
require_once '../models/Settings.php';
require_once '../controllers/client/HomeController.php';
require_once '../controllers/client/AuthController.php';
require_once '../controllers/client/ProfileController.php';
require_once '../controllers/client/CartController.php';
require_once '../controllers/client/LienHeController.php';
$action = isset($_GET['act']) ? $_GET['act'] : 'client';
$categoryAdmin = new CategoryController();
$userAdmin = new UserController();
$productAdmin = new ProductController();
$profile = new ProfileController();
$dashboard = new DashboardController();
$setting = new SettingController();
$cart = new CartController();
$lienhe= new AdminLienHeController();
//========================== CLIENT
$auth = new authController();
$home = new HomeController();
$lienHeController = new LienHeController();
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
    case 'users':
        $userAdmin->index();
        break;
    case 'user-create':
        $userAdmin->addUser();
        break;
    case 'create':
        $userAdmin->createUser();
        break;
    case 'user-edit':
        $userAdmin->updateUser();
    case 'setting':
        $setting->index();
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
    case 'update-password';
        $profile->updatePassProfile();
        break;
    case 'logout';
        $profile->logout();
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
        case 'userLienHe':
            $lienHeController->formLienHe();
         break;
    case 'postLienHe':
            $lienHeController->postLienHe();
        break;
     case 'successLienHe':
            $lienHeController->lienHeSuccess();
        break;
    
    case 'lienhe':
            $lienhe->danhSachLienHe();
        break;
    
    case 'chitietlienhe':
            $chitietlienhe->chiTietLienHe();
         break;
    case 'sualienhe':
             $sualienhe->postEditLienHe();
        break;
    case 'xoalienhe':
            $xoalienhe->deleteLienHe();
        break;
    case 'formsualienhe':
            $formsualienhe->formEditLienHe();
        break;
}
