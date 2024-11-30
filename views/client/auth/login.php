<?php include '../views/client/layout/header.php'; ?>

<body>
    <div class="login">
        <div class="center">
            <div class="login-container">
                <div class="image-section">
                    <img src="https://inilabs-ebazaar.netlify.app/images/banners/auth.jpg" alt="Vegetables">
                </div>
                <div class="form-section">
                    <h2 class="sig-in">Đăng Nhập</h2>
                    <p class="sig-in">Đăng nhập để tiếp tục mua sắm</p>
                    <form action="?act=login" method="POST">
                    <?php if (isset($_SESSION['errors']['notification'])) : ?>
                            <p class="text-danger"><?= $_SESSION['errors']['notification'] ?></p>
                        <?php endif; ?>
                        <label class="label_login" for="phone">Email *</label>
                        <div class="phone-input">
                            <input type="tel" name="email" placeholder="Vui lòng nhập email" >
                        </div>
                        <?php if (isset($_SESSION['errors']['email'])) : ?>
                            <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                        <?php endif; ?>
                        <label class="label_login" for="password">Password *</label><br />
                        <input type="password" id="password" name="password" placeholder="Vui lòng nhật mật khẩu" >
                        <?php if (isset($_SESSION['errors']['password'])) : ?>
                            <p class="text-danger"><?= $_SESSION['errors']['password'] ?></p>
                        <?php endif; ?>
                        <div class="remember-forgot">
                            <div class="remember-me">
                                <input type="checkbox" id="remember">
                                <label class="label_login" for="remember">Remember Me</label>
                            </div>
                            <a href="#" class="forgot-password">Forgot Password</a>
                        </div>
                        <button type="submit" class="login-button" name="login">Đăng nhập</button>
                        <p class="signup-prompt">Bạn chưa có tài khoản <a href="?act=register" class="signup-link">Đăng ký</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<?php 
include '../views/client/layout/footer.php'; 
unset($_SESSION['errors']);
?>