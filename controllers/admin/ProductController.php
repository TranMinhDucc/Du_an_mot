<?php
require_once '../models/Product.php';
class  ProductController extends Product
{
    public function index()
    {
        $listProduct = $this->listProduct();


        include '../views/admin/product/list.php';
    }

    public function create()
    {

        $listWeight = $this->getAllVariant();
        $listCategories = $this->getAllCategory();

        include '../views/admin/product/create.php';
    }


    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_products'])) {

            $errors = [];
            if (empty($_POST['product_name'])) {
                $errors['product_name'] = 'Vui lòng nhập tên sản phẩm';
            }
            if (empty($_POST['product_status'])) {
                $errors['product_status'] = 'Vui lòng chọn trạng thái';
            }
            if (empty($_POST['prices'])) {
                $errors['prices'] = 'Vui lòng nhập giá bán';
            }
            if (empty($_POST['sale'])) {
                $errors['sale'] = 'Vui lòng nhập giá khuyến mãi';
            }
            if (empty($_POST['description'])) {
                $errors['description'] = 'Vui lòng nhập mô tả';
            }
            if (empty($_POST['cost_price'])) {
                $errors['cost_price'] = 'Vui lòng nhập giá cost';
            }
            if (empty($_POST['view_count'])) {
                $errors['view_count'] = 'Vui lòng nhập views';
            }
            if (empty($_POST['slug'])) {
                $errors['slug'] = 'Vui lòng nhập slogan';
            }
            if (empty($_POST['variant_weight'])) {
                $errors['variant_weight'] = 'Vui lòng chọn cân nặng';
            }
            foreach ($_POST['variant_prices'] as $key => $variant_prices) {
                if (empty($variant_prices)) {
                    $errors['variant_prices'][$key] = 'Vui lòng nhập giá biến thể ' . ($key + 1);
                }
            }
            foreach ($_POST['variant_sale'] as $key => $variant_sale) {
                if (empty($variant_sale)) {
                    $errors['variant_sale'][$key] = 'Vui lòng nhập giá khuyến mãi biến thể ' . ($key + 1);
                }
            }

