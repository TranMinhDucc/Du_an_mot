<?php include '../views/admin/layout/header.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Đơn hàng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">

                        <div class="card-header row">
                            <h3 class="card-title col">Danh sách đơn hàng</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên khách hàng</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Tổng tiền</th>
                                        <th>Ghi chú</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listOrder as $value) { ?>
                                        <tr>
                                            <td><?= $value['order_detail_id'] ?></td>
                                            <td><?= $value['name'] ?></td>
                                            <td><?= $value['email'] ?></td>
                                            <td><?= $value['phone'] ?></td>
                                            <td><?= $value['address'] ?></td>
                                            <td><?= $value['amount'] ?></td>
                                            <td><?= $value['note'] ?></td>
                                            <td>
                                                <?php if ($value['status'] == "Pending") {
                                                    echo ' <button type="button"
                                            class="btn btn-secondary btn-sm">Pending</button>';
                                                } elseif ($value['status'] == "Confirmed") {
                                                    echo '<button type="button"
                                            class="btn btn-primary btn-sm">Confirmed</button>';
                                                } elseif ($value['status'] == "Shipped") {
                                                    echo '<button type="button"
                                            class="btn btn-warning btn-sm">Shipped</button>';
                                                } else {
                                                    echo '<button type="button"
                                            class="btn btn-success btn-sm">Delivered</button>';
                                                } ?>
                                            </td>
                                            <td><a title="Chỉnh sửa"
                                                    href="index.php?act=order-edit&id=<?= $value['order_detail_id'] ?>">
                                                    <button type="button" class="btn btn-warning">
                                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                                    </button>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <th>ID</th>
                                    <th>Tên khách hàng</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Tổng tiền</th>
                                    <th>Ghi chú</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- Bootstrap 4 -->
<script src="admin/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="admin/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="admin/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="admin/assets/plugins/jszip/jszip.min.js"></script>
<script src="admin/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="admin/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="admin/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="admin/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="admin/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/assets/dist/js/demo.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>