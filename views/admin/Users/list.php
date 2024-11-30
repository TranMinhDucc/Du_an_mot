<?php include '../views/admin/layout/header.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thành viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thành viên</li>
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
                            <h3 class="card-title col">Danh sách thành viên</h3>
                            <a href="?act=create" class="col-2 btn btn-primary"><i class="fa-solid fa-plus"></i> Thêm
                                thành viên</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ và tên</th>

                                        <th>Địa chỉ</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Role</th>

                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listUser as $value) { ?>
                                        <tr>
                                            <td><?= $value['id'] ?></td>
                                            <td><?= $value['name'] ?></td>

                                            <td><?= isset($value['address']) && $value['address'] !== ''  ? $value['address'] : "Chưa cập nhật địa chỉ" ?></td>
                                            <td><i class="fa-solid fa-envelope"></i> <?= $value['email'] ?></td>
                                            <td><?= isset($value['phone']) && $value['phone'] !== ''  ? $value['phone'] : "Chưa cập nhật số điện thoại" ?></td>
                                            <td><?php if($value['role_id'] == 3){
                                                echo '<button type="button" class="btn btn-danger btn-sm">Admin</button>';
                                            }else{
                                                echo '<button type="button" class="btn btn-primary btn-sm">Member</button>';
                                            } ?></td>

                                            <td>
                                                <a title=" Chỉnh sửa" href="index.php?act=user-edit&id=<?= $value['id'] ?>">
                                                    <button type="button" class="btn btn-warning ">
                                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>

                                    <?php } ?>

                                </tbody>
                                <tfoot>
                                    <th>ID</th>
                                    <th>Họ và tên</th>

                                    <th>Địa chỉ</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Role</th>

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