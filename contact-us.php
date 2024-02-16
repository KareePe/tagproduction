<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Exhibition Stand - Tag Production</title>
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

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>/</span></li>
                        <li>Contact</li>
                    </ul>
                    <h2>Contact Us</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <!--Main Slider End-->

        <!--Contact Two Start-->
        <section class="contact-two">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-two__left">
                            <div class="contact-two__img">
                                <img src="assets/images/resources/contact-two-img-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-two__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">contact with us</span>
                                <h2 class="section-title__title">Get in touch now</h2>
                            </div>
                            <p class="contact-two__text-1">Lorem ipsum dolor sit amet, consectetur notted adipis not
                                icing elit sed do eiusmod tempor incididunt.</p>
                            <ul class="list-unstyled contact-two__list">
                                <li>
                                    <div class="icon">
                                        <i class="icon-telephone"></i>
                                    </div>
                                    <div class="content">
                                        <p>Have any question?</p>
                                        <h4> <span>Free</span> <a href="tel:230009850">+23 (000)-9850</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="icon-email"></i>
                                    </div>
                                    <div class="content">
                                        <p>Write email</p>
                                        <h4><a href="mailto:needhelp@company.com">needhelp@company.com</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="icon-pin"></i>
                                    </div>
                                    <div class="content">
                                        <p>Visit anytime</p>
                                        <h4>30 broklyn golden street. New York</h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact Two End-->

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