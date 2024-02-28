<?php
require '../../config/dbconfig.php';
header('Content-Type: application/json');
$output = '';
$response = array();

$typeId = $_POST['typeid'];
$type = $_POST['typeName'];

// $sql = "SELECT * FROM tb_type WHERE typeId = :id";
// $stmt = $pdo->prepare($sql);
// $stmt->bindparam(":id", $typeId);
// $stmt->execute();

// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($typeId !== null && $type !== null) {
    //     foreach ($result as $row) {

    //         if ($row["typeStatus"] === 'on') {
    //             $status = 'off';
    //         } else {
    //             $status = 'on';
    //         }

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
