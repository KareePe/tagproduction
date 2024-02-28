<?php
require '../../config/dbconfig.php';
header('Content-Type: application/json');

$response = array();

$type = $_POST['selectType'];
$work = $_POST['work'];

if ($type  !== null && $work !== null) {
    try {
        $stmt = $pdo->prepare("INSERT INTO tb_work(typeName,workName) VALUES(:typeName,:workName)");

        $stmt->bindparam(":typeName", $type);
        $stmt->bindparam(":workName", $work);

        if ($stmt->execute()) {
            $response['status'] = 'OK';
            $response['message'] = 'insert work success';
        } else {
            $response['status'] = 'ERR';
            $response['message'] = 'error work slide';
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
