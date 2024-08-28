<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


// Database connection details
$host = 'localhost';
$db = 'masjid_ulu_pauh';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Database connection using PDO
// MySQLi connection
$mysqli = new mysqli($host, $user, $pass, $db);

// Check for connection errors
if ($mysqli->connect_error) {
    ?>
    <script>
        alert('Connection failed: ' + <?= $mysqli->connect_error;?>);
        document.location = 'Senarai_kariah.php';
    </script>
    <?php
}

// Specify the Excel file name
$excelFileName = 'Senarai_Kariah_Dan_Tanggungan.xlsx';

// Check if the Excel file exists
if (!file_exists($excelFileName)) {
    // If the file doesn't exist, create a new spreadsheet
    $spreadsheet = new Spreadsheet();
} else {
    // If the file exists, load the existing Excel file
    $spreadsheet = IOFactory::load($excelFileName);
}

// Your SQL query to fetch updated data from the database
//$query2 = $_POST['query2'];
$kariah_Query =$_POST['query2'] ;

$query3 = $_POST['query3'];
$tanggung_Query = "$query3";

if (!empty($kariah_Query))
    $kariah_Statement = $mysqli->query($kariah_Query);

if (!empty($tanggung_Query))
    $tanggung_Statement = $mysqli->query($tanggung_Query);

// Fetch updated data from the database
$updated_kariah = $kariah_Statement->fetch_all(MYSQLI_ASSOC);
$updated_tanggung = $tanggung_Statement->fetch_all(MYSQLI_ASSOC);

// Update the kariah_ worksheet
$kariah_Worksheet = $spreadsheet->getSheetByName('Senarai Kariah');
if (!$kariah_Worksheet) {
    // If the worksheet doesn't exist, create a new one
    $kariah_Worksheet = $spreadsheet->createSheet()->setTitle('SENARAI TAPISAN KARIAH ');
}
$kariah_Worksheet->fromArray($updated_kariah, null, 'A1');

// Update the tanggung_ worksheet
$tanggung_Worksheet = $spreadsheet->getSheetByName('Senarai Tanggungan');
if (!$tanggung_Worksheet) {
    // If the worksheet doesn't exist, create a new one
    $tanggung_Worksheet = $spreadsheet->createSheet()->setTitle('SENARAI TAPISAN TANGGUNGAN');
}
$tanggung_Worksheet->fromArray($updated_tanggung, null, 'A1');

// Save the modified Excel file
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save($excelFileName);

// Provide download link
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=$excelFileName");
header('Cache-Control: max-age=0');

$writer->save('php://output');



