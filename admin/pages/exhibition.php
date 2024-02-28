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

        #imagePreview2,
        #imageFetch {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        #imagePreview2 img {
            width: 48%;
        }

        #imageFetch div {
            width: 48%;
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
                                    <h4 class="card-title">หมวดหมู่</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <button type="button" class="btn btn-primary block btn-md" data-toggle="modal" data-target="#typeAdd">
                                            เพิ่มหมวดหมู่
                                        </button>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered base-style table-type">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>หมวดหมู่</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-type">
                                                    <tr>
                                                        <td colspan="4">No data found</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>หมวดหมู่</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="content-body">
                <section id="base-style">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ผลงาน</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <button type="button" class="btn btn-primary block btn-md" data-toggle="modal" data-target="#workAdd">
                                            เพิ่มผลงาน
                                        </button>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered base-style table-work">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>หมวดหมู่</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-work">
                                                    <?php
                                                    $stmt = $pdo->prepare("SELECT * FROM tb_work WHERE 1");
                                                    $stmt->execute();
                                                    if ($stmt->execute() <= 0) {
                                                        echo ' <tr>
                                                        <td colspan="4">ไม่พบข้อมูล</td>
                                                        </tr>';
                                                    } else {
                                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $row['typeName'] ?></td>
                                                                <td><?php echo $row['workName'] ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-icon btn-success" <?php echo 'onclick="editImgWork(' . $row['workId'] . ')"' ?>><i class="fa fa-file-image-o"></i></button>
                                                                    <button type="button" class="btn btn-icon btn-info" onclick="editWork(<?php echo $row['workId'] ?>, '<?php echo $row['workName'] ?>','<?php echo $row['typeName'] ?>')"><i class="fa fa-wrench"></i></button>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>หมวดหมู่</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

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

    <!-- Modal -->
    <div class="modal fade text-left" id="typeAdd" tabindex="-1" role="dialog" aria-labelledby="slideAddLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="slideAddLabel">หมวดหมู่</h4>
                </div>
                <form class="form-horizontal form-simple form-type" id="form-type" method="post" enctype="multipart/form-data" novalidate>
                    <div class="modal-body">

                        <fieldset class="form-group mb-2">
                            <div class="controls">
                                <label for="title">ชื่อหมวดหมู่</label>
                                <input type="text" autocomplete="off" name="type" class="form-control form-control-md" id="type" placeholder="exhibition,event ..." required data-validation-required-message="กรุณาเพิ่มข้อความ">
                            </div>
                        </fieldset>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block" style="display: flex;justify-content: center;gap: 10px;"><span class="btn-loading"></span>บันทึก</button>
                        <button type="button" class="btn grey btn-outline-secondary btn-block" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="typeEdit" tabindex="-1" role="dialog" aria-labelledby="slideAddLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="slideAddLabel">แก้ไขหมวดหมู่</h4>
                </div>
                <form class="form-horizontal form-simple form-type-edit" id="form-type-edit" method="post" enctype="multipart/form-data" novalidate>
                    <div class="modal-body">
                        <input type="hidden" autocomplete="off" name="typeid" class="form-control form-control-md" id="typeid" required data-validation-required-message="กรุณาเพิ่มข้อความ">
                        <fieldset class="form-group mb-2">
                            <div class="controls">
                                <label for="title">ชื่อหมวดหมู่</label>
                                <input type="text" autocomplete="off" name="typeName" class="form-control form-control-md" id="typeName" placeholder="exhibition,event ..." required data-validation-required-message="กรุณาเพิ่มข้อความ">
                            </div>
                        </fieldset>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block" style="display: flex;justify-content: center;gap: 10px;"><span class="btn-loading"></span>แก้ไข</button>
                        <button type="button" class="btn grey btn-outline-secondary btn-block" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="workAdd" tabindex="-1" role="dialog" aria-labelledby="slideAddLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="slideAddLabel">ผลงาน</h4>
                </div>
                <form class="form-horizontal form-simple form-work" id="formWork" method="post" enctype="multipart/form-data" novalidate>
                    <div class="modal-body">

                        <fieldset class="form-group">
                            <label for="selectType">หมวดหมู่</label>
                            <select class="form-control" id="selectType" name="selectType">
                                <option>เลือกหมวดหมู่</option>
                                <?php
                                $stmt = $pdo->prepare("SELECT * FROM tb_type WHERE typeStatus ='on'");
                                $stmt->execute();

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value='<?php echo $row['typeName'] ?>'><?php echo $row['typeName'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </fieldset>

                        <fieldset class="form-group mb-2">
                            <div class="controls">
                                <label for="title">ชื่อผลงาน</label>
                                <input type="text" autocomplete="off" name="work" class="form-control form-control-md" id="work" placeholder="exhibition,event ..." required data-validation-required-message="กรุณาเพิ่มข้อความ">
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="basicInputFile">รูปภาพ</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image-work" name="images[]" multiple accept="image/*" required data-validation-required-message="กรุณาเลือกรูปภาพ" id="imageWork">
                                <label class="custom-file-label" for="imageWork">เลือกรูปภาพ</label>
                            </div>
                        </fieldset>

                        <div id="imagePreview2"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block" style="display: flex;justify-content: center;gap: 10px;"><span class="btn-loading"></span>บันทึก</button>
                        <button type="button" class="btn grey btn-outline-secondary btn-block" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="editImgWork" tabindex="-1" role="dialog" aria-labelledby="slideAddLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="slideAddLabel">แก้ไข / อัปโหลดรูปภาพเพิ่มเติม</h4>
                </div>
                <form class="form-horizontal form-simple form-work" id="formWork" method="post" enctype="multipart/form-data" novalidate>
                    <div class="modal-body">
                        <input type="hidden" name="workId" id="workIdField" readonly>
                        <fieldset class="form-group">
                            <label for="basicInputFile">รูปภาพ</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image-work" name="images[]" multiple accept="image/*" required data-validation-required-message="กรุณาเลือกรูปภาพ" id="imageUploadWork">
                                <label class="custom-file-label" for="imageWork">เลือกรูปภาพ</label>
                            </div>
                        </fieldset>

                        <div id="imageFetch" style="display: flex;"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary btn-block" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="editWork" tabindex="-1" role="dialog" aria-labelledby="slideAddLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="slideAddLabel">แก้ไข / อัปโหลดรูปภาพเพิ่มเติม</h4>
                </div>
                <form class="form-horizontal form-simple form-edit-work" id="formEditWork" method="post" enctype="multipart/form-data" novalidate>
                    <div class="modal-body">
                        <input type="hidden" name="workId" id="workIdFieldEdit" readonly>
                        <fieldset class="form-group">
                            <label for="selectTypeEdit">หมวดหมู่</label>
                            <select class="form-control" id="selectTypeEdit" name="selectTypeEdit">
                                <option>เลือกหมวดหมู่</option>
                                <?php
                                $stmt = $pdo->prepare("SELECT * FROM tb_type WHERE typeStatus ='on'");
                                $stmt->execute();

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value='<?php echo $row['typeName'] ?>'><?php echo $row['typeName'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </fieldset>

                        <fieldset class="form-group mb-2">
                            <div class="controls">
                                <label for="title">ชื่อผลงาน</label>
                                <input type="text" autocomplete="off" name="workEdit" class="form-control form-control-md" id="workEdit" placeholder="exhibition,event ..." required data-validation-required-message="กรุณาเพิ่มข้อความ">
                            </div>
                        </fieldset>

                        <div id="imageFetch" style="display: flex;"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block" style="display: flex;justify-content: center;gap: 10px;"><span class="btn-loading"></span>บันทึก</button>
                        <button type="button" class="btn grey btn-outline-secondary btn-block" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <?php
    include_once("../components/script.php");
    ?>

    <!-- BEGIN: Page JS-->
    <!-- <script src="../app-assets/js/scripts/cards/card-statistics.js"></script> -->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>