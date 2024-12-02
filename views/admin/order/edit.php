<?php include '../views/admin/layout/header.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Project Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="index.php?act=order-edit&id=<?= $order['order_detail_id'] ?>" method="post"
            enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">


                            <div class="form-group">
                                <label for="inputStatus">Trạng thái</label>
                                <select id="inputStatus" name="status" class="form-control custom-select">
                                    <option value="Pending" <?= $order['status'] == 'Pending' ? 'selected' : '' ?>>
                                        Pending</option>
                                    <option value="Confirmed" <?= $order['status'] == 'Confirmed' ? 'selected' : '' ?>>
                                        Confirmed
                                    </option>
                                    <option value="Shipped" <?= $order['status'] == 'Shipped' ? 'selected' : '' ?>>
                                        Shipped
                                    </option>
                                    <option value="Delivered" <?= $order['status'] == 'Delivered' ? 'selected' : '' ?>>
                                        Delivered
                                    </option>
                                </select>
                            </div>
                            <?php if (isset($_SESSION['errors']['status'])) : ?>
                                <p class="text-danger"><?= $_SESSION['errors']['status'] ?></p>
                            <?php endif; ?>


                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="?act=manager-orders" class="btn btn-secondary">Trở về</a>
                    <input type="submit" name="updateOrder" value="Cập nhật" class="btn btn-success float-right">
                </div>
            </div>
        </form>

    </section>
    <!-- /.content -->
</div>
<?php include '../views/admin/layout/footer.php'; ?>