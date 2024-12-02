<?php include '../views/admin/layout/header.php'; ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sản phẩm</h1>
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
    <form action="?act=product-store" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thêm sản phẩm</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">

              <!-- Tên sản phẩm -->
              <div class="form-group">
                <label for="inputName">Tên sản phẩm</label>
                <input type="text" onkeyup="ChangeToSlug();" name="product_name" id="name" class="form-control" placeholder="Nhập tên sản phẩm" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>">
                <input hidden type="text" name="catrgories_id" id="inputName" class="form-control" placeholder="Nhập tên sản phẩm" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>">
              </div>
              <?php if (isset($_SESSION['errors']['product_name'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['product_name'] ?></p>
              <?php endif; ?>

              <!-- Slug -->
              <div class="form-group">
                <label for="inputName">Đường dẫn</label>
                <input type="text" name="slug" id="slug" class="form-control" placeholder="Nhập tên sản phẩm" value="<?= isset($_POST['slug']) ? $_POST['slug'] : '' ?>">
              </div>

              <!-- Danh mục -->
              <div class="form-group">
                <label for="inputStatus">Danh mục</label>
                <select id="inputStatus" name="catrgories_id" class="form-control custom-select">
                  <?php foreach ($listCategories as $value) : ?>
                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>


              <!-- Hàng 1: Giá sản phẩm và Giá khuyến mãi -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputPrice">Giá sản phẩm</label>
                    <input type="text" name="prices" id="inputPrice" class="form-control" placeholder="Nhập giá sản phẩm" value="<?= isset($_POST['prices']) ? $_POST['prices'] : '' ?>">
                  </div>
                  <?php if (isset($_SESSION['errors']['prices'])) : ?>
                    <p class="text-danger"><?= $_SESSION['errors']['prices'] ?></p>
                  <?php endif; ?>
                </div>
                <!-- Giá khuyến mãi  -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputDiscountPrice">Giá khuyến mãi</label>
                    <input type="text" name="sale" id="inputDiscountPrice" class="form-control" placeholder="Nhập giá khuyến mãi" value="<?= isset($_POST['discount_price']) ? $_POST['discount_price'] : '' ?>">
                  </div>
                  <?php if (isset($_SESSION['errors']['sale'])) : ?>
                    <p class="text-danger"><?= $_SESSION['errors']['sale'] ?></p>
                  <?php endif; ?>
                </div>
              </div>
              <!-- Giá nhập sản phẩm -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputPrice">Giá nhập sản phẩm</label>
                    <input type="text" name="cost_price" id="inputName" class="form-control" placeholder="Nhập cost sản phẩm" value="<?= isset($_POST['cost_price']) ? $_POST['cost_price'] : '' ?>">
                  </div>
                  <?php if (isset($_SESSION['errors']['cost_price'])) : ?>
                    <p class="text-danger"><?= $_SESSION['errors']['cost_price'] ?></p>
                  <?php endif; ?>
                </div>
                <!-- View sản phẩm -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputDiscountPrice">View</label>
                    <input type="text" name="view_count" id="inputName" class="form-control" placeholder="Nhập cost sản phẩm" value="<?= isset($_POST['view_count']) ? $_POST['view_count'] : '' ?>">
                  </div>
                  <?php if (isset($_SESSION['errors']['view_count'])) : ?>
                    <p class="text-danger"><?= $_SESSION['errors']['view_count'] ?></p>
                  <?php endif; ?>
                </div>
              </div>
              <!-- Biến thể -->

              <!-- Giá biến thể -->
              <div id="variants">
                <div class="row mb-4">
                  <div class="col-lg-4">
                    <div class="mt-3 ">
                      <label for="inputDiscountPrice">Weight</label>
                      <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                        <?php foreach ($listWeight as $weight) : ?>
                          <input type="checkbox" class="btn-check" value="<?= $weight['id'] ?>" id="weight-<?= $weight['id'] ?>" name="variant_weight[]">
                          <label for="weight-<?= $weight['id'] ?>" class="btn btn-secondary avatar-sm rounded d-flex justify-content-center align-items-center"><?= $weight['weight'] ?></label>
                        <?php endforeach; ?>
                      </div>
                      <?php if (isset($_SESSION['errors']['variant_weight'])) : ?>
                        <p class="text-danger"><?= $_SESSION['errors']['variant_weight'] ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputPrice">Nhập giá biến thể</label>
                        <input type="text" name="variant_prices[]" id="inputName" class="form-control" placeholder="Nhập giá biến thể">
                      </div>
                      <?php if (isset($_SESSION['errors']['variant_prices'])) : ?>
                        <?php foreach (($_SESSION['errors']['variant_prices']) as $variant_prices) : ?>
                          <p class="text-danger"><?= $variant_prices ?></p>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                    <!-- Biến thể -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputDiscountPrice">Nhập giá khuyến mãi của biến thể</label>
                        <input type="text" name="variant_sale[]" id="inputName" class="form-control" placeholder="Nhập giá khuyến mãi biến thể">
                      </div>
                      <?php if (isset($_SESSION['errors']['variant_sale'])) : ?>
                        <?php foreach (($_SESSION['errors']['variant_sale']) as $variant_sale) : ?>
                          <p class="text-danger"><?= $variant_sale ?></p>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12" style="margin-bottom: 20px">
                  <button type="button" id="add-variant" class="btn btn-primary float-right">Thêm biến thể mới</button>
                </div>
              </div>
              <!-- Trạng thái -->
              <div class="form-group">
                <label for="inputStatus">Trạng thái</label>
                <select id="inputStatus" name="status" class="form-control custom-select">
                  <option value="">Chọn trạng thái</option>
                  <option value="Active"
                    <?php
                    if (isset($_POST['status']) && $_POST['status'] == 'Active') {
                      echo 'selected';
                    }
                    ?>>Hiện</option>
                  <option value="Hidden"
                    <?php
                    if (isset($_POST['status']) && $_POST['status'] == 'Hidden') {
                      echo 'selected';
                    }
                    ?>>Ẩn</option>
                </select>
              </div>
              <?php if (isset($_SESSION['errors']['status'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['status'] ?></p>
              <?php endif; ?>

              <!-- Mô tả sản phẩm -->
              <div class="form-group">
                <label for="inputDescription">Mô tả</label>
                <textarea name="description" id="inputDescription" class="form-control" rows="4" placeholder="Nhập mô tả sản phẩm"><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
              </div>
              <?php if (isset($_SESSION['errors']['description'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['description'] ?></p>
              <?php endif; ?>

              <!-- Upload ảnh -->
              <div class="form-group">
                <label for="inputImage">Upload ảnh</label>
                <input type="file" name="image" id="inputImage" class="form-control">
              </div>
              <?php if (isset($_SESSION['errors']['image'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['image'] ?></p>
              <?php endif; ?>

            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.col-md-12 -->
      </div><!-- /.row -->

      <!-- Submit Buttons -->
      <div class="row">
        <div class="col-12" style="margin-bottom: 20px">
          <a href="?act=product" class="btn btn-secondary">Trở về</a>
          <input type="submit" name="add_products" value="Thêm mới" class="btn btn-success float-right">
        </div>
      </div>
    </form>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
  document.getElementById('add-variant').addEventListener('click', function() {
    const container = document.getElementById('variants');
    // Tạo ra một thẻ div
    const newVariant = document.createElement('div');
    newVariant.classList.add('mb-4');
    newVariant.innerHTML = `
      <div class="row mb-4">
                  <div class="col-lg-4">
                    <div class="mt-3 ">
                      <label for="inputDiscountPrice">Weight</label>
                      <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                      <?php foreach ($listWeight as $weight) : ?>
                        <input type="checkbox" class="btn-check" id="weight-<?= $weight['id'] ?>-${container.children.length}" value="<?= $weight['id'] ?>" name="variant_weight[]">
                        <label for="weight-<?= $weight['id'] ?>-${container.children.length}" class="btn btn-secondary avatar-sm rounded d-flex justify-content-center align-items-center"><?= $weight['weight'] ?></label>
                        <?php endforeach; ?>
                        </div>
                        <?php if (isset($_SESSION['errors']['variant_weight'])) : ?>
                        <p class="text-danger"><?= $_SESSION['errors']['variant_weight'] ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputPrice">Nhập giá biến thể</label>
                        <input type="text" name="variant_prices[]" id="inputName" class="form-control" placeholder="Nhập giá biến thể" value="<?= isset($_POST['variant_prices']) ? $_POST['cost_price'] : '' ?>">
                      
                        </div>
                         <?php if (isset($_SESSION['errors']['variant_prices'])) : ?>
                        <?php foreach (($_SESSION['errors']['variant_prices']) as $variant_prices) : ?>
                        <p class="text-danger"><?= $variant_prices ?></p>
                      <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                    <!-- Biến thể -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputDiscountPrice">Nhập giá khuyến mãi của biến thể</label>
                        <input type="text" name="variant_sale[]" id="inputName" class="form-control" placeholder="Nhập giá khuyến mãi biến thể" value="<?= isset($_POST['variant_sale']) ? $_POST['view_count'] : '' ?>">
                      </div>
                      <?php if (isset($_SESSION['errors']['variant_sale'])) : ?>
                      <?php foreach (($_SESSION['errors']['variant_sale']) as $variant_sale) : ?>
                        <p class="text-danger"><?= $variant_sale ?></p>
                      <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
    `;
    container.appendChild(newVariant);
  })
</script>
<?php include '../views/admin/layout/footer.php'; ?>