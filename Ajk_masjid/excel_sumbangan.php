<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function display($query)
{
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    $show = mysqli_query($db, $query);
    $row = [];

    while ($rows = mysqli_fetch_assoc($show)) {
        $row[] = $rows;
    }
    return $row;
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = (int)$_GET['id']; // ambik id dri url

$db = mysqli_connect('localhost', 'root', '',
    'masjid_ulu_pauh');

$column_sumbangan = array('Tempat', 'Masa', 'Bil. Penerima', 'Dana', 'Dana Lain', 'Disediakan Oleh');

$excel_column = array('A', 'B', 'C', 'D', 'E', 'F');

$query = "";
$query2 = "";

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();

$rowcount = 3;
$bil = $bil_kariah = 1;

try {
    //export all data
    if (isset($_POST['export_semua'])) {
        $query = "SELECT * FROM sumbangan WHERE idsumbangan = '$id'";
        $query2 = "SELECT * FROM kariah WHERE kodsumbangan = '$id'";
        $sumbangan = mysqli_query($db, $query);
        $data_kariah = display($query2);


        if (mysqli_num_rows($sumbangan) > 0) {
            $row_sumbangan = mysqli_fetch_assoc($sumbangan);

            $activeWorksheet->setCellValue('A1', $row_sumbangan['nama']);
            try {
                $activeWorksheet->mergeCells('A1:F1');
            } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
                echo '<script>
                alert("Masalah Pada File Excel");
                document.location= "Senarai_kariah.php";
                </script>';
            }

            $activeWorksheet->getStyle('A1:F1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $activeWorksheet->getStyle('A1:F1')->getFont()->setSize(20);

            for ($i = 0; $i < sizeof($column_sumbangan); $i++)
                $activeWorksheet->setCellValue($excel_column[$i] . '2', $column_sumbangan[$i]); //attribute utk kariah

            $activeWorksheet->setCellValue('A3', $row_sumbangan['tempat']);
            $activeWorksheet->setCellValue('B3', $row_sumbangan['masa']);
            $activeWorksheet->setCellValue('C3', $row_sumbangan['bil_penerima']);
            $activeWorksheet->setCellValue('D3', $row_sumbangan['dana']);
            $activeWorksheet->setCellValue('E3', $row_sumbangan['lain']);
            $activeWorksheet->setCellValue('F3', $row_sumbangan['nama_pic']);

            foreach (range('A', 'F') as $col) {
                $activeWorksheet->getColumnDimension($col)->setAutoSize(true);
                $activeWorksheet->getStyle($activeWorksheet->calculateWorksheetDimension())->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
            }

            //WORKSHEET UTK PENERIMA
            $kariah_Worksheet = $spreadsheet->createSheet()->setTitle('Senarai Penerima');
            $kariah_Worksheet->setCellValue('A1', 'SENARAI PENERIMA '.$row_sumbangan["nama"]);
            try {
                $kariah_Worksheet->mergeCells('A1:F1');
            } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
                echo '<script>
                alert("Masalah Pada File Excel");
                document.location= "Senarai_kariah.php";
                </script>';
            }

            $kariah_Worksheet->getStyle('A1:F1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $kariah_Worksheet->getStyle('A1:F1')->getFont()->setSize(15);


            $kariah_Worksheet->setCellValue('A2', 'Bil.'); //attribute utk kariah
            $kariah_Worksheet->setCellValue('B2', 'Nama Penuh'); //attribute utk kariah
            $kariah_Worksheet->setCellValue('C2', 'IC'); //attribute utk kariah
            $kariah_Worksheet->setCellValue('D2', 'No. Tel'); //attribute utk kariah
            $kariah_Worksheet->setCellValue('F2', 'Alamat'); //attribute utk kariah

            foreach ($data_kariah as $item){
                $kariah_Worksheet->setCellValue('A'.$rowcount, $bil_kariah );
                $kariah_Worksheet->setCellValue('B'.$rowcount, $item['nama']);
                $kariah_Worksheet->setCellValue('C'.$rowcount, $item['ic']);
                $kariah_Worksheet->setCellValue('D'.$rowcount, $item['tel']);
                $kariah_Worksheet->setCellValue('F'.$rowcount, $item['alamat']);
                $rowcount++;
                $bil_kariah++;
            }
            foreach (range('A', 'F') as $col) {
                $kariah_Worksheet->getColumnDimension($col)->setAutoSize(true);
                $kariah_Worksheet->getStyle($kariah_Worksheet->calculateWorksheetDimension())->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
            }


            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . urlencode("Rekod_Sumbangan.xlsx") . '"');
            try {
                $writer->save('php://output');
            } catch (\PhpOffice\PhpSpreadsheet\Writer\Exception $e) {
                echo '<script>
                alert("Masalah Pada File Excel");
                document.location= "Senarai_kariah.php";
                </script>';
            }

        } else {
            echo '<script>
                 alert("Tiada Rekod Data Sumbangan");
                 document.location = "Senarai_kariah.php";           
                </script>';
        }
    } else {
        echo '<script>
            alert("Kesalahan Fatal");
            document.location= "Senarai_kariah.php";
            </script>';
    }

} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}


