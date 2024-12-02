<?php
require_once '../models/OrderAdmin.php';
class OrdersControler extends Orders
{
    public function index()
    {
        $listOrder = $this->listOrder();
        include '../views/admin/order/list.php';
    }
    public function editOrder()
    {
        $getOrder = $this->status();
        if ($getOrder) {

            return $getOrder;
        } else {
            $_SESSION['error'] = "Không tìm thấy đơn hàng";
            header('Location: index.php?act=manager-orders');
        }
    }

    public function updateOrder()
    {
        $order_id = $_GET['id'];
        $order = $this->status($order_id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateOrder'])) {
            $errors = [];
            if (empty($_POST['status'])) {
                $erros['status'] = 'Vui lòng chọn trạng thái';
            }
            $_SESSION['errors'] = $errors;
            $updateOrder = $this->update($_POST['status'], $_GET['id']);
            // var_dump($updateOrder);
            // die();
            if ($updateOrder) {
                $_SESSION['success'] = 'Cập nhật trạng thái thành công';
                header('Location: index.php?act=manager-orders');
                exit();
            } else {
                $_SESSION['error'] = 'Cập nhật trạng thái thất bại. Vui lòng thử lại';
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }

        include '../views/admin/order/edit.php';
    }
}
