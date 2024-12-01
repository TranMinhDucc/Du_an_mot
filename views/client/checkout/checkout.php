<?php include '../views/client/layout/header.php'; ?>

<link rel="stylesheet" href="client/assets/css/carts.css">
<link rel="stylesheet" href="client/assets/css/style.css">

<body>
    <main>
        <div class="container_cart">
            <div class="center w d-flex ">
                <a href="?act=client"><button class="btn_back_home"><i class="fa-solid fa-rotate-left back"></i></button></a>
                <div class="title_shopping">
                    <h4 class="capitalize">Thông tin vận chuyển</h4>
                    <p>Kiểm tra thông tin của bạn trước khi tiếp tục
                    </p>
                </div>
            </div>
            <div class="box_cart center w d-flex">
                <form action="?act=update-cart" method="post">
                    <div class="cart_left">
                        <div>
                            <ul>
                                <li class="items_prd ">
                                    <div class="information_cart">
                                        <h3>Thông tin thanh toán</h3>
                                        <form action="">
                                            <div class="label_Cart">
                                                <label for="">Họ & tên:</label> <br>
                                                <input type="text" name="name" class="input_carts"> <br>
                                            </div>
                                            <div class="label_Cart">
                                                <label for="">Địa chỉ:</label> <br>
                                                <input type="text" name="address" class="input_carts"> <br>
                                            </div>
                                            <div class="label_Cart">
                                                <label for="">Số điện thoại:</label> <br>
                                                <input type="text" name="hotline" class="input_carts"> <br>
                                            </div>
                                            <div class="label_Cart">
                                                <label for="">Email:</label> <br>
                                                <input type="text" name="email" class="input_carts"> <br>
                                            </div>
                                            <div class="label_Cart">
                                                <label for="">Ghi chú:</label> <br>
                                                <textarea name="" id="" rows="7"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>

                            <div class="text-right capitalize flex box_btn_carts">
                                <a href="?act=carts" class="next_checkout back_Cart">Quay lại giỏ hàng</a>
                                <a href="" class="next_checkout">Tiến hành thanh toán</a>
                            </div>
                        </div>

                    </div>
                </form>
                <div class="cart_right">
                    <form action="" class="form_coupon ">
                        <input type="text" placeholder="Nhập mã giảm giá">
                        <button>Áp dụng</button>
                    </form>
                    <div>
                        <h3>Tóm tắt đơn hàng</h3>
                    </div>
                    <ul class="list_amount">
                        <li class="flex">
                            <span class="capitalize">Tổng cộng</span>
                            <span class="font-medium">260.000đ</span>
                        </li>
                        <li class="flex">
                            <span class="capitalize">Phí vận chuyển</span>
                            <span class="font-medium">123.00đ</span>
                        </li>
                        <li class="flex">
                            <span class="capitalize">Giảm giá</span>
                            <span class="font-medium">$1000.00đ</span>
                        </li>
                    </ul>
                    <div class="flex">
                        <p class="capitalize font-semibold">Tổng cộng</p>
                        <p class="font-semibold">1000đ</p>
                    </div>
                </div>
            </div>
        </div>

    </main>
</body>
<?php include '../views/client/layout/footer.php'; ?>