<?php
session_start();
// Danh sách các hành động không yêu cầu đăng nhập
$allowed_routes = ['client', 'login', 'register', 'products', 'product-detail'];


// Danh sách các hành động phải là admin mới vào được
$admin_routes = [
    'admin', 'product', 'product-create', 'product-store', 'product-edit', 
    'product-update', 'product-variant-delete', 'product-delete', 'category',
    'category-create', 'category-edit', 'category-delete', 'users', 
    'user-create', 'create', 'user-edit', 'setting', 'coupon', 'coupon-create', 
    'coupon-edit', 'coupon-update', 'coupon-delete', 'lienhe', 'chitietlienhe', 
    'sualienhe', 'xoalienhe', 'formsualienhe'
];
// Lấy hành động hiện tại từ URL
$action = isset($_GET['act']) ? $_GET['act'] : 'client';

// Kiểm tra nếu chưa đăng nhập và truy cập hành động yêu cầu quyền
if (!isset($_SESSION['user']) && !in_array($action, $allowed_routes)) {
    $_SESSION['error'] = 'Vui lòng đăng nhập để sử dụng chức năng';
    header('Location: index.php?act=login');
    exit;
}

// Kiểm tra quyền hạn nếu cần (ví dụ admin)
if (in_array($action, $admin_routes)) {
    if (!isset($_SESSION['user']) || (int)$_SESSION['user']['role_id'] != 3) {
        $_SESSION['error'] = 'Bạn không có quyền truy cập chức năng này.';
        header('Location: index.php?act=client'); // Chuyển hướng đến trang client
        exit;
    }
}


require_once '../controllers/admin/CategoryController.php';
require_once '../controllers/admin/ProductController.php';
require_once '../controllers/admin/AdminLienHeController.php';
require_once '../controllers/admin/UserController.php';
require_once '../controllers/admin/DashboardController.php';
require_once '../controllers/admin/SettingController.php';
require_once '../controllers/admin/CouponAdminController.php';
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
$couponAdmin = new CouponAdminController();


$profile = new ProfileController();
$dashboard = new DashboardController();
$setting = new SettingController();
$cart = new CartController();
$lienhe = new AdminLienHeController();
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
        include '../views/client/checkout/checkout.php';
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
