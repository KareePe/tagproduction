<?php
$site = $_SERVER['REQUEST_URI'];
?>
<header class="main-header-two">
    <nav class="main-menu main-menu-two bg-black">
        <div class="main-menu-two__wrapper">
            <div class="main-menu-two__wrapper-inner">
                <div class="main-menu-two__left">
                    <div class="main-menu-two__logo">
                        <a href="/"><img src="assets/images/resources/logo-2.png" alt=""></a>
                    </div>
                </div>
                <div class="main-menu-two__main-menu-box">
                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                    <ul class="main-menu__list">
                        <li class="li__list">
                            <a href="index">Home</a>
                        </li>
                        <!-- <li class="dropdown <?php if ($site == 'exhibition') echo 'current'; ?>">
                            <a href="javascript:void(0)">Our Exhibition Stand</a>
                            <ul class="shadow-box">
                                <li><a href="exhibition?type=exhibition">Exhibition</a></li>
                                <li><a href="exhibition?type=event">Event</a></li>
                            </ul>
                        </li> -->
                        <li class="dropdown li__list">
                            <a href="javascript:void(0);">Our Exhibition Stand</a>
                            <ul class="shadow-box">
                                <?php
                                $nav = $pdo->prepare("SELECT * FROM tb_type WHERE typeStatus = 'on'");
                                $nav->execute();
                                while ($rowNav = $nav->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);"><?php echo $rowNav['typeName'] ?></a>
                                        <ul>
                                            <?php
                                            $dropdown = $pdo->prepare("SELECT * FROM tb_work WHERE typeName = :typeName");
                                            $dropdown->bindparam(":typeName", $rowNav['typeName']);
                                            $dropdown->execute();

                                            while ($dropDownRow = $dropdown->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <li><a href="exhibition?type=<?php echo $rowNav['typeName'] ?>&sub=<?php echo $dropDownRow['workName'] ?>"><?php echo $dropDownRow['workName'] ?></a></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="li__list">
                            <a href="contact-us">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="main-menu-two__right" style="display: none;">
                    <div class="main-menu-two__search-btn-box">
                        <div class="main-menu-two__btn-box">
                            <a href="contact.html" class="thm-btn main-menu-two__btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="stricky-header stricked-menu main-menu main-menu-two">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->