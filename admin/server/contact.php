<?php
require '../../config/dbconfig.php';
header('Content-Type: application/json');
$output = '';
$response = array();

$phone = $_POST['phone'];
$email = $_POST['email'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];

if ($phone !== null && $email !== null && $facebook !== null && $instagram !== null) {
    $update = $pdo->prepare("UPDATE tb_contact SET 
    contactTel = :contactTel,
    contactMail = :contactMail,
    contactFacebook=:contactFacebook,
    contactIg=:contactIg
    WHERE 1");
    $update->bindparam(":contactTel", $phone);
    $update->bindparam(":contactMail", $email);
    $update->bindparam(":contactFacebook", $facebook);
    $update->bindparam(":contactIg", $instagram);

    if ($update->execute()) {
        $response['status'] = 'OK';
        $response['message'] = 'Contact information has been successfully updated.';
    } else {
        $response['status'] = 'ERR';
        $response['message'] = 'Unable to update contact information';
    }

} else {
    $response['status'] = 'ERR';
    $response['message'] = 'Invalid data received';
}

echo json_encode($response);
