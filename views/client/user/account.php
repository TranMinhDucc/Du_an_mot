<?php include '../views/client/layout/header.php'; ?>
<link rel="stylesheet" href="../public/client/assets/css/profile.css">
<section class="profile">
    <div class="container center">
        <div class="row">
            <div class="profile_right">
                <div class="card">
                    <div class="information_prf text-center">
                        <a href="">
                            <img src="../public/images/users/<?= isset($_SESSION['user']['avatar']) && $_SESSION['user']['avatar'] !== '' ? $_SESSION['user']['avatar'] : 'user.jpg' ?>" alt="" class="image text-center">
                        </a>
                        <h3 class="capitalize"><?= $_SESSION['user']['name']  ?></h3>
                        <p class=""><?= isset($_SESSION['user']['phone']) && $_SESSION['user']['phone'] !== '' ? $_SESSION['user']['phone'] : 'Bạn chưa cập nhật số diện thoại' ?></p>
                    </div>
                    <nav class="list_nav_profile">
                        <a href="?act=profile">
                            <p>
                                <i class="fa-solid fa-table-cells"></i>
                                <span class="capitalize ">dashboard</span>
                            </p>
                        </a>
                        <a href="">
                            <i class="fa-solid fa-basket-shopping"></i>
                            <span class="capitalize">order history</span>
                        </a>
                        <a href="">
                            <i class="fa-solid fa-arrows-rotate"></i>
                            <span class="capitalize">return orders</span>
                        </a>
                        <a href="?act=account&id=" class="active">
                            <i class="fa-solid fa-user"></i>
                            <span class="capitalize">account information</span>
                        </a>
                        <a href="">
                            <i class="fa-solid fa-location-dot"></i>
                            <span class="capitalize">addresses</span>
                        </a>
                        <a href="?act=logout">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="capitalize">logout</span>
                        </a>
                    </nav>
                </div>
            </div>
            <div class="dashboard">
                <h2 class="capitalize green">account information
                </h2>
                <form action="?act=update-profile" method="post" enctype="multipart/form-data">
                    <div class="form">
                        <p class="capitalize title_h5">personal details</p>
                        <div class="list_input flex">
                            <div class="sub_input">
                                <label for="" class="capitalize">Họ & Tên</label>
                                <input type="text" name="name" value="<?= $_SESSION['user']['name'] ?>">
                                <?php if (isset($_SESSION['errors']['name'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="sub_input">
                                <label for="" class="capitalize">Email</label>
                                <input type="text" name="email" value="<?= $_SESSION['user']['email'] ?>">
                                <?php if (isset($_SESSION['errors']['email'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="list_input flex">
                            <div class="sub_input">
                                <label for="" class="capitalize">Số điện thoại</label>
                                <input type="text" name="phone" value="<?= $_SESSION['user']['phone'] ?>">
                                <?php if (isset($_SESSION['errors']['phone'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['phone'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="sub_input">
                                <label for="" class="capitalize">địa chỉ</label>
                                <input type="text" name="address" value="<?= $_SESSION['user']['address'] ?>">
                                <?php if (isset($_SESSION['errors']['address'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['address'] ?></p>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div class="list_input flex">
                            <div class="sub_input">
                                <label for="" class="capitalize">Giới tính</label>
                                <select name="gender" id="">
                                    <option value="male" <?= $_SESSION['user']['gender'] == 'male' ? 'selected' : '' ?>>Nam</option>
                                    <option value="female" <?= $_SESSION['user']['gender'] == 'female' ? 'selected' : '' ?>>Nữ</option>
                                    <option value="others" <?= $_SESSION['user']['gender'] == 'others' ? 'selected' : '' ?>>Khác</option>
                                </select>
                            </div>
                            <?php if (isset($_SESSION['errors']['gender'])) : ?>
                                <p class="text-danger"><?= $_SESSION['errors']['gender'] ?></p>
                            <?php endif; ?>
                            <div class="sub_input">
                                <label for="" class="capitalize">upload image</label>
                                <input type="file" name="image">
                                <input type="hidden" name="old_image" value="<?= $_SESSION['user']['avatar'] ?>">
                            </div>
                        </div>
                        <button type="submit" class="capitalize" name="update-profile">save changes</button>
                    </div>
                </form>
                <form action="?act=update-password" method="post">
                    <div class="form">
                        <p class="capitalize title_h5">change password</p>
                        <div class="list_input flex">
                            <div class="sub_input">
                                <label for="" class="capitalize">old password</label>
                                <input type="password" name="oldPassword">
                                <?php if (isset($_SESSION['errorsPass']['oldPassword'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errorsPass']['oldPassword'] ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="sub_input">
                                <label for="" class="capitalize">new password</label>
                                <input type="text" name="newPassword">
                                <?php if (isset($_SESSION['errorsPass']['newPassword'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errorsPass']['newPassword'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="list_input flex">

                            <div class="sub_input">
                                <label for="" class="capitalize">confirm password</label>
                                <input type="text" name="newConfirmPassword">
                                <?php if (isset($_SESSION['errorsPass']['newConfirmPassword'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errorsPass']['newConfirmPassword'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="submit" class="capitalize" name="update-password">save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
<?php
unset($_SESSION['errors']);
unset($_SESSION['errorsPass']);
include '../views/client/layout/footer.php'; ?>