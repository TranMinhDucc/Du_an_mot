<?php include '../views/client/layout/header.php'; ?>
<link
    href="https://fonts.googleapis.com/css2?family=Saira+Semi+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
<link rel="stylesheet" href="client/assets/css/product-detail.css">
<link rel="stylesheet" href="client/assets/css/style.css">
<main>
    <div class="product-page">
        <div class="page">
            <div class="product-images">
                <img src="<?php $productDetail['product_image'] ?>" alt="Main Product" class="main-image" />

                <!-- <div class="thumbnails">
                    <img src="../public/images/product-detail/01.jpg" alt="" />
                    <img src="../public/images/product-detail/01.jpg" alt="" />
                    <img src="../public/images/product-detail/01.jpg" alt="" />
                    <img src="../public/images/product-detail/01.jpg" alt="" />

                </div> -->
            </div>

            <!-- Product Info -->
            <div class="product-info">
                <div class="info">
                    <div class="navigation">
                        <a href="#" class="prev">← Prev Product</a>
                        <a href="#" class="next">Next Product →</a>
                    </div>
                    <h1><?= $productDetail['product_name'] ?></h1>
                    <p>SKU: 1234567 &nbsp; | &nbsp; BRAND: RADHUNI</p>
                    <div class="price">
                        <span
                            class="old-price"><?= number_format($productDetail['product_price'] * 1000, 0, ',', '.')  ?></span>
                        <span
                            class="new-price"><?= number_format($productDetail['product_sale_price'] * 1000, 0, ',', '.') ?></span>
                        <span class="per-kilo">/Per Kilo</span>
                    </div>

                    <div class="rating">
                        <label for="">Weight: </label>
                        <?php foreach ($productDetail['variants'] as $variant): ?>
                            <div class="variants">
                                <button class="variant"><?php $variant['product_variant_weight'] ?></button>

                            </div>

                    </div>
                    <p class="description">
                        <?= $productDetail['product_description'] ?>
                    </p>
                    <div class="tags">
                        <label for=""> Total amount:</label>
                        <span class="total_price">1200</span>

                    </div>
                <?php endforeach ?>
                <div class="share">
                    <label for="">Share:</label>
                    <ul class="details-share-list">
                        <li>
                            <a href="#" class="icofont-facebook"><i class="fa-brands fa-facebook"></i></a>
                        </li>

                        <li>
                            <a href="#" class="icofont-twitter"><i class="fa-brands fa-twitter"></i></a>
                        </li>

                        <li>
                            <a href="#" class="icofont-linkedin"><i class="fa-brands fa-linkedin"></i></a>
                        </li>

                        <li>
                            <a href="#" class="icofont-instagram"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="actions">
                    <button class="add-to-cart">
                        <div class="carts">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <div class="cart">ADD TO CART</div>
                        </div>
                    </button>
                    <div class="wish-shuffle">
                        <button class="add-to-wish">
                            <i class="fa-solid fa-heart"></i>
                            <div class="wish">ADD TO WISH</div>
                        </button>
                        <button class="compares">
                            <i class="fa-solid fa-shuffle"></i>
                            <div class="compare">COMPARE THIS</div>
                        </button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="containers">
        <div class="review-header">
            <a href="#" class="active">REVIEWS</a>
        </div>
        <div class="review-card">
            <div class="review-header-info">
                <div class="infos">
                    <div class="img-name-date">
                        <img src="../public/images/product-detail/Avatar.jpg" alt="User Image" />
                        <div>
                            <div class="author-name">Tran thi</div>
                            <div class="review-date">June 02, 2020</div>
                        </div>
                    </div>
                    <div class="stars">
                        <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                        <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                        <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                        <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                        <i class="fa-regular fa-star" style="color: #ffd43b"></i>
                    </div>

                    <div class="review-content">
                        Lorem ipsum dolor sit amet consectetur adipiscing elit. Ducimus
                        hic amet qui velit, molestiae suscipit perferendis, autem
                        doloremque blanditiis dolores nulla excepturi ea nobis!
                    </div>
                    <div class="reply-section">
                        <input type="text" class="reply-input" placeholder="Reply Your Thoughts" />
                        <button class="reply-button">Reply</button>
                    </div>
                </div>

                <div class="reply-card">
                    <hr />
                    <div class="review-header-info">
                        <div class="img-name-date">
                            <img src="../public/images/product-detail/Avatar.jpg" alt="User Image" />
                            <div>
                                <div class="author-name">Thi tran</div>
                                <div class="review-date">Author - June 02, 2020</div>
                            </div>
                        </div>
                    </div>
                    <div class="review-content">
                        Lorem ipsum dolor sit amet consectetur adipiscing elit. Ducimus
                        hic amet qui velit, molestiae suscipit perferendis, autem
                        doloremque blanditiis dolores nulla excepturi ea nobis!
                    </div>
                    <div class="reply-section">
                        <input type="text" class="reply-input1" placeholder="Reply Your Thoughts" />
                        <button class="reply-button">Reply</button>
                    </div>
                </div>
                <div class="reply-card">
                    <hr />
                    <div class="review-header-info">
                        <div class="img-name-date">
                            <img src="../public/images/product-detail/Avatar.jpg" alt="User Image" />
                            <div>
                                <div class="author-name">Thi Dinh</div>
                                <div class="review-date">Author - June 02, 2020</div>
                            </div>
                        </div>
                    </div>
                    <div class="review-content">
                        Lorem ipsum dolor sit amet consectetur adipiscing elit. Ducimus
                        hic amet qui velit, molestiae suscipit perferendis, autem
                        doloremque blanditiis dolores nulla excepturi ea nobis!
                    </div>
                    <div class="reply-section">
                        <input type="text" class="reply-input1" placeholder="Reply Your Thoughts" />
                        <button class="reply-button">Reply</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="review-card">
            <div class="review-header-info">
                <div class="infos">
                    <div class="img-name-date">
                        <img src="../public/images/product-detail/Avatar.jpg" alt="User Image" />
                        <div>
                            <div class="author-name">Tran thi</div>
                            <div class="review-date">June 02, 2020</div>
                        </div>
                    </div>
                    <div class="stars">
                        <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                        <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                        <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                        <i class="fa-solid fa-star" style="color: #ffd43b"></i>
                        <i class="fa-regular fa-star" style="color: #ffd43b"></i>
                    </div>

                    <div class="review-content">
                        Lorem ipsum dolor sit amet consectetur adipiscing elit. Ducimus
                        hic amet qui velit, molestiae suscipit perferendis, autem
                        doloremque blanditiis dolores nulla excepturi ea nobis!
                    </div>
                    <div class="reply-section">
                        <input type="text" class="reply-input" placeholder="Reply Your Thoughts" />
                        <button class="reply-button">Reply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-details-frame">
        <div class="frame">
            <h3 class="frame-title">Add your review</h3>
            <form action="">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="star-rating">
                            <label for="start-1"><i class="fa-solid fa-star"></i></label>
                            <label for="start-1"><i class="fa-solid fa-star"></i></label>
                            <label for="start-1"><i class="fa-solid fa-star"></i></label>
                            <label for="start-1"><i class="fa-solid fa-star"></i></label>
                            <label for="start-1"><i class="fa-solid fa-star"></i></label>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea name="form-control" placeholder="Describe" id=""></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group-1">
                            <input type="text" class="form-control" placeholder="Name" />
                        </div>
                        <div class="form-group-1">
                            <input type="text" class="form-control" placeholder="Email" />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button class="btn">
                            <i class="fa-solid fa-droplet"></i>
                            <span>DROP YOUR REVIEW</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="related-title">
        <h2>Related This Items</h2>
    </div>
    <section class="inner-section">
        <div class="col">
            <div class="col-vv">
                <div class="product-card">
                    <span class="favorite-icon">
                        <i class="fa-regular fa-heart" style="color: red"></i>
                    </span>
                    <img src="../public/images/product-detail/ct1.jpg" alt="Watermelon" />
                    <h5 class="product-title">Watermelon Medium 4kg +</h5>
                    <div class="product-unit">Piece</div>
                    <div class="product-price">$120.00</div>
                    <button class="add-button">Add</button>
                </div>
            </div>

            <div class="col-vv">
                <div class="product-card">
                    <span class="favorite-icon">
                        <i class="fa-regular fa-heart" style="color: red"></i>
                    </span>
                    <img src="../public/images/product-detail/ct9.jpg" alt="Watermelon" />
                    <h5 class="product-title">Watermelon Medium 4kg +</h5>
                    <div class="product-unit">Piece</div>
                    <div class="product-price">$120.00</div>
                    <button class="add-button">Add</button>
                </div>
            </div>
            <div class="col-vv">
                <div class="product-card">
                    <span class="favorite-icon">
                        <i class="fa-regular fa-heart" style="color: red"></i>
                    </span>
                    <img src="../public/images/product-detail/ct3.jpg" alt="Watermelon" />
                    <h5 class="product-title">Watermelon Medium 4kg +</h5>
                    <div class="product-unit">Piece</div>
                    <div class="product-price">$120.00</div>
                    <button class="add-button">Add</button>
                </div>
            </div>
            <div class="col-vv">
                <div class="product-card">
                    <span class="favorite-icon">
                        <i class="fa-regular fa-heart" style="color: red"></i>
                    </span>
                    <img src="../public/images/product-detail/ct4.jpg" alt="Watermelon" />
                    <h5 class="product-title">Watermelon Medium 4kg +</h5>
                    <div class="product-unit">Piece</div>
                    <div class="product-price">$120.00</div>
                    <button class="add-button">Add</button>
                </div>
            </div>
            <div class="col-vv">
                <div class="product-card">
                    <span class="favorite-icon">
                        <i class="fa-regular fa-heart" style="color: red"></i>
                    </span>
                    <img src="../public/images/product-detail/ct5.jpg" alt="Watermelon" />
                    <h5 class="product-title">Watermelon Medium 4kg +</h5>
                    <div class="product-unit">Piece</div>
                    <div class="product-price">$120.00</div>
                    <button class="add-button">Add</button>
                </div>
            </div>
            <div class="col-vv">
                <div class="product-card">
                    <span class="favorite-icon">
                        <i class="fa-regular fa-heart" style="color: red"></i>
                    </span>
                    <img src="../public/images/product-detail/ct6.jpg" alt="Watermelon" />
                    <h5 class="product-title">Watermelon Medium 4kg +</h5>
                    <div class="product-unit">Piece</div>
                    <div class="product-price">$120.00</div>
                    <button class="add-button">Add</button>
                </div>
            </div>
            <div class="col-vv">
                <div class="product-card">
                    <span class="favorite-icon">
                        <i class="fa-regular fa-heart" style="color: red"></i>
                    </span>
                    <img src="../public/images/product-detail/ct7.jpg" alt="Watermelon" />
                    <h5 class="product-title">Watermelon Medium 4kg +</h5>
                    <div class="product-unit">Piece</div>
                    <div class="product-price">$120.00</div>
                    <button class="add-button">Add</button>
                </div>
            </div>
            <div class="col-vv">
                <div class="product-card">
                    <span class="favorite-icon">
                        <i class="fa-regular fa-heart" style="color: red"></i>
                    </span>
                    <img src="../public/images/product-detail/ct8.jpg" alt="Watermelon" />
                    <h5 class="product-title">Watermelon Medium 4kg +</h5>
                    <div class="product-unit">Piece</div>
                    <div class="product-price">$120.00</div>
                    <button class="add-button">Add</button>
                </div>
            </div>
            <div class="col-view">
                <div class="section-btn-25">
                    <a href="#h" class="btn btn-outline">
                        <i class="fa-solid fa-eye"></i>
                        <span>View all related</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main><?php include '../views/client/layout/footer.php'; ?>