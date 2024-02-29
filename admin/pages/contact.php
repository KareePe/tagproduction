<?php
require '../../config/dbconfig.php';
if (empty($_SESSION['user_id'])) {
    header('Location: ../');
}
?>
<!-- - var menuBorder = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php
include_once("../components/head.php");
?>

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
    <?php
    include_once '../components/topnav.php';
    ?>


    <?php
    include_once '../components/sidebar.php';
    ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="base-style">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">จัดการข้อมูลติดต่อ</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <form class="form-horizontal form-simple form-contact" id="form-contact" method="post" enctype="multipart/form-data" novalidate>
                                            <div class="modal-body">
                                                <?php
                                                $stmt = $pdo->prepare("SELECT * FROM tb_contact");
                                                $stmt->execute();

                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                    <fieldset class="form-group mb-2">
                                                        <div class="controls">
                                                            <label for="phone">เบอร์โทรติดต่อ</label>
                                                            <input type="text" autocomplete="off" value="<?php echo $row['contactTel'] ?>" name="phone" class="form-control form-control-md" id="phone" placeholder="091-23xxx,022244xxx ..." required data-validation-required-message="กรุณากรอกดเบอร์โทรศัพท์">
                                                        </div>
                                                    </fieldset>

                                                    <fieldset class="form-group mb-2">
                                                        <div class="controls">
                                                            <label for="email">E-mail</label>
                                                            <input type="email" autocomplete="off" value="<?php echo $row['contactMail'] ?>" name="email" class="form-control form-control-md" id="email" placeholder="test@gmail.com" required data-validation-required-message="กรุณากรอกอีเมล">
                                                        </div>
                                                    </fieldset>

                                                    <fieldset class="form-group mb-2">
                                                        <div class="controls">
                                                            <label for="facebook">Facebook Fanpage</label>
                                                            <input type="text" autocomplete="off" value="<?php echo $row['contactFacebook'] ?>" name="facebook" class="form-control form-control-md" id="facebook" placeholder="tagthailand" required data-validation-required-message="กรุณากรอก Facebook">
                                                        </div>
                                                    </fieldset>

                                                    <fieldset class="form-group mb-2">
                                                        <div class="controls">
                                                            <label for="instagram">Instagram</label>
                                                            <input type="text" autocomplete="off" value="<?php echo $row['contactIg'] ?>" name="instagram" class="form-control form-control-md" id="instagram" placeholder="tagproduction.thailand" required data-validation-required-message="กรุณากรอก Instagram">
                                                        </div>
                                                    </fieldset>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-block" style="display: flex;justify-content: center;gap: 10px;"><span class="btn-loading"></span>บันทึก</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <?php
    include_once("../components/script.php");
    ?>

    <script src="../forms/form-contact.js"></script>

</body>
<!-- END: Body-->

</html>