<?php
require '../../config/dbconfig.php';
header('Content-Type: application/json');
$output = '';
$response = array();

$typeId = $_GET['typeId'];

$sql = "SELECT * FROM tb_type WHERE typeId = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindparam(":id", $typeId);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    //     $index = 1;
    $response['status'] = 'OK';
    $response['message'] = $result;
    //         // $resultString = str_replace("title=", "", $row['slideTitle']);
    //         $output .= '<tr>';
    //         $output .= '<td>' . $index . '</td>';
    //         $output .= '<td>' . $row['typeName'] . '</td>';

    //         if ($row['typeStatus'] === 'on') {
    //             $output .= '<td style="text-align:center;">
    //             <button type="button" class="btn btn-icon btn-primary" onclick="editType(' . $row['typeId'] . ')"><i class="fa fa-eye"></i></button>
    //             <button type="button" class="btn btn-icon btn-info" onclick="changeType(' . $row['typeId'] . ')"><i class="fa fa-wrench"></i></button>
    //             </td>';
    //         } else {
    //             $output .= '<td style="text-align:center;">
    //         <button type="button" class="btn btn-icon btn-light" onclick="editType(' . $row['typeId'] . ')"><i class="fa fa-eye-slash"></i></button>
    //         <button type="button" class="btn btn-icon btn-info" onclick="changeType(' . $row['typeId'] . ')"><i class="fa fa-wrench"></i></button>
    //         </td>';
    //         }

    //         $output .= '</tr>';

    //         $index++;

} else {
    $response['status'] = 'ERR';
    $response['message'] = 'ไม่สามารถดึงข้อมูลได้';
}

echo json_encode($response);
