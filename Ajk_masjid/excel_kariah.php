<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
//use PhpOffice\PhpSpreadsheet\Writer\Csv;
//use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

error_reporting(E_ALL);
ini_set('display_errors', 1);


$db = mysqli_connect('localhost', 'root', '',
    'masjid_ulu_pauh');

$column_kariah = array('Bil.', 'Nama Penuh', 'IC', 'No.Telefon', 'Alamat', 'Zon', 'Status Perkahwinan', 'Kategori Pekerjaan'
, 'Pekerjaan', 'Julat Gaji', 'Bangsa', 'Rumah', 'Jenis Bantuan Diterima', 'Nama Isteri/Waris', 'IC Isteri/Waris', 'Kategori Pekerjaan Isteri/Waris'
, 'Pekerjaan Isteri/Waris', 'Status OKU', 'Pemengang Kad OKU');
$column_tanggung = array('Bil.', 'Nama Penuh', 'IC', 'Pekerjaan/Nama Sekolah', 'Status OKU',
    'Pemengang Kad OKU', 'Yatim');
$excel_column = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S','T');

$query = "";
$query2 = "";
$query3 = "";

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();

$rowcount = 3;
$bil_tanggung = $bil_kariah = 1;

$title = 0;
$attribute_row = 0;
$rowcount2 = 0;

try {
    //export all data
    if (isset($_POST['export_semua'])) {
        $query = "SELECT * FROM kariah WHERE status = 'Disahkan' ORDER BY Idkariah DESC";
        $data_kariah = mysqli_query($db, $query);

        $activeWorksheet->setCellValue('A1', 'SENARAI PENUH KARIAH MASJID ALI-IMRAN');
        try {
            $activeWorksheet->mergeCells('A1:T1');
        } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
            echo '<script>
        alert("Masalah Pada File Excel");
        document.location= "Senarai_kariah.php";
        </script>';
        }

        $activeWorksheet->getStyle('A1:T1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $activeWorksheet->getStyle('A1:T1')->getFont()->setSize(20);

        for ($i = 0; $i < sizeof($column_kariah); $i++)
            $activeWorksheet->setCellValue($excel_column[$i] . '2', $column_kariah[$i]); //attribute utk kariah

        if (mysqli_num_rows($data_kariah) > 0) {
            foreach ($data_kariah as $data) {
                $activeWorksheet->setCellValue('A' . $rowcount, $bil_kariah);
                $activeWorksheet->setCellValue('B' . $rowcount, $data['nama']);
                $activeWorksheet->setCellValue('C' . $rowcount, $data['ic']);
                $activeWorksheet->setCellValue('D' . $rowcount, $data['tel']);
                $activeWorksheet->setCellValue('E' . $rowcount, $data['alamat']);
                $activeWorksheet->setCellValue('F' . $rowcount, $data['zon']);
                $activeWorksheet->setCellValue('G' . $rowcount, $data['kahwin']);
                $activeWorksheet->setCellValue('H' . $rowcount, $data['kpekerjaan']);
                $activeWorksheet->setCellValue('I' . $rowcount, $data['pekerjaan']);
                $activeWorksheet->setCellValue('J' . $rowcount, $data['gaji']);
                $activeWorksheet->setCellValue('K' . $rowcount, $data['bangsa']);
                $activeWorksheet->setCellValue('L' . $rowcount, $data['menghuni']);
                $activeWorksheet->setCellValue('M' . $rowcount, $data['bantuan']);
                $activeWorksheet->setCellValue('N' . $rowcount, $data['namawaris']);
                $activeWorksheet->setCellValue('O' . $rowcount, $data['icwaris']);
                $activeWorksheet->setCellValue('P' . $rowcount, $data['icwaris']);
                $activeWorksheet->setCellValue('Q' . $rowcount, $data['kpekerjaanwaris']);
                $activeWorksheet->setCellValue('R' . $rowcount, $data['pekerjaanwaris']);
                $activeWorksheet->setCellValue('S' . $rowcount, $data['joku']);
                $activeWorksheet->setCellValue('T' . $rowcount, $data['kadoku']);
                $bil_kariah++; // num row
                $rowcount++; // number for column
            }

            foreach (range('A', 'T') as $col) {
                $activeWorksheet->getColumnDimension($col)->setAutoSize(true);
                $activeWorksheet->getStyle($activeWorksheet->calculateWorksheetDimension())->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
            }

            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . urlencode("Senarai_Kariah.xlsx") . '"');
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
                 alert("Tiada Rekod Data Kariah");
                 document.location = "Senarai_kariah.php";           
                </script>';
        }
    } //filter data
   else {
        echo '<script>
            alert("Kesalahan Fatal");
            document.location= "Senarai_kariah.php";
            </script>';
    }
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}


