<?php
require '../../config/dbconfig.php';
header('Content-Type: application/json');
$output = '';
$response = array();



$slideId = $_GET['slideId'];

$sql = "SELECT * FROM tb_slide WHERE slideId = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindparam(":id", $slideId);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    foreach ($result as $row) {

        if ($row["slideStatus"] === 'on') {
            $status = 'off';
        } else {
            $status = 'on';
        }

        $update = $pdo->prepare("UPDATE tb_slide SET slideStatus = :slideStatus WHERE slideId = :id");
        $update->bindparam(":slideStatus", $status);
        $update->bindparam(":id", $row['slideId']);
        if ($update->execute()) {
            $response['status'] = 'OK';
            $response['message'] = 'update slide success';
        } else {
            $response['status'] = 'ERR';
            $response['message'] = 'error update slide';
        }
    }
} else {
    $response['status'] = 'ERR';
    $response['message'] = 'Invalid data received';
}

echo json_encode($response);
