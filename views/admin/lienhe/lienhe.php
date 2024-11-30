<?php include '../views/admin/layout/header.php'; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách liên hệ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách liên hệ</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách liên hệ</h3>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table id="contactTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Ngày Tạo</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listLienhe as $key => $lienHe): ?>
                                <tr>
                                    <td><?php echo $key+1 ?></td>
                                    <td><?php echo htmlspecialchars($lienHe['fullname']); ?></td>
                                    <td><?php echo htmlspecialchars($lienHe['email']); ?></td>
                                    <td><?php echo htmlspecialchars($lienHe['phone']); ?></td>
                                    <td><?php echo htmlspecialchars($lienHe['title']); ?></td>
                                    <td><?php echo htmlspecialchars($lienHe['detail']); ?></td>
                                    <td><?php echo $lienHe['created_at']; ?></td>
                                    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end container-fluid -->
    </section><!-- end content -->
</div><!-- end content-wrapper -->

<!-- jQuery -->
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
    $(document).ready(function() {
        $('#contactTable').DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            searching: false, 
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        }).buttons().container().appendTo('#contactTable_wrapper .col-md-6:eq(0)');
    });
</script>


</body>
</html>
