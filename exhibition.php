<?php
require 'config/dbconfig.php';

$type = $_GET["type"];
$sub = $_GET["sub"];

// $sub = str_replace('-', ' ', $sub);

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
            <?php
            $workImg = $pdo->prepare("SELECT * FROM tb_img_work WHERE typeName = :typeName ORDER BY workImgId ASC LIMIT 1");
            $workImg->bindParam(":typeName", $sub);
            $workImg->execute();

            while ($rowWorkImg = $workImg->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="page-header-bg" style="background-image: url(<?php echo $rowWorkImg['base64Img'] ?>)">
                </div>
            <?php
            }
            ?>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>/</span></li>
                        <li><?php echo $_GET['type'] ?></li>
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
                    <span class="section-title__tagline"><?php echo $_GET['type'] ?></span>
                    <h2 class="section-title__title">Our Exhibition Stand</h2>
                </div>
                <?php
                if (isset($sub)) {
                ?>
                    <div class="row masonary-layout">
                        <?php
                        $work = $pdo->prepare("SELECT * FROM tb_img_work WHERE typeName = :typeName");
                        $work->bindParam(":typeName", $sub);
                        $work->execute();

                        while ($rowWork = $work->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <!--Gallery Three Single Start-->
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="gallery-three__single">
                                    <div class="gallery-three__img">
                                        <img src="<?php echo $rowWork['base64Img'] ?>" alt="">
                                        <div class="gallery-three__icon">
                                            <a class="img-popup" href="<?php echo $rowWork['base64Img'] ?>"><span class="fa fa-plus"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                } else {
                ?>
                    <!--Feature Three Start-->
                    <section class="feature-four">
                        <div class="container">
                            <div class="row">
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