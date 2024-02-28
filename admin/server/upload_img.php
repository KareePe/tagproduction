<?php
require '../../config/dbconfig.php';
$response = array();

$jsonString = $_POST['img'];

$newJsonString = json_encode($jsonString);
header('Content-Type: application/json');
$data = json_decode($newJsonString);

$selectType = $data->selectType;
$work = urldecode($data->work);
$imgObj = $data->message;

if ($selectType !== null && $work !== null && $imgObj !== null) {
    foreach ($imgObj as $img) {
        $stmt = $pdo->prepare("INSERT INTO tb_img_work(typeName,base64Img) VALUES(:typeName,:base64Img)");

        $stmt->bindparam(":typeName", $work);
        $stmt->bindparam(":base64Img", $img);

        if ($stmt->execute()) {
            $response['status'] = 'OK';
            $response['message'] = 'insert img success';
        } else {
            $response['status'] = 'ERR';
            $response['message'] = 'error insert img';
        }
    }
} else {
    $response['status'] = 'err';
    $response['message'] = 'Invalid data received';
}

echo json_encode($response);
