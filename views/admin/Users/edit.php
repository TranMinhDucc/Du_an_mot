<?php include '../views/admin/layout/header.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật user</h1>
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
        <form action="index.php?act=user-edit&id=<?= $getUser['id'] ?>" method="post" >
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Users <?= $getUser['name'] ?></h3>
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
                                    placeholder="Nhập tên khách hàng" value="<?= $getUser['name'] ?>">
                            </div>
                            <?php if (isset($_SESSION['errors']['name'])) : ?>
                            <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                            <?php endif; ?>
                            <!-- Address -->
                            <div class="form-group">
                                <label for="inputName">Địa chỉ khách hàng</label>
                                <input type="text" name="address" id="inputName" class="form-control"
                                    placeholder="Nhập địa chỉ khách hàng" value="<?= $getUser['address'] ?>">
                            </div>
                            <?php if (isset($_SESSION['errors']['address'])) : ?>
                            <p class=" text-danger"><?= $_SESSION['errors']['address'] ?></p>
                            <?php endif; ?>
                            <!-- Email -->
                            <div class="form-group">
                                <label for="inputName">Email khách hàng</label>
                                <input type="text" name="email" id="inputName" class="form-control"
                                    placeholder="Nhập email khách hàng" value="<?= $getUser['email'] ?>">
                            </div>
                            <?php if (isset($_SESSION['errors']['email'])) : ?>
                            <p class=" text-danger"><?= $_SESSION['errors']['email'] ?></p>
                            <?php endif; ?>
                            <!-- Phone -->
                            <div class="form-group">
                                <label for="inputName">Số điện thoại khách hàng</label>
                                <input type="text" value="<?= $getUser['phone'] ?>" name=" phone" id="inputName"
                                    class="form-control" placeholder="Nhập số điện thoại khách hàng">
                            </div>
                            <?php if (isset($_SESSION['errors']['phone'])) : ?>
                            <p class=" text-danger"><?= $_SESSION['errors']['phone'] ?></p>
                            <?php endif; ?>
                            <!-- Password -->
                            <div class="form-group">
                                <label for="inputName">Mật khẩu khách hàng</label>
                                <input type="password" value="<?= $getUser['password'] ?>" name=" password"
                                    id="inputName" class="form-control" placeholder="Nhập mật khẩu khách hàng">
                            </div>
                            <?php if (isset($_SESSION['errors']['password'])) : ?>
                            <p class=" text-danger"><?= $_SESSION['errors']['password'] ?></p>
                            <?php endif; ?>
                            <!-- Role -->
                            <div class="form-group">
                                <label for="inputStatus">Role</label>
                                <select id="inputStatus" name="role" class="form-control custom-select">
                                    <?php foreach ($nameRole as $value) : ?>
                                    <option name="role_id" value="<?= $value['role_id'] ?>"><?= $value['role_type'] ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>


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
                    <input type="submit" name="updateUser" value="Cập nhật" class="btn btn-success float-right">
                </div>
            </div>
        </form>

    </section>
    <!-- /.content -->
</div>
<?php 
unset($_SESSION['errors']);
include '../views/admin/layout/footer.php'; ?>