<?php
$type = $_GET["type"];
$sub = $_GET["sub"];

$sub = str_replace('-', ' ', $sub);

if (!isset($type) || $type === '') header("location:/");
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
            <div class="page-header-bg" style="background-image: url(images/hi-top-tech/8f3efadb-c748-499f-b03b-a6ba55647893.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>/</span></li>
                        <li>Exhibition</li>
                    </ul>
                    <?php
                    if (isset($sub)) {
                        echo '<h2>' . $sub . '</h2>';
                    }
                    ?>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <!--Main Slider End-->

        <section class="team-two">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Exhibition</span>
                    <h2 class="section-title__title">Our Exhibition Stand</h2>
                </div>
                <?php
                if (isset($sub)) {
                ?>
                    <div class="row masonary-layout">
                        <!--Gallery Three Single Start-->
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="gallery-three__single">
                                <div class="gallery-three__img">
                                    <img src="images/hi-top-tech/3c870f83-01ae-4c28-bd59-74b94d688d7f.jpg" alt="">
                                    <div class="gallery-three__icon">
                                        <a class="img-popup" href="images/hi-top-tech/3c870f83-01ae-4c28-bd59-74b94d688d7f.jpg"><span class="fa fa-plus"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Gallery Three Single Start-->
                        <!--Gallery Three Single Start-->
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="gallery-three__single">
                                <div class="gallery-three__img">
                                    <img src="images/hi-top-tech/8f3efadb-c748-499f-b03b-a6ba55647893.jpg" alt="">
                                    <div class="gallery-three__icon">
                                        <a class="img-popup" href="images/hi-top-tech/8f3efadb-c748-499f-b03b-a6ba55647893.jpg"><span class="fa fa-plus"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Gallery Three Single Start-->
                        <!--Gallery Three Single Start-->
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="gallery-three__single">
                                <div class="gallery-three__img">
                                    <img src="images/hi-top-tech/8f8b6eff-8e41-4d6b-aef2-bb4d15d435a4.jpg" alt="">
                                    <div class="gallery-three__icon">
                                        <a class="img-popup" href="images/hi-top-tech/8f8b6eff-8e41-4d6b-aef2-bb4d15d435a4.jpg"><span class="fa fa-plus"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Gallery Three Single Start-->
                        <!--Gallery Three Single Start-->
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="gallery-three__single">
                                <div class="gallery-three__img">
                                    <img src="images/hi-top-tech/d26a59c3-03db-4ec8-94d8-6a1d7873dad3.jpg" alt="">
                                    <div class="gallery-three__icon">
                                        <a class="img-popup" href="images/hi-top-tech/d26a59c3-03db-4ec8-94d8-6a1d7873dad3.jpg"><span class="fa fa-plus"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Gallery Three Single Start-->
                        <!--Gallery Three Single Start-->
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="gallery-three__single">
                                <div class="gallery-three__img">
                                    <img src="images/hi-top-tech/e88a9a65-9b77-4165-9648-3985f92ce9c2.jpg" alt="">
                                    <div class="gallery-three__icon">
                                        <a class="img-popup" href="images/hi-top-tech/e88a9a65-9b77-4165-9648-3985f92ce9c2.jpg"><span class="fa fa-plus"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Gallery Three Single Start-->
                        <!--Gallery Three Single Start-->
                        <!-- <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="gallery-three__single">
                                <div class="gallery-three__img">
                                    <img src="assets/images/gallery/gallery-3-6.jpg" alt="">
                                    <div class="gallery-three__icon">
                                        <a class="img-popup" href="assets/images/gallery/gallery-3-6.jpg"><span class="fa fa-plus"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!--Gallery Three Single Start-->
                        <!--Gallery Three Single Start-->
                        <!-- <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="gallery-three__single">
                                <div class="gallery-three__img">
                                    <img src="assets/images/gallery/gallery-3-7.jpg" alt="">
                                    <div class="gallery-three__icon">
                                        <a class="img-popup" href="assets/images/gallery/gallery-3-7.jpg"><span class="fa fa-plus"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!--Gallery Three Single Start-->
                    </div>
                <?php
                } else {
                ?>
                    <!--Feature Three Start-->
                    <section class="feature-four">
                        <div class="container">
                            <div class="row">
                                <!--Feature Three Single Start-->
                                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                                    <div class="feature-four__single">
                                        <div class="feature-four__img-box">
                                            <div class="feature-four__img">
                                                <img src="assets/images/resources/feature-four-1-1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="feature-four__content">
                                            <h3 class="feature-four__title"><a href="exhibition?type=<?php echo $type ?>&sub=pet-world">Living experience</a></h3>
                                            <p class="feature-four__text">There are many variations of passages of available, but
                                                the majority have in some form, by humour words.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Feature Three Single End-->
                                <!--Feature Three Single Start-->
                                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                                    <div class="feature-four__single">
                                        <div class="feature-four__img-box">
                                            <div class="feature-four__img">
                                                <img src="assets/images/resources/feature-four-1-2.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="feature-four__content">
                                            <h3 class="feature-four__title"><a href="exhibition?type=<?php echo $type ?>&sub=pet-world">Property management</a></h3>
                                            <p class="feature-four__text">There are many variations of passages of available, but
                                                the majority have in some form, by humour words.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Feature Three Single End-->
                                <!--Feature Three Single Start-->
                                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                                    <div class="feature-four__single">
                                        <div class="feature-four__img-box">
                                            <div class="feature-four__img">
                                                <img src="assets/images/resources/feature-four-1-3.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="feature-four__content">
                                            <h3 class="feature-four__title"><a href="exhibition?type=<?php echo $type ?>&sub=pet-world">Premium places</a></h3>
                                            <p class="feature-four__text">There are many variations of passages of available, but
                                                the majority have in some form, by humour words.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Feature Three Single End-->
                            </div>
                        </div>
                    </section>
                    <!--Feature Three End-->
                <?php
                }
                ?>
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