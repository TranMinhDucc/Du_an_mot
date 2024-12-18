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
                        <h3 class="capitalize"><?= $_SESSION['user']['name'] ?></h3>
                        <p class=""><?= isset($_SESSION['user']['phone']) && $_SESSION['user']['phone'] !== '' ? $_SESSION['user']['phone'] : 'Bạn chưa cập nhật số diện thoại' ?></p>
                    </div>
                    <nav class="list_nav_profile">
                        <a href="?act=dashboard&id=1" class="active">
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
                        <a href="?act=update-profile">
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
                <h2 class="capitalize green">dashboard</h2>
                <p class="capitalize">welcome back, miron!</p>
                <div class="grid">
                    <div class="ifm">
                        <div class="sub_ifm">
                            <i class="fa-solid fa-basket-shopping total_order"></i>
                            <h3 class="green_blue"><?=$getAllOrder["countAllStatus"]?></h3>
                            <p>Total Orders</p>
                        </div>
                    </div>
                    <div class="ifm">
                        <div class="sub_ifm">
                            <i class="fa-solid fa-bag-shopping total_complete"></i>
                            <h3 class="green"><?=$countOrderCompleted["totalStatus"]?></h3>
                            <p>Total Completed</p>
                        </div>
                    </div>
                    <div class="ifm">
                        <div class="sub_ifm">
                            <i class="fa-solid fa-rotate total_refund"></i>
                            <h3 class="violet">15</h3>
                            <p>Total Returned</p>
                        </div>
                    </div>
                    <div class="ifm">
                        <div class="sub_ifm">
                            <i class="fa-solid fa-wallet wallet_balance"></i>
                            <h3 class="blue">$127</h3>
                            <p>Wallet Balance</p>
                        </div>
                    </div>
                </div>
                <div class="title flex">
                    <p class="capitalize title_h5">order history</p>
                    <a href="" class="capitalize green box_shadow">show full history</a>
                </div>
                <div class="history ">
                    <table>
                        <thead>
                            <tr>
                                <th class="capitalize">order</th>
                                <th class="capitalize">items</th>
                                <th class="capitalize">status</th>
                                <th class="capitalize">payment</th>
                                <th class="capitalize">total</th>
                                <th class="capitalize">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($informationOrder as $value) { ?>
                                <tr>
                                    <td>
                                        <h5>#<?= $value['order_id'] ?></h5>
                                        <p><?= $value['created_at'] ?></p>
                                    </td>
                                    <td>
                                        <?= $value['order_quantity'] ?> product
                                    </td>
                                    <td class="capitalize
                                    <?php
                                    if ($value['order_status'] == "Pending") {
                                        echo 'pending';
                                    } else if ($value['order_status'] == "Confirmed") {
                                        echo 'confirmed';
                                    }else if ($value['order_status'] == "Ongoing") {
                                        echo 'ongoing';
                                    }else if ($value['order_status'] == "Delivered") {
                                        echo 'delivered';
                                    }
                                    ?>
                                    "><?= $value['order_status'] ?></td>
                                    <td><span class="capitalize unpaid">unpaid</span></td>
                                    <td><?=  number_format($value['total_amount'] * 1000)?>đ</td>
                                    <td>
                                        <div>
                                            <button class="action">
                                                <i class="fa-solid fa-circle"></i>
                                            </button>
                                            <nav>
                                                <a href=""></a>
                                            </nav>
                                        </div>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../views/client/layout/footer.php'; ?>