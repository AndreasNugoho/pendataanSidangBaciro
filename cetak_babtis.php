<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    exit;
}
$tgl_surat = $_POST['tgl_surat'];
$nomor_surat_baptis = $_POST['nomor_surat_baptis'];
$pengantar_sidang = $_POST['pengantar_sidang'];
$sidang = $_POST['sidang'];

setlocale(LC_ALL, 'IND');
require 'cetak/fpdf.php';
require 'func/func_babtis.php';
$id = $_GET['id'];
$kemetraian = query("SELECT * FROM data_kemetraian where id_data_diri = '$id'");
if ($kemetraian != NULL){
    $query = query("SELECT * FROM data_babtis JOIN data_diri ON data_diri.id_data_diri = data_babtis.id_data_diri JOIN data_kemetraian ON data_diri.id_data_diri = data_kemetraian.id_data_diri WHERE data_diri.id_data_diri = '$id'")[0];
    $tanggal_babtis = new DateTime($query['tgl_babtis']);
    $tanggal_lahir = new DateTime($query['tgl_lahir']);
    $tanggal_kemetraian = new DateTime($query['tanggal_kemetraian']);
    $tgl_surat = new DateTime($tgl_surat);

    $pdf = new FPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('P',array(162,229));
    $pdf->Image('img/surat-baptis-revisi-01.png',-3,-2,-300);
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetXY(23, 12);
    $pdf->SetFont('Arial', '', 12);
    //Nomor Surat
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(49, 54);
    $pdf->Cell(67, 4, $nomor_surat_baptis, 0, 1, 'L', false);

    //DataDiri
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(60, 72);
    $pdf->Cell(70, 4, $query['nama_lengkap'], 0, 1, 'L', false);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(60, 78);
    $pdf->Cell(70, 4, $query['tempat_lahir'].' , '.strftime('%d %B %Y', $tanggal_lahir->getTimestamp()), 0, 1, 'L', false);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(60, 83);
    $pdf->MultiCell(87, 6,$query['alamat_domisili'], '0', 'L',false);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(60, 96);
    $pdf->Cell(70, 4, $query['nama_ayah'], 0, 1, 'L', false);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(60, 106.5);
    $pdf->Cell(70, 4, $query['nama_ibu'], 0, 1, 'L', false);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(34, 135);
    $pdf->Cell(70, 4, strftime('%d %B %Y', $tanggal_babtis->getTimestamp()), 0, 1, 'L', false);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(76, 158);
    $pdf->Cell(60, 4, $sidang, 0, 1, 'C', false);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(78, 187);
    $pdf->Cell(55, 4, $pengantar_sidang, 0, 1, 'C', false);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(26,  187);
    $pdf->Cell(48, 4, strftime('%d %B %Y', $tgl_surat->getTimestamp()), 0, 1, 'L', false);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(60, 194);
    $pdf->Cell(48, 4, strftime('%d %B %Y', $tanggal_kemetraian->getTimestamp()), 0, 1, 'L', false);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(28, 200.5);
    $pdf->Cell(48, 4, $query['oleh_kemetraian'], 0, 1, 'L', false);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(95, 200.5);
    $pdf->Cell(48, 4, $query['tempat_kemetraian'], 0, 1, 'L', false);

    $pdf->Output('suratbabtis.pdf','I');
}else{
    $query = query("SELECT * FROM data_babtis JOIN data_diri on data_diri.id_data_diri = data_babtis.id_data_diri WHERE data_babtis.id_data_diri = '$id';")[0];
    $tanggal_babtis = new DateTime($query['tgl_babtis']);
    $tanggal_lahir = new DateTime($query['tgl_lahir']);
    $tgl_surat = new DateTime($tgl_surat);
    
    $pdf = new FPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('P',array(162,229));
    $pdf->Image('img/surat-baptis-revisi-01-01.png',-3,-2,-300);
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetXY(23, 12);
    $pdf->SetFont('Arial', '', 12);
    //Nomor Surat
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(49, 54);
    $pdf->Cell(67, 4, $nomor_surat_baptis, 0, 1, 'L', false);
    
    //DataDiri
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(60, 72);
    $pdf->Cell(70, 4, $query['nama_lengkap'], 0, 1, 'L', false);
    
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(60, 78);
    $pdf->Cell(70, 4, $query['tempat_lahir'].' , '.strftime('%d %B %Y', $tanggal_lahir->getTimestamp()), 0, 1, 'L', false);
    
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(60, 83);
    $pdf->MultiCell(87, 6,$query['alamat_domisili'], '0', 'L',false);
    
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(60, 96);
    $pdf->Cell(70, 4, $query['nama_ayah'], 0, 1, 'L', false);
    
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(60, 106.5);
    $pdf->Cell(70, 4, $query['nama_ibu'], 0, 1, 'L', false);
    
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(34, 135);
    $pdf->Cell(70, 4, strftime('%d %B %Y', $tanggal_babtis->getTimestamp()), 0, 1, 'L', false);
    
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(76, 158);
    $pdf->Cell(60, 4, $sidang, 0, 1, 'C', false);
    
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(78, 187);
    $pdf->Cell(55, 4, $pengantar_sidang, 0, 1, 'C', false);
    
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(26,  187);
    $pdf->Cell(48, 4, strftime('%d %B %Y', $tgl_surat->getTimestamp()), 0, 1, 'L', false);
    
    // $pdf->SetFont('Arial', '', 10);
    // $pdf->SetXY(60, 194);
    // $pdf->Cell(48, 4, ' ', 0, 1, 'L', false);
    
    // $pdf->SetFont('Arial', '', 10);
    // $pdf->SetXY(28, 200.5);
    // $pdf->Cell(48, 4, ' ', 0, 1, 'L', false);
    
    // $pdf->SetFont('Arial', '', 10);
    // $pdf->SetXY(95, 200.5);
    // $pdf->Cell(48, 4, ' ', 0, 1, 'L', false);
    
    $pdf->Output('suratbabtis.pdf','I');  
}



?>