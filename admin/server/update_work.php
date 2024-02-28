<?php
require '../../config/dbconfig.php';
header('Content-Type: application/json');
$output = '';
$response = array();

$selectTypeEdit = $_POST['selectTypeEdit'];
$workEdit = $_POST['workEdit'];
$workId = $_POST['workId'];

if ($selectTypeEdit !== null && $workEdit !== null && $workId !== null) {
    $stmt = $pdo->prepare("UPDATE tb_work SET 
    typeName = :typeName,
    workName= :workName 
    WHERE workId = :workId");

    $stmt->bindparam(":typeName", $selectTypeEdit);
    $stmt->bindparam(":workName", $workEdit);
    $stmt->bindparam(":workId", $workId);

    if ($stmt->execute()) {
        $response['status'] = 'OK';
        $response['message'] = 'update work success';
    } else {
        $response['status'] = 'ERR';
        $response['message'] = 'error work contact';
    }
} else {
    $response['status'] = 'err';
    $response['message'] = 'Invalid data received';
}

echo json_encode($response);
