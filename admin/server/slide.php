<?php
require '../../config/dbconfig.php';
$jsonString = $_POST['slideData'];

$newJsonString = json_encode($jsonString);
header('Content-Type: application/json');
$data = json_decode($newJsonString);

$title = $data->title;
$resultType = str_replace("title=", "", $title);
$titleDash = str_replace(" ", "-", $resultType);
$img = $data->img;

if ($img !== null) {
    try {
        $stmt = $pdo->prepare("INSERT INTO tb_slide(slideTitle,slideImg) VALUES(:slideTitle,:slideImg)");

        $stmt->bindparam(":slideTitle", $titleDash);
        $stmt->bindparam(":slideImg", $img);

        $response = array();

        if ($stmt->execute()) {
            $response['status'] = 'OK';
            $response['message'] = 'Image slide has been successfully inserted.';
        } else {
            $response['status'] = 'ERR';
            $response['message'] = 'Unable to update image slide';
        }
    } catch (PDOException $e) {
        $response['status'] = 'ERR';
        $response['message'] = $e->getMessage();
    }
} else {
    $response['status'] = 'ERR';
    $response['message'] = 'Invalid data received';
}

echo json_encode($response);
