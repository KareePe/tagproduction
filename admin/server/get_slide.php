<?php
require '../../config/dbconfig.php';

$output = '';

$sql = "SELECT * FROM tb_slide";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    $index = 1;
    foreach ($result as $row) {
        // $resultString = str_replace("title=", "", $row['slideTitle']);
        $decodedString = urldecode($row['slideTitle']);
        $output .= '<tr>';
        $output .= '<td>' . $index . '</td>';
        $output .= '<td>' . $decodedString . '</td>';
        $output .= '<td><img src="' . $row['slideImg'] . '" style="width:250px;"/></td>';

        if ($row['slideStatus'] === 'on') {
            $output .= '<td style="text-align:center;">
            <button type="button" class="btn btn-icon btn-primary" onclick="editSlide(' . $row['slideId'] . ')"><i class="fa fa-eye"></i></button>
            </td>';
        } else {
            $output .= '<td style="text-align:center;">
        <button type="button" class="btn btn-icon btn-light" onclick="editSlide(' . $row['slideId'] . ')"><i class="fa fa-eye-slash"></i></button>
        </td>';
        }

        $output .= '</tr>';

        $index++;
    }
} else {
    $output .= '<tr><td colspan="4">No data found</td></tr>';
}

echo $output;
?>
?>