<?php
require_once('../includes/connection_inner.php');
require 'vendor/autoload.php'; // Include PhpSpreadsheet autoload

if (empty($_SESSION['godrichid'])) {
	header("Location: ./");
}

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set column headers
$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Town/City');
$sheet->setCellValue('C1', 'Address');
$sheet->setCellValue('D1', 'Zip Code');
$sheet->setCellValue('E1', 'Country');
$sheet->setCellValue('F1', 'Phone');
$sheet->setCellValue('G1', 'Email');
$sheet->setCellValue('H1', 'Job Title');
$sheet->setCellValue('I1', 'About us');
$sheet->setCellValue('J1', 'Date');


// SQL query to fetch data
$rsData = $Q_obj->CareersList();
if (count($rsData) > 0) {
	foreach ($rsData as $i => $record) {
		$rowIndex = $i + 2;
		$sheet->setCellValue('A' . $rowIndex, $record['name'] . ' ' . $record['surname']);
		$sheet->setCellValue('B' . $rowIndex, $record['city']);
		$sheet->setCellValue('C' . $rowIndex, $record['address']);
		$sheet->setCellValue('D' . $rowIndex, $record['zipcode']);
		$sheet->setCellValue('E' . $rowIndex, $record['country']);
		$sheet->setCellValue('F' . $rowIndex, $record['phone']);
		$sheet->setCellValue('G' . $rowIndex, $record['email']);
		$sheet->setCellValue('H' . $rowIndex, $record['tob_title']);
		$sheet->setCellValue('I' . $rowIndex, wordwrap($record['about_us'], 30, "\n"));
		$sheet->setCellValue('J' . $rowIndex, date("d M, Y", strtotime($record['created_at'])));
	}
}

// Save Excel file
$writer = new Xlsx($spreadsheet);
$filename = 'careers_data_export.xlsx';
//$writer->save($filename);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attactment; filename="' . urlencode($filename) . '"');
$writer->save('php://output');
