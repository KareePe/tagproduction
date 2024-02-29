<?php
require '../../config/dbconfig.php';
if (!empty($_SESSION['user_id'])) {
    header('Location: home');
}
?>
<!-- - var menuBorder = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<?php
include_once("../components/head.php");
?>

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column  bg-cyan bg-lighten-2 blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <?php
    if ($_GET["t"] !== 'register') {
    ?>
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="row flexbox-container">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                                <div class="card border-grey border-lighten-3 m-0">
                                    <div class="card-header border-0">
                                        <div class="card-title text-center">
                                            <div class="p-1"><img src="../../assets/images/resources/logo-2.png" alt="branding logo"></div>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form-horizontal form-simple form-auth" method="post" novalidate>
                                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                                    <input type="text" autocomplete="off" name="userName" class="form-control form-control-lg" id="user-name" placeholder="Your Username" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="password" autocomplete="off" name="userPassword" class="form-control form-control-lg" id="user-password" placeholder="Enter Password" required>
                                                    <div class="form-control-position">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                </fieldset>
                                                <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" style="display: flex;justify-content: center;gap: 10px;">
                                                    <span class="btn-loading"></span>
                                                    <i class="feather icon-unlock btn-icons"></i>
                                                    เข้าสู่ระบบ
                                                </button>
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
    <?php
    } else {
    ?>
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="row flexbox-container">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                                <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                                    <div class="card-header border-0">
                                        <div class="card-title text-center">
                                            <img src="../../assets/images/resources/logo-2.png" alt="branding logo">
                                        </div>
                                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>ลงทะเบียน</span></h6>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form-horizontal form-simple" method="post" novalidate>
                                                <fieldset class="form-group position-relative has-icon-left mb-1">
                                                    <input type="text" class="form-control form-control-lg" id="user-name" name="userName" placeholder="User Name">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="password" class="form-control form-control-lg" id="user-password" name="userPassword" placeholder="Enter Password" required>
                                                    <div class="form-control-position">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                </fieldset>
                                                <button type="submit" name="register" class="btn btn-primary btn-lg btn-block"><i class="feather icon-unlock"></i> Register</button>
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
    <?php
    }
    ?>
    <!-- END: Content-->

    <?php
    include_once("../components/script.php");
    ?>

    <script src="../forms/forms.js"></script>
</body>
<!-- END: Body-->

<?php

if (isset($_POST['register'])) {
    $loading = true;
    $userName = trim($_POST['userName']);
    $userPassword = trim($_POST['userPassword']);

    $userID = md5($userName);
    $hash = password_hash($userPassword, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO tb_users (userId, userName, userPassword) VALUES (:userId, :userName, :userPassword)";
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(":userId", $userID);
            $stmt->bindParam(":userName", $userName);
            $stmt->bindParam(":userPassword", $hash);

            if ($stmt->execute()) {
?>
                <script>
                    Swal.fire({
                        title: 'สำเร็จ!',
                        text: 'ลงทะเบียนผู้ดูแลระบบสำเร็จ',
                        icon: 'success',
                        confirmButtonText: 'ตกลง'
                    }).then((result) => {
                        if (result.isConfirm) {
                            location.reload();
                        }
                    })
                </script>
            <?php
            } else {
            ?>
                <script>
                    Swal.fire({
                        title: 'ผิดพลาด!',
                        text: 'ลงทะเบียนผู้ดูแลระบบไม่สำเร็จ',
                        icon: 'error',
                        confirmButtonText: 'ตกลง'
                    }).then((result) => {
                        if (result.isConfirm) {
                            location.reload();
                        }
                    })
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                Swal.fire({
                    title: 'ผิดพลาด!',
                    text: 'เกิดข้อผิดพลาดบางอย่าง กรุณาติดต่อผู้พัฒนาระบบ',
                    icon: 'error',
                    confirmButtonText: 'ตกลง'
                }).then((result) => {
                    if (result.isConfirm) {
                        location.reload();
                    }
                })
            </script>
        <?php
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['login'])) {
    $userName = trim($_POST['userName']);
    $userPassword = trim($_POST['userPassword']);

    try {
        $stmt = $pdo->prepare('SELECT * FROM tb_users WHERE userName = :userName');
        $stmt->execute(array(':userName' => $userName));

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data == false) {
        ?>
            <script>
                Swal.fire({
                    title: 'ไม่พบผู้ใช้งาน!',
                    text: 'กรุณาติดต่อผู้ดูแลระบบ',
                    icon: 'error',
                    confirmButtonText: 'ตกลง'
                }).then((result) => {
                    if (result.isConfirm) {
                        location.reload();
                    }
                })
            </script>
            <?php
        } else {
            if (password_verify($userPassword, $data['userPassword'])) {
                $_SESSION['user_name'] = $data['userName'];
                $_SESSION['user_id'] = $data['userId'];
            } else {
            ?>
                <script>
                    Swal.fire({
                        title: 'ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง!',
                        text: 'กรุณาลองใหม่อีกครั้ง',
                        icon: 'error',
                        confirmButtonText: 'ตกลง'
                    }).then((result) => {
                        if (result.isConfirm) {
                            location.reload();
                        }
                    })
                </script>
        <?php
            }
        }
    } catch (PDOException $e) {
        // echo $e->getMessage();
        ?>
        <script>
            Swal.fire({
                title: 'ผิดพลาด!',
                text: 'เกิดข้อผิดพลาดบางอย่าง กรุณาติดต่อผู้พัฒนาระบบ',
                icon: 'error',
                confirmButtonText: 'ตกลง'
            }).then((result) => {
                if (result.isConfirm) {
                    location.reload();
                }
            })
        </script>
<?php
    }
}
?>

</html>