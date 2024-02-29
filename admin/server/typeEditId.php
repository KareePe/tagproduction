<?php
require '../../config/dbconfig.php';
header('Content-Type: application/json');
$output = '';
$response = array();

$typeId = $_POST['typeid'];
$type = $_POST['typeName'];

if ($typeId !== null && $type !== null) {
    $update = $pdo->prepare("UPDATE tb_type SET typeName = :typeName WHERE typeId = :id");
    $update->bindparam(":typeName", $type);
    $update->bindparam(":id", $typeId);
    if ($update->execute()) {
        $response['status'] = 'OK';
        $response['message'] = 'update type success';
    } else {
        $response['status'] = 'ERR';
        $response['message'] = 'error update type';
    }
} else {
    $response['status'] = 'ERR';
    $response['message'] = 'Invalid data received';
}

echo json_encode($response);
