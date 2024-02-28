<?php
require '../../config/dbconfig.php';
// header('Content-Type: application/json');
$output = '';
$response = array();

$img_id = $_GET['img_id'];
$work_id = $_GET['work_id'];

if ($work_id !== null) {
    $delete = "DELETE FROM tb_img_work WHERE workImgId = :id";
    $delete_stmt = $pdo->prepare($delete);
    $delete_stmt->bindparam(":id", $img_id);


    if ($delete_stmt->execute()) {
        $sql = "SELECT * FROM tb_img_work INNER JOIN tb_work ON tb_img_work.typeName = tb_work.workName WHERE tb_work.workId = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindparam(":id", $work_id);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            foreach ($result as $row) {
                $output .= '<div style="cursor:pointer;position:relative;">
            <button type="button" style="position: absolute;top: 10px;right: 10px;" class="btn btn-icon btn-danger" onclick="deleteImg(' . $row['workImgId'] . ',' . $row['workId'] . ')"><i class="fa fa-trash-o"></i></button>
            <img src="' . $row['base64Img'] . '" style="width:100%;"/>
            </div>';
            }
        } else {
            $output .= 'ไม่สามารถลบข้อมูลได้';
        }
    } else {
        $output .= 'ไม่สามารถลบข้อมูลได้';
    }
} else {
    $output .= 'เกิดข้อผิดพลาด';
}


echo $output;
