<?php include '../views/admin/layout/header.php'; ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cập nhật danh mục</h1>
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
    <form action="index.php?act=category-edit&id=<?= $getCategory['id'] ?>" method="post"
      enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Danh mục <?= $getCategory['name'] ?></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">Họ và tên</label>
                <input type="text" name="name" id="inputName" class="form-control"
                  placeholder="Nhập tên danh mục" value="<?= $getCategory['name'] ?>">
              </div>
              <?php if (isset($_SESSION['errors']['name'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
              <?php endif; ?>
              <div class="form-group">
                <label for="inputStatus">Trạng thái</label>
                <select id="inputStatus" name="status" class="form-control custom-select">
                  <option value="active" <?= $getCategory['status'] == 'active' ? 'selected' : '' ?>>
                    Hiện</option>
                  <option value="hidden" <?= $getCategory['status'] == 'hidden' ? 'selected' : '' ?>>
                    Ẩn
                  </option>
                </select>
              </div>
              <?php if (isset($_SESSION['errors']['status'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['status'] ?></p>
              <?php endif; ?>
              <div class="form-group">
                <label for="inputDescription">Mô tả</label>
                <textarea name="description" id="inputDescription" class="form-control" rows="4"
                  placeholder="Nhập mô tả danh mục"><?= $getCategory['description'] ?></textarea>
              </div>
              <?php if (isset($_SESSION['errors']['description'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['description'] ?></p>
              <?php endif; ?>
              <div class="form-group">
                <label for="inputName">Upload ảnh</label>
                <input type="file" name="image" class="form-control">
                <input type="hidden" name="old_image" value="<?= $getCategory['image'] ?>">
              </div>
              <td>
                <img src="./images/category/<?= $getCategory['image'] ?>" alt="" width="300px">
              </td>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class=" col-md-6">
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="?act=category" class="btn btn-secondary">Trở về</a>
          <input type="submit" name="updateCategory" value="Cập nhật" class="btn btn-success float-right">
        </div>
      </div>
    </form>

  </section>
  <!-- /.content -->
</div>
<?php include '../views/admin/layout/footer.php'; ?>