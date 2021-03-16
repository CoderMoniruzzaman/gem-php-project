<?php
require './index_view.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEMS</title>
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/all.css">
    <link rel="stylesheet" href="public/css/fontawesome.css">
    <link rel="stylesheet" href="public/css/animate.css">
    <link rel="stylesheet" href="public/css/slick.css">
    <link rel="stylesheet" href="public/css/sass/style.css">
</head>

<body>
    <!-- hedaer start -->
    <header class="header" id="header">
        <div class="head-top">
            <div class="container">
                <div class="row">
                    <!-- head social -->
                    <div class="col-lg-6">
                        <div class="header-social">
                            <span><a href="#"><i class="fab fa-facebook-f"></i></a></span>
                            <span><a href="#"><i class="fab fa-twitter"></i></a></span>
                            <span><a href="#"><i class="fab fa-google-plus-g"></i></a></span>
                            <span><a href="#"><i class="fab fa-linkedin-in"></i></a></span>
                            <span><a href="#"><i class="fab fa-pinterest-p"></i></a></span>
                            <span><a href="#"><i class="fab fa-instagram"></i></a></span>
                        </div>
                    </div>
                    <!-- head social end-->
                    <!-- head contact -->
                    <div class="col-lg-6">
                        <div class="head-contact">
                            <span>
                                <a href="tel:<?php echo $contact_after_assoc['phone']; ?>">
                                    <i class="fas fa-phone-square-alt mr-1"></i>
                                    <?php echo $contact_after_assoc['phone']; ?>
                                </a>
                            </span>
                        </div>
                    </div>
                    <!-- head contact end-->
                </div>
            </div>
        </div>
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- logo -->
                <a class="navbar-brand" href="index.php">
                    <img src="public/upload/logo/<?php echo $logo_after_assoc['logo']; ?>" alt="" class="img-fluid">
                </a>
                <!-- logo end -->
                <!-- Toggle start -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Toggle end -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- Main menu start -->
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Our Listings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">For Buyers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">For Sellers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <!-- Main menu end -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar start -->

    </header>
    <!-- hedaer end -->
    <!-- banner part -->
    <section id="banner">
        <div class="banner-image"
            style="background-image:url('./public/upload/banner/<?php echo $banner_after_assoc['banner_image']; ?>');">
            <div class="container">
                <!-- banner text row part -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- banner text part -->
                        <div class="banner-text">
                            <h1><?php echo $banner_after_assoc['banner_heading']; ?></h1>
                            <h3><?php echo $banner_after_assoc['banner_slog']; ?></h3>
                            <div class="banner-line"></div>
                        </div>
                        <!-- banner text part end-->
                    </div>
                </div>
                <!-- banner text row part end-->
                <!-- banner search row part start-->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- banner search part -->
                        <div class="banner-search">
                            <!-- banner search form part -->
                            <form class="banner-form" action="">
                                <div class="main-search-input">
                                    <!-- banner search input item-1-->
                                    <div class="banner-input">
                                        <span>Property Type:</span>
                                        <div class="select-box">
                                            <select name="" id="" class="property-input-item">
                                                <option value=""></option>
                                                <option value="">1</option>
                                                <option value="">1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- banner search input item-2-->
                                    <div class="banner-input">
                                        <span>City:</span>
                                        <div class="select-box">
                                            <select name="" id="" class="city-input-item">
                                                <option value=""></option>
                                                <option value="">1</option>
                                                <option value="">1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- banner search input item-3-->
                                    <div class="banner-input">
                                        <span>Min.Price:</span>
                                        <div class="select-box">
                                            <select name="" id="" class="price-input-item">
                                                <option value=""></option>
                                                <option value="">1</option>
                                                <option value="">1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- banner search input item-4-->
                                    <div class="banner-input">
                                        <span>Max.Price:</span>
                                        <div class="select-box">
                                            <select name="" id="" class="price-input-item">
                                                <option value=""></option>
                                                <option value="">1</option>
                                                <option value="">1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- banner search input item-5-->
                                    <div class="banner-input">
                                        <span>Bed:</span>
                                        <div class="select-box">
                                            <select name="" id="" class="bed-input-item">
                                                <option value=""></option>
                                                <option value="">1</option>
                                                <option value="">1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- banner search input item-6-->
                                    <div class="banner-input">
                                        <span>Bath:</span>
                                        <div class="select-box">
                                            <select name="" id="" class="bath-input-item">
                                                <option value=""></option>
                                                <option value="">1</option>
                                                <option value="">1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- banner search button start-->
                                <div class="search-button">
                                    <button type="submit" class="active">Search</button>
                                    <button type="submit">Advance Search</button>
                                </div>
                            </form>
                        </div>
                        <!-- banner search part end-->
                    </div>
                </div>
                <!-- banner search row part start end-->
            </div>
        </div>
    </section>
    <!-- banner part end-->
    <!-- Image view part -->
    <section class="image-view">
        <div class="container-fluid">
            <div class="image-view-row">
                <!-- Image view item-1 -->
                <?php
                    foreach ($property_image_result as $value) {
                ?>
                <div class="image-view-grid">
                    <img src="public/upload/property_image/<?php echo $value['photo_image']; ?>" alt="">
                    <div class="overlay">
                        <div class="text">
                            <h5><?php echo $value['photo_heading']; ?></h5>
                            <p>
                                <?php echo $value['photo_slog']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="clr"></div>
            </div>
        </div>
    </section>
    <!-- Image view part end-->

    <!-- About part -->
    <section id="about" class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 p-l-0 text-center">
                    <div class="about-image">
                        <img src="public/upload/about/<?php echo $about_after_assoc['about_image']; ?>" alt=""
                            class="rounded-circle">
                    </div>
                </div>
                <!-- about text -->
                <div class="col-lg-8">
                    <div class="about-text">
                        <h6>
                            About <br>
                            Gems
                        </h6>
                        <p>
                            <?php echo $about_after_assoc['about_description']; ?>
                        </p>
                        <div class="about-btn">
                            <a href="#">VIEW DETAILS >></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About part end-->
    <!-- Property part -->
    <section class="property">
        <div class="container">
            <div class="row">
                <?php
                    foreach ($property_result as $value) {
                ?>
                <!-- property item-1 -->
                <div class="col-lg-3 p-l-0">
                    <div class="property-item">
                        <div class="property-item-image">
                            <img src="public/upload/property/<?php echo $value['image']; ?>" alt="">
                            <div class="overlay">
                                <div class="overlay-btn">
                                    <a href="<?php echo $value['link']; ?>" class="property-btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="property-text">
                            <h6>$<?php echo $value['price']; ?></h6>
                            <span><?php echo $value['union']; ?></span>
                            <p><?php echo $value['address']; ?></p>
                        </div>
                    </div>
                </div>
                <!-- property item-1 end-->
                <?php }?>
            </div>
        </div>
        </div>
    </section>
    <!-- Property part end-->
    <!-- testimonial part start-->
    <section class="testimonial" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bg">
                        <div class="client-head">
                            <h3>Client Testimonials</h3>
                        </div>
                        <!-- testimonial slider start -->
                        <div class="client-slider">
                            <?php 
                                foreach ($client_result as $value) { 
                            ?>
                            <!-- testimonial slider item-1 start -->
                            <div class="client-slider-inner">
                                <div class="slider-content">
                                    <div class="image">
                                        <img src="public/upload/client/<?php echo $value['image']; ?>" alt="">
                                    </div>
                                    <p>
                                        <?php echo $value['description']; ?>
                                    </p>
                                    <div class="name-client">
                                        <span>-</span><?php echo $value['name']; ?>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <!-- testimonial slider item-1 end -->


                        </div>
                        <!-- testimonial slider end -->
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- testimonial part end-->

    <!-- Contact part start-->
    <section class="contact">
        <!-- contact address part start -->
        <div class="address-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-11 m-auto">
                        <h3>Address</h3>
                        <div class="address-item">
                            <ul>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php echo $contact_after_assoc['address']; ?>
                                </li>
                                <li><i class="fas fa-phone-alt"></i><?php echo $contact_after_assoc['phone']; ?></li>
                                <li><i class="fas fa-envelope"></i><?php echo $contact_after_assoc['email']; ?></li>
                                <li><i class="fas fa-globe"></i><?php echo $contact_after_assoc['web']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact address part start -->
        <!-- contact message part start -->
        <div class="conact-bg-image"
            style="background-image: url('./public/upload/contact/<?php echo $contact_after_assoc['conact_image']; ?>');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <div class="contact-form">
                            <h6>Get In Touch</h6>
                            <form action="" class="contact-form-main">
                                <div class="field-row">
                                    <div class="input-item-one">
                                        <span>Name:</span>
                                        <div class="input-box">
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="input-item-two">
                                        <span>Email:</span>
                                        <div class="input-box">
                                            <input type="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="message-field-row">
                                    <span>Message:</span>
                                    <div class="input-box">
                                        <textarea name=""></textarea>
                                    </div>
                                </div>
                                <div class="contact-button">
                                    <button type="submit">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact message part start -->
    </section>
    <!-- Contact part end-->
    <!-- footer part start -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- footer menu -->
                    <div class="footer-menu-main">
                        <ul>
                            <li>
                                <a href="">Financing</a>
                            </li>
                            <li>
                                <a href="">Local Info</a>
                            </li>
                            <li>
                                <a href="">Search</a>
                            </li>
                            <li>
                                <a href="">Partners</a>
                            </li>
                            <li>
                                <a href="">Contact</a>
                            </li>
                            <li>
                                <a href="">Tool</a>
                            </li>
                            <li>
                                <a href="">List with Us</a>
                            </li>
                            <li>
                                <a href="">Relocattion</a>
                            </li>
                        </ul>
                    </div>
                    <!-- footer menu end-->
                    <div class="footer-socail">
                        <ul>
                            <li>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-google-plus-g"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-pinterest-p"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="copy-right">
                        <p>© 2021 gems.com. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end -->
    <!-- scripts -->
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.js"></script>
    <script src="public/js/fontawesome.min.js"></script>
    <script src="public/js/slick.min.js"></script>
    <script src="public/js/custom.js"></script>
</body>

</html>