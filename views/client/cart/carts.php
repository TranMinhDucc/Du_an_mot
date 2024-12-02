<?php
// if (!isset($_SESSION['user'])) {
//     // Nếu đang truy cập một trang yêu cầu đăng nhập, chuyển hướng đến trang đăng nhập
//     if (!in_array($_GET['act'] ?? 'carts', ['client', 'login', 'register'])) {
//         $_SESSION['error'] = 'Vui lòng đăng nhập để sử dụng chức năng';
//         header('Location: index.php?act=login');
//         exit;
//     }
// }
include '../views/client/layout/header.php'; ?>


<link rel="stylesheet" href="client/assets/css/carts.css">
<link rel="stylesheet" href="client/assets/css/style.css">

<body>
    <main>
        <form action="?act=update-cart" method="post">
            <div class="container_cart">
                <div class="center w d-flex ">
                    <a href="?act=client"><button class="btn_back_home"><i
                                class="fa-solid fa-rotate-left back"></i></button></a>
                    <div class="title_shopping">
                        <h4 class="capitalize">Giỏ hàng của bạn</h4>
                        <p>(2) items</p>
                    </div>
                </div>
                <div class="box_cart center w d-flex">
                    <div class="cart_left">
                        <div>
                            <ul>
                                <?php foreach ($carts as $cart) : ?>
                                    <li class="items_prd ">
                                        <img src="./images/product/<?= $cart['product_image'] ?>" alt=""
                                            class="products_img">
                                        <div class="information_cart">
                                            <div class="box_ifm">
                                                <h3 class="capitalize"><?= $cart['product_name'] ?></h3>
                                                <p class="capitalize "><?= $cart['variant_weight_name'] ?></p>
                                                <p>
                                                    <span
                                                        class="price fz-20"><?= number_format($cart['variant_sale_price'] * 1000) ?>đ</span>
                                                    <del
                                                        class="line-through fz-16"><?= number_format($cart['variant_price'] * 1000) ?>đ</del>
                                                </p>
                                            </div>
                                            <div class="action flex">
                                                <div>
                                                    <div class="border_action">
                                                        <a class="btn_action decrease"><i
                                                                class="fa-solid fa-circle-minus"></i></a>
                                                        <input type="number" name="quantity[<?= $cart['cart_id'] ?>]"
                                                            value="<?= $cart['quantity'] ?>" class="quantity" min="1">
                                                        <a class="btn_action increase"><i
                                                                class="fa-solid fa-circle-plus"></i></a>
                                                    </div>

                                                </div>
                                                <div class="flex">
                                                    <div>
                                                        <a href="" class="btn_remove capitalize"">
                                                        <button type=" submit" name="update_cart"
                                                            class="btn_remove capitalize">
                                                            <i class="fa-regular fa-trash-can"></i> Update
                                                            </button></a>
                                                    </div>
                                                    <div>
                                                        <a href="?act=delete-cart&cart_id=<?= $cart['cart_id'] ?>"
                                                            onclick="return confirm('Bạn có muốn xóa sản phẩm này?')"
                                                            class="btn_remove capitalize">
                                                            <i class="fa-regular fa-trash-can"></i> xóa
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="text-right capitalize">
                                <a href="?act=checkout" class="next_checkout">Tiến hành thanh toán</a>
                            </div>
                        </div>

                    </div>

                    <div class="cart_right">
                        <form action="" class="form_coupon ">
                            <input type="text" name="coupon_code" placeholder="Nhập mã giảm giá">
                            <button type="submit" name="apply_coupon">Áp dụng</button>
                        </form>
                        <div>
                            <h3>Tóm tắt đơn hàng</h3>
                        </div>
                        <ul class="list_amount">
                            <li class="flex">
                                <span class="capitalize">Tổng cộng</span>
                                <span class="font-medium"><?= number_format($sum * 1000) ?>đ</span>
                            </li>
                            <li class="flex">
                                <span class="capitalize">Phí vận chuyển</span>
                                <span class="font-medium">$7.00</span>
                            </li>
                            <li class="flex">
                                <span class="capitalize">Giảm giá</span>
                                <span class="font-medium">
                                    <?= 
                                    isset($_SESSION['totalCoupon']) ? 
                                    number_format($_SESSION['totalCoupon'] * 1000) 
                                    : 0;
                                    ?>đ</span>
                            </li>
                        </ul>
                        <div class="flex">
                            <p class="capitalize font-semibold">Tổng cộng</p>
                            <p class="font-semibold"><?= 
                                isset($_SESSION['totalCoupon']) ?
                            number_format(($sum - $_SESSION['totalCoupon']) * 1000) : number_format($sum * 1000) ?>đ</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </main>
</body>
<<<<<<< HEAD
<script>
    // Lấy tất cả các phần tử có class "border_action"
    document.querySelectorAll('.border_action').forEach(borderAction => {
        const decreaseButton = borderAction.querySelector('.decrease');
        const increaseButton = borderAction.querySelector('.increase');
        const quantityInput = borderAction.querySelector('.quantity');

        // Đảm bảo giá trị mặc định của input là ít nhất 1
        quantityInput.value = quantityInput.value || 1;

        // Xử lý khi bấm nút giảm (-)
        decreaseButton.addEventListener('click', (event) => {
            event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>
            let currentValue = parseInt(quantityInput.value) || 1;
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        // Xử lý khi bấm nút tăng (+)
        increaseButton.addEventListener('click', (event) => {
            event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>
            let currentValue = parseInt(quantityInput.value) || 1;
            quantityInput.value = currentValue + 1;
        });
    });
</script>
<?php include '../views/client/layout/footer.php'; ?>
=======
<?php 
include '../views/client/layout/footer.php'; ?>
>>>>>>> 8f854ea3c0d86fffeb3e2ed9115d3f2f37a24df9
