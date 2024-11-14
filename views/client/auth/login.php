<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="css.css">
</head>

<body>
    <div class="login-container">
        <div class="login-left">
            <img src="https://inilabs-ebazaar.netlify.app/images/banners/auth.jpg" alt="eBazaar Image">
        </div>
        <div class="login-right">
            <h2 style="text-align: center;">Đăng Nhập</h2>
            <p  style="text-align: center;">Đăng nhập để mua hàng</p>
            <form action="/controllers/client/index.php" method="POST">
                <label for="phone">Số điện thoại</label>
                <div class="input-group">
                    <div class="country-code"></div>
                    <input type="text" id="phone" name="phone" placeholder="Hãy nhập số điện thoại của bạn" required>
                </div>

                <label for="password">Mật khẩu </label>
                <input type="password" id="password" name="password" placeholder="" required>

                <div class="options">
                    <label><input type="checkbox" name="remember">Nhớ mật khẩu</label>
                    <a href="#" class="forgot-password">Quên mật khẩu</a>
                </div>

                <button type="submit" class="sign-in-btn">Đăng Nhập</button>
            </form>
            <p class="sign-up-text">Bạn chưa có tài khoản? <a href="#">Đăng ký</a></p>
        </div>
    </div>
</body>
