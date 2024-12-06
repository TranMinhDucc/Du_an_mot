<?php include '../views/client/layout/header.php'; ?>
<link rel="stylesheet" href="client/assets/css/wishlish.css">

<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="hidden">
                        <li>Home</li> >
                        <li>Product</li> >
                        <li>Favourite</li>
                    </ul>
                    <div class="wish_list">
                        <h1>Wish List</h1>
                        <hr class="hr">
                    </div>

                    <div class="popular_items">
                        <?php foreach ($listWishlist as $favourite) : ?>
                            <div class="flex_popular">
                                <div class="box_popular">
                                    <div class="item_img">
                                        <a href="#h">
                                            <img src="./images/product/<?= $favourite['images'] ?>" alt=""
                                                class=" img_home_prd image text-center">
                                        </a>
                                        <button class="heart-button"><i class="fa-regular fa-heart"></i></button>
                                        <a href="?act=product-detail&slug=<?= $favourite['slug'] ?>">
                                            <button class="bag-button"><i
                                                    class="fa-solid fa-bag-shopping"></i>Add</button></a>
                                    </div>
                                    <div class="content_popular">
                                        <div>
                                            <p class="name_popular"><?= $favourite['name'] ?></p>
                                        </div>
                                        <div>
                                            <p class="price">Price</p>
                                            <div class="nav_items">
                                                <h4 class="number_price"><?= number_format($favourite['prices'] * 100) ?>
                                                </h4>
                                                <h4 class="number_price del_price"><?= $favourite['cost_price'] ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="button">
            <a href="?act=client"><button class="btn-primary">Trở về</button></a>
        </div>
    </section>
</main>
<?php include '../views/client/layout/footer.php'; ?>