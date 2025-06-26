<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Your Cart - Review Your Selection | Gibmarnel Kenya</title>
    <meta name="description"
        content="Review your selected dogs, puppies and pet products in your Gibmarnel cart. Your perfect companions are just one step away. Contact +254 743 136920 for assistance.">
    <meta name="keywords" content="Gibmarnel cart, dog purchase, puppy cart, pet products cart">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <link rel="canonical" href="https://gibmarnel.com/cart">
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../ms-icon-144x144.html">
    <meta name="theme-color" content="#ffffff">

    <!-- Latest compiled and minified CSS -->
    <link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/js/bootstrap.min.js">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- StyleSheet link CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/mediaqueries.css" rel="stylesheet" type="text/css">
    <link href="assets/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/owl.theme.default.min.css" rel="stylesheet" type="text/css">
    <link href="../../unpkg.com/aos%402.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
</head>

<body>
    <div class="sub-banner-section-outer">
        @include('header')
        <!-- SUB BANNER SECTION -->
        <section class="banner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-12 col-sm-12 col-12 d-lg-block d-none"></div>
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 text-center">
                        <div class="banner-section-content">
                            <h1 data-aos="fade-up">Your Cart</h1>
                            <p data-aos="fade-right">Review your selected dogs, puppies, and pet products before
                                proceeding to checkout. Your perfect companions and their essentials are just one step
                                away.</p>
                            <div class="btn_wrapper" data-aos="fade-up">
                                <span>Home </span><span class="slash">/</span><span class="sub_span"> Cart</span>
                            </div>
                            <figure class="sub_banner_content_top_shape mb-0 position-absolute left_right_shape">
                                <img src="assets/images/sub_banner_content_top_shape.png" alt=""
                                    class="img-fluid">
                            </figure>
                            <figure class="sub_banner_pink_foot_shape mb-0 position-absolute top_bottom_shape">
                                <img src="assets/images/sub_banner_pink_foot.png" alt="" class="img-fluid">
                            </figure>
                            <figure class="sub_banner_green_foot_shape mb-0 position-absolute top_bottom_shape">
                                <img src="assets/images/sub_banner_green_foot.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 col-12 d-lg-block d-none"></div>
                </div>
                <figure class="sub_banner_left_shape mb-0 position-absolute top_bottom_shape">
                    <img src="assets/images/sub_banner_left_shape.png" alt="" class="img-fluid">
                </figure>
                <figure class="sub_banner_right_shape mb-0 position-absolute top_bottom_shape">
                    <img src="assets/images/sub_banner_right_shape.png" alt="" class="img-fluid">
                </figure>
            </div>
        </section>
    </div>
    <!-- CART SECTION -->
    <div class="product-section nft-section checkout-section cart-section">
        <div class="container">
            <div class="row wow fadeInUp" data-aos="fade-up" data-wow-duration="2s">
                <div class="col-12">
                    <div class="preview-box product-detail-box">
                        <div class="shopping-cart">
                            <div class="column-labels">
                                <label class="product-image">Image</label>
                                <label class="product-details">Product</label>
                                <label class="product-price">Price</label>
                                <label class="product-quantity">Quantity</label>
                                <label class="product-removal">Remove</label>
                                <label class="product-line-price">Total</label>
                            </div>
                            <div class="product d-md-flex d-block align-items-center">
                                <div class="product-image">
                                    <img src="assets/images/our_store_image1.png" alt=""
                                        class="img-fluid hover-effect">
                                </div>
                                <div class="product-details">
                                    <div class="product-title">Purina cat chow defense plus</div>
                                </div>
                                <div class="product-price">12.99 $</div>
                                <div class="product-quantity">
                                    <input type="number" value="2" min="1">
                                </div>
                                <div class="product-removal">
                                    <button class="remove-product">Remove</button>
                                </div>
                                <div class="product-line-price">25.98</div>
                            </div>
                            <div class="product d-md-flex d-block align-items-center">
                                <div class="product-image">
                                    <img src="assets/images/our_store_image2.png" alt=""
                                        class="img-fluid hover-effect">
                                </div>
                                <div class="product-details">
                                    <div class="product-title">Purina beneful perros</div>
                                </div>
                                <div class="product-price">45.99 $</div>
                                <div class="product-quantity">
                                    <input type="number" value="1" min="1">
                                </div>
                                <div class="product-removal">
                                    <button class="remove-product">Remove</button>
                                </div>
                                <div class="product-line-price">45.99</div>
                            </div>
                        </div>
                        <div class="btn-outer text-center">
                            <a class="btn default-btn float-sm-right hover-effect" href="checkout.html">Proceed to
                                checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- STATISTICS_NEWSLETTER COMBO SECTION -->
    @include('footer')
    <!-- Latest compiled JavaScript -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="../../unpkg.com/aos%402.3.1/dist/aos.js"></script>
    <script src="assets/js/owl.carousel.js"></script>
    <script src="assets/js/carousel.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/video-popup.js"></script>
    <script src="assets/js/video-section.js"></script>
    <script src="assets/js/remove-product.js"></script>
</body>

</html>
