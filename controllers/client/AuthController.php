<?php
require_once '../models/User.php';
require_once '../models/Category.php';
require_once '../models/Settings.php';
class authController extends User
{
    protected $categories;
    protected $setting;
    public function __construct()
    {
        $this->categories   = new Category();
        $this->setting      = new Settings();
    }
    public function registers()
    {
        $categories = $this->categories->listCategory();
        $GLOBALS['settings'] = $this->setting->getAllSetting();
        $emailUser = isset($_POST['email']) ? $_POST['email'] : '';
        $checkEmail = $this->checkEmail($emailUser);
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên';
            }
            if($checkEmail){
                $errors['email'] = 'Email đã tồn tại. Vui lòng nhập địa chỉ email khác';
            }
            if (empty($_POST['email']) || $_POST['email'] == '') {
                $errors['email'] = 'Vui lòng nhập email';
            }
            if (empty($_POST['password']) || strlen($_POST['password']) < 6) {
                $errors['password'] = 'Vui lòng nhập mật khẩu (ít nhất 6 ký tự)';
            }
            if ($_POST['confirm_password'] !== $_POST['password']) {
                $errors['confirm_password'] = 'Mật khẩu nhập lại không khớp';
            } else if (empty($_POST['email'])) {
                $errors['confirm_password'] = 'Vui lòng nhập lại mật khẩu';
            }

            $_SESSION['errors'] = $errors;

            if (count($errors) > 0) {
                header('Location: ?act=register');
                exit();
            }

            $register = $this->register($_POST['name'], $_POST['email'], $_POST['password']);
            if ($register) {
                $_SESSION['success'] = 'Tạo tài khoản thành công. Vui lòng đăng nhập';
                header('Location: ?act=login');
                exit();
            } else {
                $_SESSION['error'] = 'Tạo tài khoản không thành công. Vui lòng thử lại';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }

            // $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // $register = $this->register(
            //     $_POST['name'],
            //     $_POST['phone'],
            //     $hashedPassword
            // );

            // if ($register) {
            //     $_SESSION['success'] = 'Tạo tài khoản thành công, vui lòng đăng nhập';
            //     header('Location: ?act=login');
            //     exit();
            // } else {
            //     $_SESSION['errors'] = ['Tạo tài khoản không thành công, vui lòng thử lại'];
            //     header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '?act=register'));
            //     exit();
            // }
        }

        include '../views/client/auth/register.php';
    }


    public function signins()
    {
        $categories = $this->categories->listCategory();
        $GLOBALS['settings'] = $this->setting->getAllSetting();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $errors = [];

            if (empty($_POST['email'])) {
                $errors['email'] = 'Vui lòng nhập email';
            }
            if (empty($_POST['password']) || strlen($_POST['password']) < 6) {
                $errors['password'] = 'Vui lòng nhập mật khẩu';
            }

            $_SESSION['errors'] = $errors;

            if (count($errors) > 0) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $login = $this->signin($_POST['email'], $_POST['password']);
            if ($login) {
                $_SESSION['user'] = $login; // Lưu thông tin người dùng đăng nhập vào session
                $_SESSION['success'] = 'Đăng nhập thành công';
                header('Location: ?act=client');
                exit();
            } else {
                $_SESSION['error'] = 'Đăng nhập không thành công. Vui lòng thử lại';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            // if ($login) {

            //     $_SESSION['user'] = [
            //         'id' => $login['id'],
            //         'name' => $login['name'],
            //         'phone' => $login['phone'],
            //         'role_id' => $login['role_id']
            //     ];

            //     $_SESSION['success'] = 'Đăng nhập thành công';

            // }
        }

        include '../views/client/auth/login.php';
    }
}
