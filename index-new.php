<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tag Production</title>
    <?php
    include_once("head.php");
    ?>
</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->

    <div class="page-wrapper">
        <?php
        include_once("nav.php");
        ?>

        <!--Main Slider Start-->
        <section class="main-slider clearfix">
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                "delay": 5000
                }}'>
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url(images/slide/slide-1.jpg);"></div>
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="main-slider__content">
                                        <h2 class="main-slider__title">Modern <br> Residential <br> Apartments</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url(images/slide/slide-2.jpg);"></div>
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="main-slider__content">
                                        <h2 class="main-slider__title">Modern <br> Residential <br> Apartments</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url(images/slide/slide-3.jpg);"></div>
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="main-slider__content">
                                        <h2 class="main-slider__title">Modern <br> Residential <br> Apartments</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- If we need navigation buttons -->
                <div class="main-slider__nav">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                        <i class="icon-left-arrow"></i>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                        <i class="icon-right-arrow"></i>
                    </div>
                </div>

            </div>
        </section>
        <!--Main Slider End-->

        <section class="value-two">
            <div class="value-two__wrap">
                <div class="value-two__left">
                    <div class="value-two__bg" style="background-image: url(assets/images/backgrounds/value-two-bg.jpg);"></div>
                </div>
                <div class="value-two__right">
                    <div class="value-two__shape-1">
                        <img src="assets/images/shapes/value-two-shape-1.png" alt="">
                    </div>
                    <div class="value-two__right-content">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">apartment features</span>
                            <h2 class="section-title__title">Values of smart living in vista residence</h2>
                        </div>
                        <p class="value-two__text">Lorem ipsum simply free text available in the market. At vero eos et
                            accusamus et iusto odio dig ducimus qui blan ditiis sit praesentium.</p>
                        <div class="value-two__points-box">
                            <ul class="list-unstyled value-two__points">
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Wellness</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Library</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Shopping</p>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-unstyled value-two__points value-two__points-two">
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Fitness</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Restaurant</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Fashion</p>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-unstyled value-two__points value-two__points-three">
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Conference</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Bars</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Swmming Pull</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="team-two">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">meet the team</span>
                    <h2 class="section-title__title">Our expert agents</h2>
                </div>
                <div class="row">
                    <!--Team Two Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img src="assets/images/team/team-two-img-1-1.jpg" alt="">
                                </div>
                                <div class="team-two__hover">
                                    <h3 class="team-two__hover-name"><a href="agents.html">Sandar sims</a></h3>
                                    <p class="team-two__hover-sub-title">Area agent</p>
                                    <div class="team-two__social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__name"><a href="agents.html">Sandar sims</a></h3>
                                <p class="team-two__sub-title">Area agent</p>
                            </div>
                        </div>
                    </div>
                    <!--Team Two Single End-->
                    <!--Team Two Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img src="assets/images/team/team-two-img-1-2.jpg" alt="">
                                </div>
                                <div class="team-two__hover">
                                    <h3 class="team-two__hover-name"><a href="agents.html">Mike hardson</a></h3>
                                    <p class="team-two__hover-sub-title">Area agent</p>
                                    <div class="team-two__social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__name"><a href="agents.html">Mike hardson</a></h3>
                                <p class="team-two__sub-title">Area agent</p>
                            </div>
                        </div>
                    </div>
                    <!--Team Two Single End-->
                    <!--Team Two Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img src="assets/images/team/team-two-img-1-3.jpg" alt="">
                                </div>
                                <div class="team-two__hover">
                                    <h3 class="team-two__hover-name"><a href="agents.html">Jessica brown</a></h3>
                                    <p class="team-two__hover-sub-title">Area agent</p>
                                    <div class="team-two__social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__name"><a href="agents.html">Jessica brown</a></h3>
                                <p class="team-two__sub-title">Area agent</p>
                            </div>
                        </div>
                    </div>
                    <!--Team Two Single End-->
                    <!--Team Two Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img src="assets/images/team/team-two-img-1-4.jpg" alt="">
                                </div>
                                <div class="team-two__hover">
                                    <h3 class="team-two__hover-name"><a href="agents.html">Kevin martin</a></h3>
                                    <p class="team-two__hover-sub-title">Area agent</p>
                                    <div class="team-two__social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__name"><a href="agents.html">Kevin martin</a></h3>
                                <p class="team-two__sub-title">Area agent</p>
                            </div>
                        </div>
                    </div>
                    <!--Team Two Single End-->
                </div>
            </div>
        </section>

        <?php
        include_once("footer.php");
        ?>


    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="/" aria-label="logo image"><img src="assets/images/resources/logo-2.png" width="122" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">needhelp@agrion.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <?php
    include_once("script.php");
    ?>
</body>

</html>