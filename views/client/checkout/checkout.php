<?php include '../views/client/layout/header.php'; ?>

<link rel="stylesheet" href="client/assets/css/carts.css">
<link rel="stylesheet" href="client/assets/css/style.css">

<body>
    <main>
        <form action="?act=order" method="post">
            <div class="container_cart">
                <div class="center w d-flex ">
                    <a href="?act=client"><button class="btn_back_home"><i
                                class="fa-solid fa-rotate-left back"></i></button></a>
                    <div class="title_shopping">
                        <h4 class="capitalize">Thông tin vận chuyển</h4>
                        <p>Kiểm tra thông tin của bạn trước khi tiếp tục
                        </p>
                    </div>
                </div>
                <div class="box_cart center w d-flex">
                    <div class="cart_left">
                        <div>
                            <ul>
                                <li class="items_prd ">
                                    <div class="information_cart">
                                        <h3>Thông tin thanh toán</h3>
                                        <form action="">
                                            <div class="label_Cart">
                                                <label for="">Họ & tên:</label> <br>
                                                <input type="text" name="name" value="<?= $user['name'] ?>"
                                                    class="input_carts"> <br>
                                            </div>
                                            <div class="label_Cart">
                                                <label for="">Địa chỉ:</label> <br>
                                                <input type="text" name="address" value="<?= $user['address'] ?>"
                                                    class="input_carts"> <br>
                                            </div>
                                            <div class="label_Cart">
                                                <label for="">Số điện thoại:</label> <br>
                                                <input type="text" name="phone" value="<?= $user['phone'] ?>"
                                                    class="input_carts"> <br>
                                            </div>
                                            <div class="label_Cart">
                                                <label for="">Email:</label> <br>
                                                <input type="text" name="email" value="<?= $user['email'] ?>"
                                                    class="input_carts"> <br>
                                            </div>
                                            <div class="label_Cart">
                                                <label for="">Ghi chú:</label> <br>
                                                <textarea name="note" id="" rows="7"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>

                            <div class="text-right capitalize flex box_btn_carts">
                                <a href="?act=carts" class="next_checkout back_Cart">Quay lại giỏ hàng</a>
                                <button type="submit" name="checkout" class="next_checkout">Tiến hành thanh
                                    toán</button>
                            </div>
                        </div>

                    </div>

                    <div class="cart_rights">
                        <div class="carts_right">
                            <div class="cart_rightsss">

                                <div>
                                    <h3>Đơn hàng của tôi</h3>
                                </div>
                                <ul class="list_amount">
                                    <li class="flex">
                                        <span class="capitalize"> <strong>Sản phẩm</strong> </span>
                                        <span class="font-medium"> <strong>Giá tiền</strong></span>
                                    </li>
                                    <?php foreach ($carts as $cart) : ?>
                                        <li class="flex">
                                            <span class="capitalize"><?= $cart['product_name'] ?></span>
                                            <span
                                                class="font-medium"><?= number_format($cart['variant_sale_price'] * 1000) ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                    <span class="capitalize">
                                        <li class="flex">
                                            <span class="capitalize">Subtotal</span>
                                            <input type="hidden" value="<?= $_SESSION['total'] ?>">
                                            <span
                                                class="capitalize"><Strong><?= number_format($_SESSION['total'] * 1000) ?>đ</Strong></span>
                                        </li>
                                        <?php if (isset($_SESSION['coupon']) && !empty($_SESSION['coupon'])) { ?>
                                            <li class="flex">
                                                <input type="hidden" name="coupon_id"
                                                    value="<?= isset($_SESSION['coupon']['coupon_id']) ?>">
                                                <span class="capitalize">Mã giảm giá</span>
                                                <span
                                                    class="capitalize"><strong>-<?= isset($_SESSION['totalCoupon']) ? number_format($_SESSION['totalCoupon'] * 1000) : 0; ?>đ</strong></span>
                                            </li>
                                        <?php } else { ?>
                                            <input type="hidden" name="coupon_id" value="">
                                        <?php } ?>
                                        <strong>Giao hàng</strong>
                                    </span>
                                    <li class="flex">

                                        <div class="tp-order-info-list-shipping-item ">
                                            <?php foreach ($ships as $ship): ?>
                                                <span class="font-medium">

                                                    <input type="radio" name="shipping_id"
                                                        value="<?= $ship['shipping_id'] ?>">
                                                    <label for="flat_rate"><?= $ship['name'] ?>:
                                                        <span><?= number_format($ship['shipping_price'] * 1000) ?>đ</span></label><br>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </li>

                                </ul>
                                <?php if (isset($_SESSION['coupon']) && !empty($_SESSION['coupon'])): ?>
                                    <div class="flex">
                                        <p class="capitalize font-semibold">Tổng cộng</p>
                                        <input type="hidden" name="amount"
                                            value="<?= $_SESSION['total'] - $_SESSION['totalCoupon'] ?>">
                                        <p class="font-semibold">
                                            <?= number_format(($_SESSION['total'] - $_SESSION['totalCoupon']) * 1000) ?>
                                        </p>
                                    </div>
                                <?php else: ?>
                                    <div class="flex">
                                        <p class="capitalize font-semibold">Tổng cộng</p>
                                        <input type="hidden" name="amount" value="<?= $_SESSION['total'] ?>">
                                        <p class="font-semibold"><?= number_format($_SESSION['total'] * 1000) ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>


                    </div>
                </div>
        </form>
    </main>
</body>
<?php include '../views/client/layout/footer.php'; ?>