<?php include '../views/admin/layout/header.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mã giảm giá</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thêm mã giảm giá</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="?act=coupon-create" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm mới mã giảm giá</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Thu gọn">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Trạng thái mã giảm giá -->
                            <div class="form-group">
                                <label for="status">Trạng thái mã giảm giá</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="hidden" id="status_hidden">
                                    <label class="form-check-label" for="status_hidden">Đã hết hạn</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="active" id="status_active" checked>
                                    <label class="form-check-label" for="status_active">Đang hoạt động</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="future plan" id="status_future_plan">
                                    <label class="form-check-label" for="status_future_plan">Kế hoạch tương lai</label>
                                </div>
                                <?php if (isset($_SESSION['errors']['status'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['status'] ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Ngày bắt đầu và kết thúc -->
                            <div class="form-group">
                                <label for="start_date">Ngày bắt đầu</label>
                                <input type="date" name="start_date" class="form-control">
                                <?php if (isset($_SESSION['errors']['start_date'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['start_date'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="end_date">Ngày kết thúc</label>
                                <input type="date" name="end_date" class="form-control">
                                <?php if (isset($_SESSION['errors']['end_date'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['end_date'] ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Thông tin mã giảm giá -->
                            <div class="form-group">
                                <label for="name">Tên mã giảm giá</label>
                                <input type="text" name="name" placeholder="Nhập tên mã giảm giá" class="form-control">
                                <?php if (isset($_SESSION['errors']['name'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="coupon_code">Mã giảm</label>
                                <input type="text" name="coupons_code" placeholder="Nhập mã giảm giá" class="form-control">
                                <?php if (isset($_SESSION['errors']['coupons_code'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['coupons_code'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Số lượng</label>
                                <input type="number" name="quantity" placeholder="Nhập số lượng" class="form-control">
                                <?php if (isset($_SESSION['errors']['quantity'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['quantity'] ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Loại phiếu giảm giá -->
                            <div class="form-group">
                                <label for="type">Loại phiếu giảm giá </label> 
                                <!-- <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="Free Shipping" id="type_free_shipping" checked>
                                    <label class="form-check-label" for="type_free_shipping">Miễn phí vận chuyển</label>
                                </div> -->
                                <!-- ccc -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="Percentage" id="type_percentage">
                                    <label class="form-check-label" for="type_percentage">Giảm phần trăm</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="Fixed Amount" id="type_fixed_amount">
                                    <label class="form-check-label" for="type_fixed_amount">Số tiền cố định</label>
                                </div>
                                <?php if (isset($_SESSION['errors']['type'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['type'] ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Giá trị giảm -->
                            <div class="form-group">
                                <label for="coupon_value">Giá trị giảm</label>
                                <input type="text" name="coupon_value" placeholder="Nhập giá trị giảm" class="form-control">
                                <?php if (isset($_SESSION['errors']['coupon_value'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['coupon_value'] ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Nút gửi -->
                            <button type="submit" name="coupon-create" class="btn btn-primary">Thêm mới mã giảm giá</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

<?php 
unset($_SESSION['errors']);
include '../views/admin/layout/footer.php'; ?>
