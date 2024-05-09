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
$sheet->setCellValue('B1', 'Email');
$sheet->setCellValue('C1', 'Phone');
$sheet->setCellValue('D1', 'Country');
$sheet->setCellValue('E1', 'Company');
$sheet->setCellValue('F1', 'Message');
$sheet->setCellValue('G1', 'Date');


// SQL query to fetch data
$rsData = $Q_obj->ContactList();
if (count($rsData) > 0) {
	foreach ($rsData as $i => $record) {
		$rowIndex = $i + 2;
		$sheet->setCellValue('A' . $rowIndex, $record['fullname']);
		$sheet->setCellValue('B' . $rowIndex, $record['email']);
		$sheet->setCellValue('C' . $rowIndex, $record['phone']);
		$sheet->setCellValue('D' . $rowIndex, $record['country']);
		$sheet->setCellValue('E' . $rowIndex, $record['company_name']);
		$sheet->setCellValue('F' . $rowIndex, wordwrap($record['contact_message'], 30, "\n"));
		$sheet->setCellValue('G' . $rowIndex, date("d M, Y", strtotime($record['created_at'])));
	}
}

// Save Excel file
$writer = new Xlsx($spreadsheet);
$filename = 'contact_data_export.xlsx';
//$writer->save($filename);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attactment; filename="' . urlencode($filename) . '"');
$writer->save('php://output');
