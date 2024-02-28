<?php
require 'config/dbconfig.php';
?>
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
            <div class="page-header-bg" style="background-image: url(images/lanos/LINE_ALBUM_Avani_240213_0.jpg)">
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
                                <img src="images/contact-two-img-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-two__right">
                            <div class="section-title text-left">
                                <!-- <span class="section-title__tagline">contact with us</span> -->
                                <h2 class="section-title__title">contact with us</h2>
                            </div>
                            <?php
                            $stmt = $pdo->prepare("SELECT * FROM tb_contact");
                            $stmt->execute();
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <ul class="list-unstyled contact-two__list">
                                <li>
                                    <div class="icon">
                                        <i class="icon-telephone"></i>
                                    </div>
                                    <div class="content">
                                        <p>TEL</p>
                                        <h4><a href="javascript:void(0)"><?php echo $row['contactTel'] ?></a></h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="icon-email"></i>
                                    </div>
                                    <div class="content">
                                        <p>Write email</p>
                                        <h4><a href="mailto:<?php echo $row['contactMail'] ?>"><?php echo $row['contactMail'] ?></a></h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fab fa-facebook"></i>
                                    </div>
                                    <div class="content">
                                        <p>Visit Fanpage</p>
                                        <h4><?php echo $row['contactFacebook'] ?></h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fab fa-instagram"></i>
                                    </div>
                                    <div class="content">
                                        <p>Visit Instagram</p>
                                        <h4><?php echo $row['contactIg'] ?></h4>
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