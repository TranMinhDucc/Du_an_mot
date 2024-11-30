<?php
include '../views/client/layout/header.php';
?>

<body>
    <div class="container-register">
        <div class="center">
            <div class="signup-box">
                <div class="left">
                    <img src="https://inilabs-ebazaar.netlify.app/images/banners/auth.jpg" alt="Vegetables" class="signup-image">
                </div>
                <div class="rightt">
                    <h2 class="title_auth">Đăng Ký</h2>
                    <p class="subtitle">Register a new open account</p>
                    <form action="?act=register" class="authform" method="post">
                        <label for="name">Họ và Tên *</label>
                        <input type="text" id="name" name="name" class="input" placeholder="Vui lòng nhập tên đầy đủ của bạn" >
                        <?php if (isset($_SESSION['errors']['name'])) : ?>
                            <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                        <?php endif; ?>
                        <div class="input-phone">
                            <label for="email">Email *</label>
                            <!-- <a href="#" class="use-email">Use Email Instead</a> -->
                        </div>
                        <input type="text" class="input" id="email" name="email" placeholder="Vui lòng nhập email">
                        <?php if (isset($_SESSION['errors']['email'])) : ?>
                            <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                        <?php endif; ?>
                        <label for="password">Mật khẩu *</label>
                        <input type="password" class="input" id="password" name="password" placeholder="Vui lòng nhập mật khẩu">
                        <?php if (isset($_SESSION['errors']['password'])) : ?>
                            <p class="text-danger"><?= $_SESSION['errors']['password'] ?></p>
                        <?php endif; ?>
                        <label for="confirm-password">Nhập lại mật khẩu *</label>
                        <input type="password" class="input" placeholder="Vui lòng nhập lại mật khẩu" name="confirm_password">
                        <?php if (isset($_SESSION['errors']['confirm_password'])) : ?>
                            <p class="text-danger"><?= $_SESSION['errors']['confirm_password'] ?></p>
                        <?php endif; ?>
                        <button type="submit" class="signup-button" name="register">Đăng ký</button>
                    </form>
                    <p class="signin-link">Bạn đã có tài khoản ? <a href="?act=login">Đăng nhập</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include '../views/client/layout/footer.php';
unset($_SESSION['errors']);
?>