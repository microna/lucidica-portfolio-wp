<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucidica Portfolio</title>
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <!-- <div class="ellipse-wrapper"> -->


        <!-- Navbar -->
        <div class="header">
            <div class="container">
                <nav class="navbar">
                    <div class="logo">
                        <a href="<?php echo home_url(); ?>"> <img
                                src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="logo" /></a>
                    </div>

                    <a href="#" class="menu__item-link" data-scroll><img
                            src="<?php echo get_template_directory_uri(); ?>/img/website.svg" alt="" />
                        https://lucidica.co.uk</a>

                    <a href="tel:02070426310" class="menu__item-link" data-scroll><img
                            src="<?php echo get_template_directory_uri(); ?>/img/call.svg" alt="" />020 7042
                        6310</a>

                    <a href="mailto:service@lucidica.com" class="menu__item-link" data-scroll><img
                            src="<?php echo get_template_directory_uri(); ?>/img/mail.svg"
                            alt="" />service@lucidica.com</a>
                </nav>

                <button class="burger">
                    <span></span>
                </button>
            </div>
        </div>
    </header>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>