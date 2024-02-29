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
                                    <h4 class="card-title">จัดการรูปสไลด์</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <button type="button" class="btn btn-primary block btn-md" data-toggle="modal" data-target="#slideAdd">
                                            เพิ่มสไลด์
                                        </button>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered base-style table-slide">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>รูปภาพ</th>
                                                        <th>ข้อความ</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-slide">
                                                    <tr>
                                                        <td colspan="4">No data found</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>รูปภาพ</th>
                                                        <th>ข้อความ</th>
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
    <div class="modal fade text-left" id="slideAdd" tabindex="-1" role="dialog" aria-labelledby="slideAddLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="slideAddLabel">เพิ่มสไลด์</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal form-simple form-slide" id="form-slide" method="post" enctype="multipart/form-data" novalidate>
                    <div class="modal-body">

                        <fieldset class="form-group mb-2">
                            <div class="controls">
                                <label for="title">เพิ่มข้อความ</label>
                                <input type="text" autocomplete="off" name="title" class="form-control form-control-md" id="title" placeholder="เพิ่มข้อความ...">
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="basicInputFile">เลือกรูปภาพสไลด์ <span>*</span></label>
                            <div class="custom-file">
                                <input type="file" accept="image/*" class="custom-file-input img-slide" name="imgslide" id="imgslide">
                                <label class="custom-file-label" for="imgslide">เลือกไฟล์</label>
                            </div>
                        </fieldset>

                        <img id="image-preview" style="width: 100%;" alt="">

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

    <script src="../forms/forms.js"></script>

</body>
<!-- END: Body-->

</html>