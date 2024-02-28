<?php
require '../../config/dbconfig.php';
header('Content-Type: application/json');

$username = isset($_POST['userName']) ? $_POST['userName'] : null;
$password = isset($_POST['userPassword']) ? $_POST['userPassword'] : null;

$response = array();

if ($username !== null && $password !== null) {
    try {
        $stmt = $pdo->prepare('SELECT * FROM tb_users WHERE userName = :userName');
        $stmt->execute(array(':userName' => $username));

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data == false) {
            $response['status'] = 'err';
            $response['message'] = 'ไม่พบผู้ใช้งาน!';
        } else {
            if (password_verify($password, $data['userPassword'])) {
                $_SESSION['user_name'] = $data['userName'];
                $_SESSION['user_id'] = $data['userId'];

                $response['status'] = 'OK';
                $response['message'] = 'auth success';
                // $response['data'] = array('username' => $_SESSION['user_name'], 'user_id' => $_SESSION['user_id']);
            } else {
                $response['status'] = 'err';
                $response['message'] = 'ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง!';
            }
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
