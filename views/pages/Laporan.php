<?php
require('../../library/fpdf/fpdf.php');
require('../../function.php');

// $data = getDataKartuBarang2();
// print_r($data);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 7, 'LAPORAN KARTU BARANG', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'DPMPTSP KOTA BANDUNG', 0, 1, 'C');
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 6, 'No', 1, 0);
$pdf->Cell(40, 6, 'Tanggal', 1, 0);
$pdf->Cell(30, 6, 'Masuk', 1, 0);
$pdf->Cell(30, 6, 'Keluar', 1, 0);
$pdf->Cell(30, 6, 'Sisa', 1, 0);
$pdf->Cell(40, 6, 'Keterangan', 1, 0);
$pdf->SetFont('Arial', '', 10);
$data = getDataKartuBarang2();
$no = 1;
foreach ($data as $value) {
    $pdf->ln();
    $pdf->Cell(10, 6, $no++, 1, 0);
    $pdf->Cell(40, 6, $value['tanggal'], 1, 0);

    $pdf->Cell(30, 6, $value['masuk'], 1, 0);
    $pdf->Cell(30, 6, $value['keluar'], 1, 0);
    $pdf->Cell(30, 6, $value['sisa'], 1, 0);
    $pdf->Cell(40, 6, $value['keterangan'], 1, 0);
}
$pdf->Output();
