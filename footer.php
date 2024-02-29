<?php
require 'config/dbconfig.php';
?>
<!--Site Footer Start-->
<footer class="site-footer">
    <div class="site-footer__top">
        <div class="site-footer__shape-1">
            <img src="assets/images/shapes/site-footer-shape-1.png" alt="">
        </div>
        <div class="container">
            <div class="site-footer__top-inner">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="footer-widget__column footer-widget__about">
                            <div class="footer-widget__about-text-box">
                                <p class="footer-widget__about-text">With over 20 years of experience, Tag Production delivers exceptional exhibition stand design and build services globally. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="footer-widget__column footer-widget__Explore">
                            <div class="footer-widget__title-box">
                                <h3 class="footer-widget__title">Explore</h3>
                            </div>
                            <ul class="footer-widget__Explore-list list-unstyled">
                                <li><a href="javascript:void(0);">Home</a></li>
                                <li><a href="javascript:void(0);">OUR EXHIBITION STAND</a></li>
                                <li><a href="javascript:void(0);">CONTACT US</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    $stmt = $pdo->prepare("SELECT * FROM tb_contact");
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div class="footer-widget__column footer-widget__Contact">
                            <div class="footer-widget__title-box">
                                <h3 class="footer-widget__title">Contact</h3>
                            </div>
                            <ul class="footer-widget__Contact-list list-unstyled">
                                <li>
                                    <div class="icon">
                                        <span class="fas fa-phone-alt"></span>
                                    </div>
                                    <div class="text">
                                        <p><a href="javascript:void(0)"><?php echo $row['contactTel'] ?></a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                    <div class="text">
                                        <p><a href="mailto:<?php echo $row['contactMail'] ?>"><?php echo $row['contactMail'] ?></a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="site-footer__social">
                                        <a href="https://www.facebook.com/<?php echo $row['contactFacebook'] ?>"><i class="fab fa-facebook"></i></a>
                                        <a href="https://www.instagram.com/<?php echo $row['contactIg'] ?>"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <p class="site-footer__bottom-text">© All Copyright <a href="#">Tag Production</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Site Footer End-->