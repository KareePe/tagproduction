<?php
require '../../config/dbconfig.php';
// $jsonString = $_POST['slideData'];

// $newJsonString = json_encode($jsonString);
header('Content-Type: application/json');
// $data = json_decode($newJsonString);

$type = $_POST['type'];

$resultType = str_replace("type=", "", $type);

if ($type !== null) {
    try {
        $stmt = $pdo->prepare("INSERT INTO tb_type(typeName) VALUES(:typeName)");

        $stmt->bindparam(":typeName", $resultType);

        $response = array();

        if ($stmt->execute()) {
            $response['status'] = 'OK';
            $response['message'] = 'insert type success';
        } else {
            $response['status'] = 'ERR';
            $response['message'] = 'error insert type';
        }
    } catch (PDOException $e) {
        $response['status'] = 'err';
        $response['message'] = $e->getMessage();
    }
} else {
    $response['status'] = 'err';
    $response['message'] = 'Invalid data received';
}

echo json_encode($response);
