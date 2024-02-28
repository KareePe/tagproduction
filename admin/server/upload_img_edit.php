<?php
require '../../config/dbconfig.php';
$response = array();

$jsonString = $_POST['img'];

$newJsonString = json_encode($jsonString);
header('Content-Type: application/json');
$data = json_decode($newJsonString);

$work = $data->workId;
$imgObj = $data->img;

if ($work !== null && $imgObj !== null) {
    $sql = "SELECT * FROM tb_work WHERE workId = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindparam(":id", $work);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        foreach ($result as $row) {
            $upload = $pdo->prepare("INSERT INTO tb_img_work(typeName,base64Img) VALUES(:typeName,:base64Img)");

            $upload->bindparam(":typeName", $row['workName']);
            $upload->bindparam(":base64Img", $imgObj);

            if ($upload->execute()) {
                $response['status'] = 'OK';
                $response['message'] = 'insert img success';
            } else {
                $response['status'] = 'ERR';
                $response['message'] = 'error insert img';
            }
        }
    } else {
        $response['status'] = 'ERR';
        $response['message'] = 'error fetch work name';
    }
} else {
    $response['status'] = 'err';
    $response['message'] = 'Invalid data received';
}


echo json_encode($response);
