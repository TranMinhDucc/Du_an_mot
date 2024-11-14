<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
   
</head>
<body>
    <div class="register-container">
        <div class="register-left">
            <img src="https://inilabs-ebazaar.netlify.app/images/banners/auth.jpg" alt="eBazaar Image">
        </div>
        <div class="register-right">
            <h2 style="text-align: center;">Đăng Ký</h2>
            <p  style="text-align: center;">Đăng ký tài khoản mới</p>

            <form action="/controllers/client/index.php" method="POST">
                <label for="name">Tên Đăng Nhập</label>
                <input type="text" id="name" name="name" placeholder="Vui lòng nhập tên đăng nhập" required>

                <label for="phone">Số điện thoại</label>
                <div class="input-group">
                    
                    <input type="text" id="phone" name="phone" placeholder="Vui lòng nhập số điện thoại" required>
                  
                </div>

                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder=" Vui lòng nhập mật khẩu" required>
                
                <label for="confirm-password">Nhập lại mật khẩu</label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>

                <button type="submit" class="sign-up-btn">Đăng ký</button>
            </form>
            <p class="sign-in-text">Bạn đã có tài khoản chưa?<a href="/views/client/auth/login.php">Đăng Nhập</a></p>
        </div>
    </div>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #f5f5f5;
}

.register-container {
    display: flex;
    width: 800px;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px 
}

.register-left {
    flex: 1;
    background-image: url('https://inilabs-ebazaar.netlify.app/images/banners/auth.jpg');
    background-size: cover;
    background-position: center;
}

.register-right {
    flex: 1;
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.register-right h2 {
    color: #28a745;
    font-size: 24px;
    margin-bottom: 5px;
}

.register-right p {
    color: #777;
    margin-bottom: 20px;
}

form label {
    color: #333;
    font-weight: bold;
    margin-top: 15px;
    display: block;
}

.input-group {
    position: relative;
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.country-code {
    position: absolute;
    left: 10px;
    font-size: 18px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px 10px 10px 40px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.sign-up-btn {
    width: 100%;
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
}

.sign-up-btn:hover {
    background-color: #218838;
}

.sign-in-text {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: #777;
}

.sign-in-text a {
    color: #28a745;
    text-decoration: none;
}

.sign-in-text a:hover {
    text-decoration: underline;
}

    </style>
</body>
</html>
