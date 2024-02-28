<?php
require '../../config/dbconfig.php';
// header('Content-Type: application/json');
$output = '';
$response = array();

$workId = $_GET['workId'];


if ($workId !== null) {
    $sql = "SELECT * FROM tb_img_work INNER JOIN tb_work ON tb_img_work.typeName = tb_work.workName WHERE tb_work.workId = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindparam(":id", $workId);
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
        $output = '';
    }
} else {
    $output = 'ไม่สามารถดึงข้อมูลได้';
}

// echo json_encode($output);
echo $output;
