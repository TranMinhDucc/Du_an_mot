<?php
require_once '../models/Category.php';
require_once '../models/User.php';
require_once '../models/Settings.php';
class ProfileController extends User
{
    protected $categories;
    protected $setting;
    public function __construct()
    {
        $this->categories   = new Category();
        $this->setting      = new Settings();
    }
    public function updateProfile()
    {
        $categories = $this->categories->listCategory();
        $GLOBALS['settings'] = $this->setting->getAllSetting();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-profile'])) {
            
            // echo '<pre>';
            // print_r($_SESSION['user']);
            // echo '<pre>';
            // $user = $this->updateUser($_POST['name'], $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['gender']);
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Bạn chưa nhập tên đầy đủ';
            }
            if (empty($_POST['email'])) {
                $errors['email'] = 'Bạn chưa nhập email';
            }
            if (empty($_POST['phone'])) {
                $errors['phone'] = 'Bạn chưa nhập số điện thoại';
            }
            if (empty($_POST['address'])) {
                $errors['address'] = 'Bạn chưa nhập địa chỉ';
            }
            if (empty($_POST['gender'])) {
                $errors['gender'] = 'Bạn chưa chọn giới tính';
            }
            
            $_SESSION['errors'] = $errors;
            $file = $_FILES['image'];
            $image = $file['name'];
            if ($file['size'] > 0) {
                move_uploaded_file($file['tmp_name'], './images/users/' . $image);
                if (!empty($_POST['old_image']) && file_exists('./images/users/' . $_POST['old_image'])) {
                    unlink('./images/users/' . $_POST['old_image']);
                }
            } else {
                $image = $_POST['old_image'];
            }
            $user = $this->updateUser($_POST['name'], $image, $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['gender']);
            // var_dump($_POST); die();
            if ($user) {
                $_SESSION['user'] = $this->getUserById($_SESSION['user']['id']);
                $_SESSION['success'] = 'Cập nhật thông tin người dùng thành công';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                $_SESSION['error'] = 'Cập nhật thông tin không thành công. Vui lòng kiểm tra lại';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }

        include '../views/client/user/account.php';
    }
    public function updatePassProfile()
    {
        if (isset($_POST['update-password'])) {
            // var_dump($_POST); die();
            $errors = [];
            if (empty($_POST['oldPassword'])) {
                $errors['oldPassword'] = 'Bạn chưa nhập mật khẩu cũ';
            }else if( !password_verify($_POST['oldPassword'],$_SESSION['user']['password'])){
                $errors['oldPassword'] = 'Mật khẩu cũ của bạn chưa chính xác. Vui lòng thử lại!';
            }
            if($_POST['newPassword'] !== $_POST['newConfirmPassword']){
                $errors['newConfirmPassword'] = 'Mật khẩu bạn nhập lại chưa trùng khớp';
            }
            if (empty($_POST['newPassword'])) {
                $errors['newPassword'] = 'Bạn chưa nhập mật khẩu mới';
            }
            if (empty($_POST['newConfirmPassword'])) {
                $errors['newConfirmPassword'] = 'Bạn chưa nhập lại mật khẩu mới';
            }
          
            
            $_SESSION['errorsPass'] = $errors;
            // var_dump($errors); die();
            if(count($errors) == 0){
                $user = $this->updatePassUser($_POST['newPassword']);
                if ($user) {
                    $_SESSION['user'] = $this->getUserById($_SESSION['user']['id']);
                    $_SESSION['success'] = 'Cập nhật thông tin người dùng thành công';
                    header('Location: ?act=update-profile');
                    exit();
                } else {
                    $_SESSION['error'] = 'Cập nhật thông tin không thành công. Vui lòng kiểm tra lại';
                    header('Location: ?act=update-profile');
                    exit();
                }
            }
            
            // var_dump($_POST); die();
            
        }

    }

    public function logout(){
        unset($_SESSION['user']);
        header('Location: ?act=login');
    }
}
