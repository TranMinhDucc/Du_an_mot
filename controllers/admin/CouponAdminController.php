<?php
require_once '../models/Coupon.php';
class CouponAdminController extends Coupon
{
    public function index()
    {
        $listCoupon = $this->listCoupon();
        include '../views/admin/coupons/list.php';
    }

    public function create()
    {
        if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['coupon-create'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên';
            }
            if (empty($_POST['status'])) {
                $errors['status'] = 'Vui lòng chọn status';
            }
            if (empty($_POST['quantity'])) {
                $errors['quantity'] = 'Vui lòng nhập số lượng';
            }
            if (empty($_POST['coupon_value'])) {
                $errors['coupon_value'] = 'Vui lòng nhập coupon_value';
            }
            if (empty($_POST['type'])) {
                $errors['type'] = 'Vui lòng nhập type';
            }
            if (empty($_POST['coupons_code'])) {
                $errors['coupons_code'] = 'Vui lòng nhập coupons code';
            }
            if (empty($_POST['status'])) {
                $errors['status'] = 'Vui lòng chọn trạng thái';
            }
            if (empty($_POST['start_date']) && $_POST['start_date'] < date('Y-m-d')) {
                $errors['start_date'] = 'Vui lòng chọn ngày bắt đầu và ngày bắt đầu phải lớn hơn hoặc bằng hiện tại';
            }
            if (empty($_POST['end_date']) && !empty($_POST['start_date']) && $_POST['end_date'] > $_POST['start_date']) {
                $errors['end_date'] = 'Vui lòng chọn ngày kết thúc và ngày kết thúc phải lớn hơn ngày bắt đầu';
            }
            //             echo '<pre>';
            //             print_r(($_POST));
            //             echo '</pre>';
            // die();

            $_SESSION['errors'] = $errors;
            if (count($errors) > 0) {
                $_SESSION['error'] = 'Vui lòng nhập đầy đủ dữ liệu';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $coupon = $this->addCoupon($_POST['name'], $_POST['type'], $_POST['coupons_code'], $_POST['start_date'], $_POST['end_date'], $_POST['quantity'], $_POST['coupon_value'], $_POST['status']);
            if ($coupon) {
                $_SESSION['success'] = 'Thêm mã giảm giá thành công';
                header('Location: ?act=coupon');
                exit();
            } else {
                $_SESSION['error'] = 'Thêm mã giảm giá thất bại. Vui lòng thử lại';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        include '../views/admin/coupons/create.php';
    }

    public function edit()
    {
        $coupon = $this->editCoupon();
        // echo '<pre>';
        //     print_r(($coupon));
        //     echo '</pre>';
        include '../views/admin/coupons/edit.php';
    }

    public function update()
    {
        if (isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_POST['coupon-update'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên';
            }
            if (empty($_POST['status'])) {
                $errors['status'] = 'Vui lòng chọn status';
            }
            if (empty($_POST['quantity'])) {
                $errors['quantity'] = 'Vui lòng nhập số lượng';
            }
            if (empty($_POST['coupon_value'])) {
                $errors['coupon_value'] = 'Vui lòng nhập coupon_value';
            }
            if (empty($_POST['type'])) {
                $errors['type'] = 'Vui lòng nhập type';
            }
            if (empty($_POST['coupons_code'])) {
                $errors['coupons_code'] = 'Vui lòng nhập coupons code';
            }
            if (empty($_POST['status'])) {
                $errors['status'] = 'Vui lòng chọn trạng thái';
            }
            if (empty($_POST['start_date']) && $_POST['start_date'] < date('Y-m-d')) {
                $errors['start_date'] = 'Vui lòng chọn ngày bắt đầu và ngày bắt đầu phải lớn hơn hoặc bằng hiện tại';
            }
            if (empty($_POST['end_date']) && !empty($_POST['start_date']) && $_POST['end_date'] > $_POST['start_date']) {
                $errors['end_date'] = 'Vui lòng chọn ngày kết thúc và ngày kết thúc phải lớn hơn ngày bắt đầu';
            }
            //             echo '<pre>';
            //             print_r(($_POST));
            //             echo '</pre>';
            // die();

            $_SESSION['errors'] = $errors;
            if (count($errors) > 0) {
                $_SESSION['error'] = 'Vui lòng nhập đầy đủ dữ liệu';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $updateCoupon = $this->updateCoupon($_POST['name'], $_POST['type'], $_POST['coupons_code'], $_POST['start_date'], $_POST['end_date'], $_POST['quantity'], $_POST['coupon_value'], $_POST['status']);
            if ($updateCoupon) {
                $_SESSION['success'] = 'Cập nhật mã giảm giá thành công';
                header('Location: ?act=coupon');
                exit();
            } else {
                $_SESSION['error'] = 'Cập nhật mã giảm giá thất bại. Vui lòng thử lại';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }

    public function delete()
    {
        try{
            $this->deleteCoupon();
            $_SESSION['success'] = 'Xóa mã giảm giá thành công';
            header('Location: ?act=coupon');
            exit();
        }catch(\Throwable $th){
            $_SESSION['error'] = 'Xóa mã giảm giá thất bại. Vui lòng thử lại';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
