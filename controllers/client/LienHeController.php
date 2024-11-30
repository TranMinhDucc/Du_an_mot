<?php
require_once __DIR__ . '/../../models/LienHe.php';



class LienHeController
{
    public $modelLienhe;

    public function __construct()
    {
        $this->modelLienhe = new LienheModel();

        
    }

    // Hiển thị form liên hệ
    public function formLienHe()
    {
        require_once __DIR__ . '/../../views/client/userLienHe.php';
        ;
    }

    // Xử lý dữ liệu từ form liên hệ
    public function postLienHe()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $title = $_POST['title'];
            $detail = $_POST['detail'];

            // Kiểm tra lỗi
            $errors = [];
            if (empty($fullname)) {
                $errors['fullname'] = 'Họ và tên không được để trống';
            }
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }
            if (empty($phone)) {
                $errors['phone'] = 'Số điện thoại không được để trống';
            }
            if (empty($title)) {
                $errors['title'] = 'Tiêu đề không được để trống';
            }
            if (empty($detail)) {
                $errors['detail'] = 'Nội dung không được để trống';
            }

            // Nếu không có lỗi, thêm vào cơ sở dữ liệu
            if (empty($errors)) {
                $success = $this->modelLienhe->insertLienhe($fullname, $email,$phone,$title, $detail);
                if ($success) {
                    header('Location: ?act=successLienHe');
                    exit();
                } else {
                    $errors['db'] = 'Đã xảy ra lỗi khi gửi liên hệ. Vui lòng thử lại.';
                }
            }

            // Nếu có lỗi, trả về form và hiển thị lỗi
            require_once __DIR__ . '/../../views/client/userLienHe.php';
            ;
        }
    }

    // Hiển thị trang xác nhận gửi liên hệ thành công
    public function lienHeSuccess()
    {
        require_once __DIR__ . '/../../views/client/successLienHe.php';

    }
}