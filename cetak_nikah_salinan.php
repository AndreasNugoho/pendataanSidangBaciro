<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    exit;
}

require 'cetak/fpdf.php';
require 'func/func_menikah.php';

setlocale(LC_ALL, 'IND');
$nama_suami = $_POST['nama_lengkap_suami'];
$nama_istri = $_POST['nama_lengkap_istri'];
$id = $_POST['id'];
$query = query("SELECT * from data_menikah INNER JOIN data_diri ON data_diri.id_data_diri = data_menikah.id_data_diri_suami OR data_diri.id_data_diri = data_menikah.id_data_diri_istri WHERE data_menikah.id_menikah = '$id'")[0];
$id_suami = $query['id_data_diri_suami'];
$id_istri = $query['id_data_diri_istri'];
$suami = query("SELECT * FROM data_diri WHERE id_data_diri = '$id_suami'")[0];
$istri = query("SELECT * FROM data_diri WHERE id_data_diri = '$id_istri'")[0];
$tgl_suami = new DateTime($suami['tgl_lahir']);
$tgl_istri = new DateTime($istri['tgl_lahir']);
$nama_ayah_suami = $_POST['nama_ayah_suami'];
$nama_ayah_istri = $_POST['nama_ayah_istri'];
$nama_ibu_suami = $_POST['nama_ibu_suami'];
$nama_ibu_istri = $_POST['nama_ibu_istri'];
$agama_istri = $_POST['agama_istri'];
$agama_suami = $_POST['agama_suami'];
$tgl_nikah = new DateTime($query['tanggal_menikah']);
$tempat_menikah = $_POST['tempat_menikah'];
$oleh_menikah = $_POST['oleh_menikah'];
$tmpt_tinggal_pemberkat = $_POST['tmpt_tinggal_pemberkat'];
$nama_pengantar = $_POST['nama_pengantar'];
$penghantar_sidang = $_POST['penghantar_sidang'];
$tempat_tinggal = $_POST['tempat_tinggal'];
$nomor_surat = $_POST['nomor_surat'];
$tgl_surat = new DateTime($_POST['tgl_surat']);
$tmpt_surat = $_POST['tmpt_surat'];

//judul tabel
$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4');
$pdf->Image('img/surat nikah salinan-01.jpg',0,0,-300);
$pdf->SetFont('Arial', '', 9);

$pdf->SetXY(80, 59);
$pdf->Cell(50, 4, $nomor_surat, 0, 1, 'C', false);

$pdf->SetXY(90, 72.5);
$pdf->Cell(100, 4, $nama_pengantar, 0, 1, 'L', false);

$pdf->SetXY(90, 79.5);
$pdf->Cell(100, 4, $penghantar_sidang, 0, 1, 'L', false);

$pdf->SetXY(90, 86.5);
$pdf->Cell(100, 4, $tempat_tinggal, 0, 1, 'L', false);

$pdf->SetXY(93, 107);
$pdf->Cell(100, 4, strtoupper($suami['nama_lengkap']), 0, 1, 'L', false);

$pdf->SetXY(93, 114);
$pdf->Cell(100, 4, $suami['tempat_lahir'].' , '.strftime('%d %B %Y', $tgl_suami->getTimestamp()), 0, 1, 'L', false);

$pdf->SetXY(93, 121);
$pdf->Cell(100, 4, $query['nama_ayah_suami'],0, 1, 'L', false);

$pdf->SetXY(93, 128);
$pdf->Cell(100, 4, $query['nama_ibu_suami'], 0, 1, 'L', false);

$pdf->SetXY(93, 135);
$pdf->Cell(100, 4, $agama_suami, 0, 1, 'L', false);

$pdf->SetXY(93, 153);
$pdf->Cell(100, 4, strtoupper($istri['nama_lengkap']), 0, 1, 'L', false);

$pdf->SetXY(93, 160);
$pdf->Cell(100, 4, $istri['tempat_lahir'].' , '.strftime('%d %B %Y', $tgl_istri->getTimestamp()), 0, 1, 'L', false);

$pdf->SetXY(93, 167);
$pdf->Cell(100, 4, $query['nama_ayah_istri'], 0, 1, 'L', false);

$pdf->SetXY(93, 174);
$pdf->Cell(100, 4, $query['nama_ibu_istri'], 0, 1, 'L', false);

$pdf->SetXY(93, 181);
$pdf->Cell(100, 4, $agama_istri, 0, 1, 'L', false);

$pdf->SetXY(93, 200.5);
$pdf->Cell(100, 4, $query['tempat_menikah'], 0, 1, 'L', false);

$pdf->SetXY(93, 207.5);
$pdf->Cell(100, 4,strftime('%A , %d %B %Y', $tgl_nikah->getTimestamp()) , 0, 1, 'L', false);

$pdf->SetXY(93, 214);
$pdf->Cell(100, 4, $query['oleh_menikah'], 0, 1, 'L', false);

$pdf->SetXY(93, 221);
$pdf->Cell(100, 4, $query['tmpt_tinggal_pemberkat'], 0, 1, 'L', false);

$pdf->SetXY(100, 242.5);
$pdf->Cell(40, 4, $tmpt_surat, 0, 1, 'L', false);

$pdf->SetXY(142.5, 242.5);
$pdf->Cell(48, 4,strftime('%d           %B                %Y', $tgl_surat->getTimestamp()) , 0, 1, 'R', false);

$pdf->SetXY(124, 272.5);
$pdf->Cell(44, 4, $nama_pengantar, 0, 1, 'C', false);


$pdf->Output('suratnikah_salinan.pdf','I');

?>