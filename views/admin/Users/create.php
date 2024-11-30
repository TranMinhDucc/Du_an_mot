<?php include '../views/admin/layout/header.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tạo users</h1>
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
        <form action="index.php?act=user-create" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Users</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Tên khách hàng</label>
                                <input type="text" name="name" id="inputName" class="form-control"
                                    placeholder="Nhập tên khách hàng"
                                    value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>">
                            </div>
                            <?php if (isset($_SESSION['errors']['name'])) : ?>
                                <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                            <?php endif; ?>
                            <!-- Email -->
                            <div class="form-group">
                                <label for="inputName">Email khách hàng</label>
                                <input type="text" name="email" id="inputName" class="form-control"
                                    placeholder="Nhập email khách hàng"
                                    value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
                            </div>
                            <?php if (isset($_SESSION['errors']['email'])) : ?>
                                <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                            <?php endif; ?>
                            <!-- Password -->
                            <div class="form-group">
                                <label for="inputName">Mật khẩu khách hàng</label>
                                <input type="password" name="password" id="inputName" class="form-control"
                                    placeholder="Nhập mật khẩu khách hàng"
                                    value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                            </div>
                            <?php if (isset($_SESSION['errors']['password'])) : ?>
                                <p class="text-danger"><?= $_SESSION['errors']['password'] ?></p>
                            <?php endif; ?>
                            <!-- Role -->
                            <div class="form-group">
                                <label for="inputStatus">Role</label>
                                <select id="inputStatus" name="role" class="form-control custom-select">
                                    <?php foreach ($nameRole as $value) : ?>
                                        <option value="<?= $value['role_id'] ?>"><?= $value['role_type'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <!--- FILE ---->

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="margin-bottom: 20px">
                    <a href="?act=users" class="btn btn-secondary">Trở về</a>
                    <input type="submit" name="createUser" value="Thêm mới" class="btn btn-success float-right">
                </div>
            </div>
        </form>

    </section>
    <!-- /.content -->
</div>
<?php include '../views/admin/layout/footer.php'; ?>