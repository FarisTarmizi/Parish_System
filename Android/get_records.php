<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM kariah";
    $result = mysqli_query($connection, $sql);

    $data = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo "No records found.";
    }
}
?>
