<?php
require_once __DIR__ . '/../../models/AdminLienHe.php';


class AdminLienheController 
{
    public $modelLienhe;

    public function __construct()
    {
        $this->modelLienhe = new AdminLienHeModel();
    }

    // Hiển thị danh sách tất cả các liên hệ
    public function danhSachLienHe()
    {
        $listLienhe = $this->modelLienhe->getAllLienhe();
        require_once '../views/admin/lienhe/lienhe.php';

    }

    public function chiTietLienHe()
    {
    $id = $_GET['id']; // Lấy ID từ tham số URL
    $lien_he = $this->modelLienhe->getOneLienhe($id);

    if ($lien_he) {
        require_once '../views/lienhe/chitietlienhe.php';
    } else {
        header('Location:?act=lienhe'); 
        exit();
    }
    }


    
    public function formEditLienHe()
    {
        $id = $_GET['id_lien_he'];
        $lien_he = $this->modelLienhe->getOneLienhe($id);

        if ($lien_he) {
            require_once './views/lienhe/editLienHe.php';
        } else {
            header('Location: ?act=lienhe');
            exit();
        }
    }
    public function postEditLienHe()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $detail = $_POST['detail'];

            $errors = [];
            if (empty($detail)) {
                $errors['detail'] = 'Nội dung không được để trống';
            }

            if (empty($errors)) {
                $this->modelLienhe->updateLienhe($id, $detail);
                header('Location: ?act=lienhe');
                exit();
            } else {
                $lien_he = ['id' => $id, 'detail' => $detail];
                require_once './views/lienhe/editLienhe.php';
            }
        }
    }

    // Xóa một liên hệ
    public function deleteLienHe()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id_lien_he'];
         $this->modelLienhe->destroyLienhe($id);
           header('Location: ?act=lienhe');
    exit();
        }
}
}
