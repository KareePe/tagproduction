<?php
require '../../config/dbconfig.php';
header('Content-Type: application/json');

$output = '';
$response = array();

$sql = "SELECT COUNT(*) AS count FROM tb_slide WHERE slideStatus='on'";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    foreach ($result as $row) {
        $response['status'] = 'OK';
        $response['message'] = $row['count'];
    }
} else {
    $response['status'] = 'ERR';
    $response['message'] = 'Invalid data received';
}

echo json_encode($response);
?>