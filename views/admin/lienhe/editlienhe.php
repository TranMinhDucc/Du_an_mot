<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Chỉnh sửa Liên Hệ | Ebazaar </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Edit Admin Contact" name="description" />
    <meta content="Themesbrand" name="author" />

</head>

<body>

    <div id="layout-wrapper">
        <?php
        require_once "../../../views/admin/layout/header.php";
      
        ?>
        
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <h4 class="mb-4">Chỉnh sửa Liên Hệ</h4>

                    <form action="?act=sua-lien-he" method="POST">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($lien_he['id']) ?>">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="fullname" value="<?= htmlspecialchars($lien_he['fullname']) ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="<?= htmlspecialchars($lien_he['email']) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="phone" class="form-control" id="phone" value="<?= htmlspecialchars($lien_he['phone']) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" value="<?= htmlspecialchars($lien_he['title']) ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="detail" class="form-label"></label>
                            <textarea class="form-control" id="detail" name="detail" rows="4"><?= htmlspecialchars($lien_he['detail']) ?></textarea>
                            <?php if (!empty($errors['detail'])): ?>
                                <small style="color:red"><?= $errors['detail'] ?></small>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                        <a href="?act=home" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
        
       
</body>
</html>
