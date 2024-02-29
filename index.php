<?php
require 'config/dbconfig.php';
?>
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
        <section class="main-slider clearfix" style="height: 100vh;">
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
                <div class="swiper-wrapper" style="height: 100vh;">
                    <?php
                    $stmt = $pdo->prepare("SELECT * FROM tb_slide WHERE slideStatus = 'on'");
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $decodedString = urldecode($row['slideTitle']);
                        // $title = str_replace("title=", "", $row['slideTitle']);
                    ?>
                        <div class="swiper-slide">
                            <div class="image-layer" style="background-image: url(<?php echo $row['slideImg'] ?>);height: 100vh;" ></div>
                            <!-- /.image-layer -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="main-slider__content">
                                            <h2 class="main-slider__title" style="display:none;"><?php echo $decodedString ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="swiper-slide">
                            <div class="image-layer" style="background-image: url(images/slide/slide-2.jpg);"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="main-slider__content">
                                            <h2 class="main-slider__title">Modern <br> Residential <br> Apartments</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <?php
                    }
                    ?>
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
                    <div class="value-two__bg" style="background-image: url(images/close-up-business-people-hands-together-teamwork-concept.jpg);"></div>
                </div>
                <div class="value-two__right">
                    <div class="value-two__shape-1">
                        <img style="display: none;" src="images/close-up-business-people-hands-together-teamwork-concept.jpg" alt="">
                    </div>
                    <div class="value-two__right-content">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">ABOUT US </span>
                            <h2 class="section-title__title">Award-Winning Exhibition Stands</h2>
                        </div>
                        <p class="value-two__text">With over 20 years of experience, Tag Production delivers exceptional exhibition stand design and build services globally. Our expert team understands your unique needs and creates stands that captivate audiences and effectively showcase your products or services. We combine design, construction, and project management expertise to ensure a seamless and successful exhibition experience.</p>
                        <div class="value-two__points-box">
                            <ul class="list-unstyled value-two__points">
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check" style="height: 16px;width: 16px;display: flex;justify-content: center;align-items: center;"></i>
                                    </div>
                                    <div class="text">
                                        <p>It's concise and to the point, grabbing attention quickly.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check" style="height: 16px;width: 16px;display: flex;justify-content: center;align-items: center;"></i>
                                    </div>
                                    <div class="text">
                                        <p>It highlights your experience and expertise, building trust with visitors.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check" style="height: 16px;width: 16px;display: flex;justify-content: center;align-items: center;"></i>
                                    </div>
                                    <div class="text">
                                        <p>It emphasizes the benefits you offer, focusing on client needs.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check" style="height: 16px;width: 16px;display: flex;justify-content: center;align-items: center;"></i>
                                    </div>
                                    <div class="text">
                                        <p>It uses strong action verbs like "deliver," "understand," and "create" to convey your impact.</p>
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
                    <span class="section-title__tagline">Service</span>
                    <h2 class="section-title__title">Our Service</h2>
                </div>
                <div class="row">
                    <!--Team Two Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img src="images/services/service-1.jpg" alt="">
                                </div>
                                <div class="team-two__hover">
                                    <h3 class="team-two__hover-name"><a href="javascript:void(0)">Creator</a></h3>
                                    <p class="team-two__hover-sub-title">Create the success from our inspiraion, Create you imagination to be the best</p>
                                </div>
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__name"><a href="javascript:void(0)">Creator</a></h3>
                                <p class="team-two__sub-title">Create the success from our inspiraion, Create you imagination to be the best</p>
                            </div>
                        </div>
                    </div>
                    <!--Team Two Single End-->
                    <!--Team Two Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img src="images/services/service-2.jpeg" alt="">
                                </div>
                                <div class="team-two__hover">
                                    <h3 class="team-two__hover-name"><a href="javascript:void(0)">Event & Organizer</a></h3>
                                    <p class="team-two__hover-sub-title">Managing ideas to make a difference In marketing Strategic plan</p>
                                </div>
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__name"><a href="javascript:void(0)">Event & Organizer</a></h3>
                                <p class="team-two__sub-title">Managing ideas to make a difference In marketing Strategic plan</p>
                            </div>
                        </div>
                    </div>
                    <!--Team Two Single End-->
                    <!--Team Two Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img src="images/services/service-3.jpeg" alt="">
                                </div>
                                <div class="team-two__hover">
                                    <h3 class="team-two__hover-name"><a href="javascript:void(0)">Design</a></h3>
                                    <p class="team-two__hover-sub-title">Create Design differentation and full function</p>
                                </div>
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__name"><a href="javascript:void(0)">Design</a></h3>
                                <p class="team-two__sub-title">Create Design differentation and full function</p>
                            </div>
                        </div>
                    </div>
                    <!--Team Two Single End-->
                    <!--Team Two Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img src="images/services/service-4.jpeg" alt="">
                                </div>
                                <div class="team-two__hover">
                                    <h3 class="team-two__hover-name"><a href="javascript:void(0)">Production</a></h3>
                                    <p class="team-two__hover-sub-title">Construction Controlling, including the inspection of the work quality make it come out perfect.</p>
                                </div>
                            </div>
                            <div class="team-two__content">
                                <h3 class="team-two__name"><a href="javascript:void(0)">Production</a></h3>
                                <p class="team-two__sub-title">Construction Controlling, including the inspection of the work quality make it come out perfect.</p>
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


    <?php
    $stmt = $pdo->prepare("SELECT * FROM tb_contact");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
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
                    <a href="mailto:<?php echo $row['contactMail'] ?>"><?php echo $row['contactMail'] ?></a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="javascript:void(0)"><?php echo $row['contactTel'] ?></a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="https://www.facebook.com/<?php echo $row['contactFacebook'] ?>" class="fab fa-facebook-square"></a>
                    <a href="https://www.instagram.com/<?php echo $row['contactIg'] ?>" class="fab fa-instagram"></a>
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