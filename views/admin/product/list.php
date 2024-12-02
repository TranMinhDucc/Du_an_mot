<?php include '../views/admin/layout/header.php'; ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh mục</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Danh mục</li>
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
              <h3 class="card-title col">Danh sách danh mục</h3>
              <a href="index.php?act=product-create" class="col-2 btn btn-primary"><i class="fa-solid fa-plus"></i> Thêm sản phẩm mới</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá sản phẩm & cân nặng</th>
                    <th>Giá khuyến mãi</th>
                    <th>Danh Mục</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listProduct as $product) : ?>
                    <tr>
                      <td><?= $product['product_name'] ?></td>
                      <td>
                        <img src="./images/product/<?= $product['product_image'] ?>" alt="" class="img-thumbnail img-fluid" style="max-width: 100px;">
                      </td>
                      <td>
                        <?= 'Giá nhập: ' .$product['product_price'] ?><br>
                        <?= 'Cân nặng: ' .$product['product_variant_weight'] ?>
                      </td>
                      <td>
                        <?= 'Giá bán: ' .$product['product_sale_price'] ?><br>
                      </td>
                     
                      <td><?= $product['category_name'] ?></td>
                      <td><?= (isset($product['product_status']) && $product['product_status'] == 'active') ? 'ON' : 'OFF'; ?>
                      </td>
                      <td>
                        <a title="Chỉnh sửa" href="index.php?act=product-edit&id=<?= $product['product_id'] ?>">
                          <button type="button" class="btn btn-warning ">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                          </button>
                        </a>
                        <a title="Xóa" onclick="return confirm('Bạn chắc chắn muốn xóa không ?')" href="index.php?act=product-delete&id=<?= $product['product_id'] ?>">
                          <button type="button" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i> Delete
                          </button>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá sản phẩm & cân nặng</th>
                    <th>Giá khuyến mãi</th>
                    <th>Danh Mục</th>
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