<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
//use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

//use PhpOffice\PhpSpreadsheet\Writer\Xls;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function display($query)
{
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    return mysqli_query($db, $query);
}


$column_kariah = array('Bil.', 'Nama Penuh', 'IC', 'No.Telefon', 'Alamat', 'Zon', 'Status Perkahwinan', 'Kategori Pekerjaan'
, 'Pekerjaan', 'Julat Gaji', 'Bangsa', 'Rumah', 'Jenis Bantuan Diterima', 'Nama Isteri/Waris', 'IC Isteri/Waris', 'Kategori Pekerjaan Isteri/Waris'
, 'Pekerjaan Isteri/Waris', 'Status OKU', 'Pemengang Kad OKU');
$column_tanggung = array('Bil.', 'Nama Penuh', 'IC', 'Pekerjaan/Nama Sekolah', 'Status OKU',
    'Pemengang Kad OKU', 'Yatim');
$excel_column = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S','T');

$query = "";
$query2 = "";
$query3 = "";

$rowcount = 3;
$bil_tanggung = $bil_kariah = 1;

$title = 1;
$attribute_row = 2;
$rowcount2 = 3;

try {
    if (isset($_POST['export_filtered'])) {
        $query2 = $_POST['query2'];
        $query3 = $_POST['query3'];
        if (!empty($query2) && !empty($query3)) {
            $data_kariah = display($query2);
            $data_tanggung = display($query3);

            $spreadsheet = new Spreadsheet();
            $activeWorksheet = $spreadsheet->getActiveSheet();
            $activeWorksheet->setCellValue('A1', 'SENARAI TAPISAN KARIAH MASJID ALI-IMRAN');

            try {
                $activeWorksheet->mergeCells('A1:R1');
            } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
                echo '<script>
                alert("Masalah Pada File Excel");
                document.location= "Senarai_kariah.php";
                </script>';
            }
            $activeWorksheet->getStyle('A1:R1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $activeWorksheet->getStyle('A1')->getFont()->setSize(20);

            for ($i = 0; $i < sizeof($column_kariah); $i++)
                $activeWorksheet->setCellValue($excel_column[$i] . '2', $column_kariah[$i]); //attribute utk kariah

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

            //UTK TANGGUNGAN
            $spreadsheet->createSheet();
            // Create a new worksheet called "My Data"
            $myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'TANGGUNGAN');

            // Attach the "My Data" worksheet as the first worksheet in the Spreadsheet object
            $spreadsheet->addSheet($myWorkSheet, 0);

            $myWorkSheet->setCellValue('A' . $title, 'SENARAI TAPISAN TANGGUNGAN MASJID ALI-IMRAN');
            try {
                $myWorkSheet->mergeCells('A' . $title . ':G' . $title);
            } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
                echo '<script>
                alert("Masalah Pada File Excel");
                document.location= "Senarai_kariah.php";
                </script>';
            }
            $myWorkSheet->getStyle('A' . $title . ':G' . $title)->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $myWorkSheet->getStyle('A' . $title . ':G' . $title)->getFont()->setSize(20);

            for ($a = 0; $a < sizeof($column_tanggung); $a++) //attribute utk tanggungan
                $myWorkSheet->setCellValue($excel_column[$a] . $attribute_row, $column_tanggung[$a]);

            foreach ($data_tanggung as $data) {
                $myWorkSheet->setCellValue('A' . $rowcount2, $bil_tanggung);
                $myWorkSheet->setCellValue('B' . $rowcount2, $data['nama']);
                $myWorkSheet->setCellValue('C' . $rowcount2, $data['ic']);
                $myWorkSheet->setCellValue('D' . $rowcount2, $data['pekerjaan']);
                $myWorkSheet->setCellValue('E' . $rowcount2, $data['oku']);
                $myWorkSheet->setCellValue('F' . $rowcount2, $data['kadoku']);
                $myWorkSheet->setCellValue('G' . $rowcount2, $data['yatim']);
                $bil_tanggung++; // num row
                $rowcount2++; // number for column
            }
            foreach (range('A', 'G') as $col) {
                $activeWorksheet->getColumnDimension($col)->setAutoSize(true);
                $activeWorksheet->getStyle($activeWorksheet->calculateWorksheetDimension())->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
            }

            $writer = new Csv($spreadsheet);
            $writer->save('Senarai_Kariah_Dan_Tanggungan.csv');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Senarai_Kariah_Dan_Tanggungan.csv"');
            readfile("Senarai_Kariah_Dan_Tanggungan.csv");
            unlink("Senarai_Kariah_Dan_Tanggungan.csv");
            exit();
        } elseif (!empty($query2)&& empty($query3)) {
            $data_kariah = display($query2);

            $spreadsheet = new Spreadsheet();
            $activeWorksheet = $spreadsheet->getActiveSheet();
            $activeWorksheet->setCellValue('A1', 'SENARAI TAPISAN KARIAH MASJID ALI-IMRAN');

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

            $writer = new Csv($spreadsheet);
            $writer->save('Senarai_Tapisan_Kariah.csv');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Senarai_Tapisan_Kariah.csv"');
            readfile("Senarai_Tapisan_Kariah.csv");
            unlink("Senarai_Tapisan_Kariah.csv");
            exit();

        } elseif (empty($query2) && !empty($query3)) {
            $data_tanggung = display($query3);
            $spreadsheet = new Spreadsheet();
            $activeWorksheet = $spreadsheet->getActiveSheet();
            $activeWorksheet->setCellValue('A1', 'SENARAI TAPISAN TANGGUNGAN KARIAH MASJID ALI-IMRAN');

            try {
                $activeWorksheet->mergeCells('A1:G1');
            } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
                echo '<script>
                alert("Masalah Pada File Excel");
                document.location= "Senarai_kariah.php";
                </script>';
            }
            $activeWorksheet->getStyle('A1:G1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $activeWorksheet->getStyle('A1')->getFont()->setSize(20);

            for ($i = 0; $i < sizeof($column_tanggung); $i++)
                $activeWorksheet->setCellValue($excel_column[$i] . '2', $column_tanggung[$i]); //attribute utk kariah

            foreach ($data_tanggung as $data) {
                $activeWorksheet->setCellValue('A' . $rowcount, $bil_tanggung);
                $activeWorksheet->setCellValue('B' . $rowcount, $data['nama']);
                $activeWorksheet->setCellValue('C' . $rowcount, $data['ic']);
                $activeWorksheet->setCellValue('D' . $rowcount, $data['pekerjaan']);
                $activeWorksheet->setCellValue('E' . $rowcount, $data['oku']);
                $activeWorksheet->setCellValue('F' . $rowcount, $data['kadoku']);
                $activeWorksheet->setCellValue('G' . $rowcount, $data['yatim']);
                $bil_tanggung++; // num row
                $rowcount++; // number for column
            }
            foreach (range('A', 'G') as $col) {
                $activeWorksheet->getColumnDimension($col)->setAutoSize(true);
                $activeWorksheet->getStyle($activeWorksheet->calculateWorksheetDimension())->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
            }

            $writer = new Csv($spreadsheet);
            $writer->save('Senarai_Tanggungan_Kariah.csv');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Senarai_Tanggungan_Kariah.csv"');
            readfile("Senarai_Tanggungan_Kariah.csv");
            unlink("Senarai_Tanggungan_Kariah.csv");
            exit();

        } else {
            echo '<script>
                 alert("Tiada Rekod Data Kariah");
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
