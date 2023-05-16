<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    exit;
}

require 'cetak/fpdf.php';
require 'func/func_pindah.php';

setlocale(LC_ALL, 'IND');
$kepercayaan = $_POST['kepercayaan'];       
$kehadiran = $_POST['kehadiran'];
$perhatian = $_POST['perhatian'];
$catatan = $_POST['catatan'];
$sdg_baciro = $_POST['sdg_baciro'];
$distrik_yk = $_POST['distrik_yk'];
$tgl = $_POST['tgl'];
$tgl_surat = new DateTime($tgl);
//echo $kepercayaan, $kehadiran, $perhatian, $catatan, $sdg_baciro, $distrik_yk, $tgl;





//judul tabel
$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4');
$pdf->Image('img/surat pindah-01.png',0,5,-300);
$pdf->SetFont('Arial', '', 10);
$pdf->Ln(20);
$pdf->Ln(20);
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(100,6,'Nama Lengkap',1,0,'C');
$pdf->Cell(55,6,'D(Dewasa) / A(Anak)',1,0,'C');
$pdf->Ln();

$pdf->setFont('Arial', '', 10);
$keluarga = $_GET['kel'];
$no=1;
$query = mysqli_query($conn, "SELECT * FROM data_pindah JOIN data_diri on data_diri.id_data_diri = data_pindah.id_data_diri WHERE keluarga = '$keluarga'");                        
while($tampil = mysqli_fetch_array($query)){
    $pdf->Cell(10);
    $pdf->Cell(8,6,$no++,1,0,'C');
    $pdf->Cell(100,6,$tampil['nama_lengkap'],1,0,'L');
    $pdf->Cell(55,6,$tampil['kategori'],1,0,'C');
    $pdf->Ln();
}
$data = mysqli_query($conn, "SELECT * FROM data_pindah JOIN data_diri on data_diri.id_data_diri = data_pindah.id_data_diri WHERE keluarga = '$keluarga'");
$tampil = mysqli_fetch_array($data);
$pdf->Ln(15);
$pdf->setFont('Arial', '', 10);
// $pdf->SetXY(19, 90);
$pdf->Cell(9);
$pdf->Cell(10, 4, 'Dari Sidang Jemaat   : '.$tampil['sidang'], 0, 1, 'L', false);
// $pdf->SetXY(126, 90);
$pdf->Cell(110);
$pdf->Cell(10, -4, 'Distrik : '.$tampil['distrik_asal'], 0, 1, 'L', false);
$pdf->Ln(10);
$pdf->Cell(9);
$pdf->Cell(10, 4, 'Ke Sidang Jemaat     : '.$tampil['sidang_tujuan'], 0, 1, 'L', false);
// $pdf->SetXY(126, 90);
$pdf->Cell(110);
$pdf->Cell(10, -4, 'Distrik : '.$tampil['distrik_pindah'], 0, 1, 'L', false);
$pdf->Ln(10);
$pdf->Cell(9);
$pdf->MultiCell(165, 7, 'Alamat Baru               : '.$tampil['alamat_baru'],'0', 'L', false);
$pdf->Ln(5);
$pdf->Cell(9);
$pdf->Cell(10, 4, 'Keadaan Kepercayaan             : '.$kepercayaan, 0, 1, 'L', false);
$pdf->Ln(3);
$pdf->Cell(9);
$pdf->Cell(10, 4, 'Kehadiran dalam Kebaktian     : '.$kehadiran, 0, 1, 'L', false);
$pdf->Ln(3);
$pdf->Cell(9);
$pdf->Cell(10, 4, 'Yang perlu Di perhatikan          : '.$perhatian, 0, 1, 'L', false);
$pdf->Ln(10);
$pdf->Cell(9);
$pdf->MultiCell(165, 5,'Catatan : '. $catatan, '', 'L',false);
$pdf->Ln(15);
$pdf->SetXY(25, 210);
$pdf->Cell(60, 4, 'Tanggal : '.strftime('   %d %B %Y', $tgl_surat->getTimestamp()), 0, 1, 'C', false);
/* --- Cell --- */
$pdf->SetXY(115, 210);
$pdf->Cell(60, 4, 'Tanggal : '.strftime('  %d %B %Y', $tgl_surat->getTimestamp()), 0, 1, 'C', false);

$pdf->setFont('Arial', 'B', 10);
$pdf->SetXY(25, 234);
$pdf->Cell(60, 4, $sdg_baciro, 0, 1, 'C', false);
/* --- Cell --- */
$pdf->SetXY(115, 234);
$pdf->Cell(60, 4, $distrik_yk, 0, 1, 'C', false);
/* --- Cell --- */
$pdf->setFont('Arial', '', 10);
$pdf->SetXY(115, 240);
$pdf->SetFontSize(9);
$pdf->Cell(60, 3, 'Ketua Distrik Yogyakarta Barat ', 0, 1, 'C', false);
/* --- Cell --- */
$pdf->SetXY(25, 240);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(60, 3, 'Ketua Sidang Baciro', 0, 1, 'C', false);




$pdf->Output('suratpindah.pdf','I');

?>