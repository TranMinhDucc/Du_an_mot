<?php include '../views/client/layout/header.php'; ?>
<link rel="stylesheet" href="client/assets/css/home.css">

<body>

    <div class="center home">
        <section class="hero_section">
            <div class="img_home_banner">
                <a href="">
                    <img src="<?= 'client/assets/images/' ?>banner/03.jpg" alt="" class="image text-center">

                </a>
            </div>
        </section>
        <!-- /* ==========================  ========================== */ -->

        <section class="categories_section">
            <div class="f_categories">
                <div class="container_home">
                    <h2>Browse by Categories</h2>
                </div>
                <div class="f_item_arrow">
                    <div><i class="fa-solid fa-angle-left"></i></div>
                    <div><i class="fa-solid fa-angle-right"></i></div>
                </div>
            </div>
            <div class="swiper-wrapper">
                <?php foreach ($categories as $cate): ?>
                <a href="">
                    <div class="box_swiper">
                        <div class="box_img_categories">

                            <img src="./images/category/<?= $cate['image'] ?>" class="image text-center" alt="">
                        </div>
                        <div class=" name_categories"><?= $cate['name'] ?>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>

            </div>

        </section>
        <!-- /* ==========================  ========================== */ -->
        <section class="sale_img">
            <div class="img_trending">
                <a href=""><img src="<?= 'client/assets/images/' ?>home/banner_child.jpg" alt=""
                        class="image text-center"></a>
                <a href=""><img src="<?= 'client/assets/images/' ?>home/banner_child.jpg" alt=""
                        class="image text-center"></a>
                <a href=""><img src="<?= 'client/assets/images/' ?>home/banner_child.jpg" alt=""
                        class="image text-center"></a>
            </div>
        </section>
        <!-- /* ==========================  ========================== */ -->
        <section class="categories_section">
            <div class="f_categories">
                <div class="container_home">
                    <h2>Popular Items</h2>
                </div>
                <div class="view_item">
                    <p>View All</p>
                </div>
            </div>
            <div class="popular_items">
                <?php foreach ($products as $pro) : ?>
                <div class="flex_popular">
                    <div class="box_popular">
                        <div class="item_img">
                            <a href="?act=product-detail&slug=<?= $pro['product_slug'] ?>">
                                <img src="./images/product/<?= $pro['product_image'] ?>" alt=""
                                    class="img_home_prd image text-center">
                            </a>
                            <button class="heart-button"><i class="fa-regular fa-heart"></i></button>
                            <button class="bag-button"><i class="fa-solid fa-bag-shopping"></i>Add</button>
                        </div>
                        <div class="content_popular">
                            <div>
                                <p class="name_popular"><?= $pro['product_name'] ?></p>
                            </div>
                            <div>
                                <p class="price">Price</p>
                                <h4 class="number_price"><?= $pro['product_price'] ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </section>
        <!-- /* ==========================  ========================== */ -->
        <section class="hero_section">
            <div class="img_home_banner">
                <a href=""><img src="<?= 'client/assets/images/' ?>home/banner_child_02.png" alt=""
                        class="image text-center"></a>
            </div>
        </section>
        <!-- /* ==========================  ========================== */ -->
        <section class="categories_section">
            <div class="f_categories">
                <div class="container_home">
                    <h2>Trending Items</h2>
                </div>
                <div class="f_item_arrow">
                    <div><i class="fa-solid fa-angle-left"></i></div>
                    <div><i class="fa-solid fa-angle-right"></i></div>
                </div>
            </div>
            <div class="popular_items">
                <?php foreach ($products as $pro) : ?>
                <div class="flex_popular">
                    <div class="box_popular">
                        <div class="item_img">
                            <a href="#h">
                                <img src="./images/product/<?= $pro['product_image'] ?>" alt=""
                                    class="img_home_prd image text-center">
                            </a>
                            <button class="heart-button"><i class="fa-regular fa-heart"></i></button>
                            <button class="bag-button"><i class="fa-solid fa-bag-shopping"></i>Add</button>
                        </div>
                        <div class="content_popular">
                            <div>
                                <p class="name_popular">Watermelon Medium 4kg +</p>
                            </div>
                            <div>
                                <p class="price">Price</p>
                                <h4 class="number_price">$120.00</h4>
                            </div>
                        </div>
                    </div>

                </div>
                <?php endforeach ?>
            </div>
        </section>
        <!-- /* ==========================  ========================== */ -->
        <section class="categories_section">
            <div class="f_categories">
                <div class="container_home">
                    <h2>Special Offers</h2>
                </div>
                <div class="view_item">
                    <p>View All</p>
                </div>
            </div>
            <div class="popular_items">
                <div class="flex_popular">
                    <div class="box_popular">
                        <div class="item_img">
                            <img src="<?= $pro['product_image'] ?>" alt="" class="img_home_prd image text-center">
                            <button class="heart-button"><i class="fa-regular fa-heart"></i></button>
                            <button class="bag-button"><i class="fa-solid fa-bag-shopping"></i>Add</button>
                        </div>
                        <div class="content_popular">
                            <div>
                                <p class="name_popular">Watermelon Medium 4kg +</p>
                            </div>
                            <div>
                                <p class="price">Price</p>
                                <h4 class="number_price">$120.00</h4>
                            </div>
                        </div>
                    </div>
                    <div class="box_popular">
                        <div class="item_img">
                            <img src="<?= 'client/assets/images/' ?>home/prd_01.jpg" alt=""
                                class="img_home_prd image text-center">
                            <button class="heart-button"><i class="fa-regular fa-heart"></i></button>
                            <button class="bag-button"><i class="fa-solid fa-bag-shopping"></i>Add</button>
                        </div>
                        <div class="content_popular">
                            <div>
                                <p class="name_popular">turkish large family size red apple 12+ piece (kg)</p>
                            </div>
                            <div>
                                <p class="price">Price</p>
                                <div class="nav_items">
                                    <h4 class="number_price">$120.00</h4>
                                    <h4 class="number_price del_price">$120.00</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr class="h2r hr">
        <!-- /* ==========================  ========================== */ -->
        <section>
            <div class="f_item_pro flex">
                <div class="flex_end">
                    <div><img src="<?= 'client/assets/images/' ?>home/item_01.png" alt=""
                            class="item_img_pro img_home_prd image text-center"></div>
                    <div class="content_item">
                        <h5 class="font_h5">Quality & Savings</h5>
                        <p>Comprehensive quality control and affordable prices</p>
                    </div>
                </div>
                <div class="flex_end">
                    <div><img src="<?= 'client/assets/images/' ?>home/img_02.png" alt=""
                            class="item_img_pro img_home_prd image text-center"></div>
                    <div class="content_item">
                        <h5 class="font_h5">Fast Delivery</h5>
                        <p>Fast and convenient door to door delivery</p>
                    </div>
                </div>
                <div class="flex_end">
                    <div><img src="<?= 'client/assets/images/' ?>home/img_03.png" alt=""
                            class="item_img_pro img_home_prd image text-center"></div>
                    <div class="content_item">
                        <h5 class="font_h5">Secure Payments</h5>
                        <p>Different secure payment methods</p>
                    </div>
                </div>
                <div class="flex_end">
                    <div><img src="<?= 'client/assets/images/' ?>home/item_04.png" alt=""
                            class="item_img_pro img_home_prd image text-center"></div>
                    <div class="content_item">
                        <h5 class="font_h5">Proffessional Service</h5>
                        <p>Efficient customer support from passionate team</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<?php include '../views/client/layout/footer.php'; ?>