            if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                $errors['image'] = 'Vui lòng thêm file hình ảnh';
            }
            $_SESSION['errors'] = $errors;

            //     echo '<pre>';
            //     print_r($_POST);
            //     print_r($_SESSION);
            //     echo '</pre>';
            // exit;

            if ($errors) {
                header('Location: ?act=product-create');
            }

            $file = $_FILES['image'];
            $image = uniqid() . '-' . preg_replace('/[^a-zA-Z0-9]/', '', basename($file['name']));
            if (move_uploaded_file($file['tmp_name'], './images/product/' . $image)) {

                $addProduct = $this->addProduct($_POST['name'], $_POST['description'], $_POST['prices'], $_POST['cost_price'], $_POST['sale'], $image, $_POST['view_count'], $_POST['status'], $_POST['catrgories_id'], $_POST['slug']);
                if ($addProduct) {
                    $product_id = $this->getLastInsert();
                    if (isset($_POST['variant_weight'])) {
                        foreach ($_POST['variant_weight'] as $key => $weight) {
                            $addProductVariant = $this->addProductVariant($_POST['variant_prices'][$key], $_POST['variant_sale'][$key], $_POST['variant_weight'][$key], $product_id);
                        }
                    }
                }

                $_SESSION['success'] = 'Thêm sản phẩm thành công';
                header('Location: index.php?act=product');
                exit();
            } else {
                $_SESSION['error'] = 'Thêm danh mục thất bại. Vui lòng thử lại';
                header('Location' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }

    public function edit()
    {

        $product = $this->getProductById($_GET['id']);
        $variants = $this->getProductVariantById($_GET['id']);
        $listCategories = $this->getAllCategory();
        $listWeight = $this->getAllVariant();
        // echo '<pre>';
        //     print_r(($variants));
        //     echo '</pre>';
        include '../views/admin/product/edit.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-product'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên sản phẩm';
            }
            if (empty($_POST['status'])) {
                $errors['status'] = 'Vui lòng chọn trạng thái';
            }
            if (empty($_POST['prices'])) {
                $errors['prices'] = 'Vui lòng nhập giá bán';
            }
            if (empty($_POST['sale'])) {
                $errors['sale'] = 'Vui lòng nhập giá khuyến mãi';
            }
            if (empty($_POST['description'])) {
                $errors['description'] = 'Vui lòng nhập mô tả';
            }
            if (empty($_POST['cost_price'])) {
                $errors['cost_price'] = 'Vui lòng nhập giá cost';
            }
            if (empty($_POST['view_count'])) {
                $errors['view_count'] = 'Vui lòng nhập views';
            }
            if (empty($_POST['slug'])) {
                $errors['slug'] = 'Vui lòng nhập slogan';
            }
            if (empty($_POST['variant_weight'])) {
                $errors['variant_weight'] = 'Vui lòng chọn cân nặng';
            }
            foreach ($_POST['variant_prices'] as $key => $variant_prices) {
                if (empty($variant_prices)) {
                    $errors['variant_prices'][$key] = 'Vui lòng nhập giá biến thể ' . ($key + 1);
                }
            }
            foreach ($_POST['variant_sale'] as $key => $variant_sale) {
                if (empty($variant_sale)) {
                    $errors['variant_sale'][$key] = 'Vui lòng nhập giá khuyến mãi biến thể ' . ($key + 1);
                }
            }

            // if(!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK){
            //     $errors['image'] = 'Vui lòng thêm file hình ảnh';
            // }
            $_SESSION['errors'] = $errors;


            $file = $_FILES['product_image'];
            $image = uniqid() . '-' . preg_replace('/[^a-zA-Z0-9]/', '', basename($file['name']));
            if ($file['size'] > 0) {
                if (move_uploaded_file($file['tmp_name'], './images/product/' . $image)) {
                    // Xóa ảnh cũ
                    if (isset($_POST['old_image']) && file_exists('./images/product/' . $_POST['old_image'])) {
                        unlink('./images/product/' . $_POST['old_image']);
                    }
                }
            } else {
                $image = $_POST['old_image'];
            }
            // Cập nhật thông tin sản phẩm
            $updateProduct = $this->updateProduct($_GET['id'], $_POST['product_name'], $_POST['product_description'], $_POST['prices'], $_POST['cost_price'], $_POST['sale'], $image, $_POST['view_count'], $_POST['product_status'], $_POST['catrgories_id'], $_POST['slug']);
            if ($updateProduct) {
                if (isset($_POST['variant_weight'])) {
                    foreach ($_POST['variant_weight'] as $key => $weight) {
                        // Kiểm tra biến thể đã tồn tại hay chưa
                        if (isset($_POST['product_id'][$key]) && !empty($_POST['product_id'][$key])) {
                            // Cập nhật biến thể hiện có
                            $this->updateProductVariant(
                                $_POST['product_id'][$key],
                                $_POST['variant_prices'][$key],
                                $_POST['variant_sale'][$key],
                                $weight,
                                $_GET['id']
                            );
                        } else {
                            $addProductVariant = $this->addProductVariant(
                                $_POST['variant_prices'][$key],
                                $_POST['variant_sale'][$key],
                                $_POST['product_id'][$key],
                                $weight,
                                $_GET['id']
                            );
                        }
                    }
                }
                $_SESSION['success'] = 'Thêm sản phẩm thành công';
                header('Location: index.php?act=product');
                exit();
            } else {
                $_SESSION['error'] = 'Thêm danh mục thất bại. Vui lòng thử lại';
                header('Location' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }

    public function deleteProductVariant()
    {
        try {
            $this->removeProductVariant();
            $_SESSION['success'] = 'Xóa biến thể thành công';
            header('Location' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header('Location' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }


    public function deleteProduct()
    {
        try {
            $this->removeProduct();
            $_SESSION['success'] = 'Xóa biến thể thành công';
            header('Location: index.php?act=product');
            exit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header('Location' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
