
<?php 
include __DIR__ . '/../client/layout/header.php';

?>

<style>
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #00a74a;
}

.contact-section {
    display: flex;
    justify-content: space-between;
    background-color: #fff;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.contact-info, .contact-form {
    width: 48%;
}

.contact-info h2, .contact-form h2 {
    font-size: 20px;
    margin-bottom: 15px;
    color: #00a74a;}

.contact-info p {
    line-height: 1.8;
    color: #666;
}

.contact-form form {
    display: flex;
    flex-direction: column;
}

.contact-form form input,
.contact-form form textarea {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    width: 100%;
}

.contact-form form textarea {
    resize: none;
    height: 100px;
}

.contact-form form button {
    background-color: #00a74a;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

.contact-form form button:hover {
    background-color:#00a74a;
}
</style>


<div class="container">
        <h1>Thông tin liên hệ</h1>
        <div class="contact-section">
            <!-- Phần thông tin liên hệ -->
            <div class="contact-info">
                <h2>Thông tin liên hệ</h2>
                <p><strong>Trụ sở chính:</strong><br>75 Duy Tân, Xuân Thủy, Cầu Giấy, TP. Hà Nội</p>
                <p><strong>Văn phòng giao dịch:</strong><br> Nam Từ Liêm, TP. Hà Nội</p>
                <p><strong>Điện thoại:</strong><br> 082288888 hoặc 098299999</p>
                <p><strong>Địa chỉ email:</strong><br>ebazaar123@gmail.com</p>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0426878891876!2d105.77998437471446!3d21.030977887703486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4ca7c1ef93%3A0x49009eafb70d8b6!2zNzUgUC4gRHV5IFTDom4sIEThu4tjaCBW4buNbmcgSOG6rXUsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1732640329531!5m2!1svi!2s" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <!-- Phần form liên hệ -->
            <div class="contact-form">
                <h2>Để lại thông tin liên hệ</h2>

                <?php if (!empty($_SESSION['errors'])): ?>
                <div class="alert alert-danger">
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <p class="mb-0"><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php endif; ?>

            <?php if (!empty($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>


                <form method="POST" action="?act=postLienHe">
                    <div class="form-group">
                        <label for="">Họ và tên</label>
                        <input type="text" name="fullname" value="<?php echo isset($fullname) ? $fullname : ''; ?>" placeholder="Họ và tên" >
                        <?php if (isset($errors['fullname'])): ?>
                        <div style="color: red;"><?php echo $errors['fullname']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ Email</label>
                        <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" placeholder="Địa chỉ email" >
                        <?php if (isset($errors['email'])): ?>
                        <div style="color: red;"><?php echo $errors['email']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="phone"  value="<?php echo isset($phone) ? $phone : ''; ?>" placeholder="Số điện thoại">
                        <?php if (isset($errors['phone'])): ?>
                        <div style="color: red;"><?php echo $errors['phone']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu đề</label>
                        <input type="text" name="title" value="<?php echo isset($title) ? $title : ''; ?>" placeholder="Tiêu đề" >
                        <?php if (isset($errors['title'])): ?>
                        <div style="color: red;"><?php echo $errors['title']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung</label>
                         <textarea name="detail" placeholder="Nội dung"><?php echo isset($detail) ? $detail : ''; ?></textarea>
                         <?php if (isset($errors['detail'])): ?>
                        <div style="color: red;"><?php echo $errors['detail']; ?></div>
                         <?php endif; ?>
                         <?php if (isset($errors['db'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $errors['db']; ?>
                    </div>
                        <?php endif; ?>
                    <div class="form-group">
                    <button type="submit" name="guithongtin">Gửi thông tin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../client/layout/footer.php'; ?>

