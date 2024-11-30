<?php include '../views/admin/layout/header.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            
            <div class="card-header">
            <div class="card-header row">
              <h3 class="card-title col">Danh sách danh mục</h3>
              <a href="index.php?act=coupon-create" class="col-2 btn btn-primary"><i class="fa-solid fa-plus"></i> Thêm mã giảm giá</a>
            </div>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 15%">
                                Tên mã giảm
                            </th>
                            <th style="width: 15%">
                                Giảm giá
                            </th>
                            <th style="width: 15%">
                                Mã giảm
                            </th>
                            <th style="width: 15%">
                                Ngày bắt đầu
                            </th style="width: 15%">
                            <th style="width: 15%">
                                Ngày kết thúc
                            </th>
                            <th style="width: 15%">
                                Trạng thái
                            </th>
                            <th>
                                Hành động
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listCoupon as $coupon) : ?>
                            <tr>
                                <td>
                                    <?= $coupon['name'] ?>
                                </td>
                                <?php if ($coupon['coupons_type'] == 'Percentage') : ?>
                                    <td>
                                        <?= $coupon['coupon_value'] ?>%
                                    </td>
                                <?php elseif ($coupon['coupons_type'] == 'Fixed Amount'): ?>
                                    <td>
                                        <?= number_format($coupon['coupon_value'] * 1000, 0, ',', '.')  ?>đ
                                    </td>
                                <?php endif; ?>
                                <td>
                                    <?= $coupon['coupons_code'] ?>
                                </td>
                                <td>
                                    <?= $coupon['start_date'] ?>
                                </td>
                                <td>
                                    <?= $coupon['end_date'] ?>
                                </td>


                                <?php if ($coupon['status'] == 'active') : ?>
                                    <td class="project-state">
                                        <span class="badge badge-success"><?= $coupon['status'] ?></span>
                                    </td>
                                <?php elseif ($coupon['status'] == 'hidden'): ?>
                                    <td class="project-state">
                                        <span class="badge badge-danger"><?= $coupon['status'] ?></span>
                                    </td>
                                <?php elseif ($coupon['status'] == 'future plan'): ?>
                                    <td class="project-state">
                                        <span class="badge badge-primary"><?= $coupon['status'] ?></span>
                                    </td>
                                <?php endif; ?>


                                <td class="project-actions text-right">

                                    <a class="btn btn-info btn-sm" href="?act=coupon-edit&coupon_id=<?= $coupon['coupon_id'] ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a onclick="return confirm('Bạn có muốn xóa mã giảm giá này?')" class="btn btn-danger btn-sm" href="?act=coupon-delete&coupon_id=<?= $coupon['coupon_id'] ?>">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?php include '../views/admin/layout/footer.php'; ?>