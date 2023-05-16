<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    exit;
}



$tgl_surat = new DateTime($_POST['tgl_surat']);
$pengantar = $_POST['pengantar'];
$nama_lengkap = $_POST['nama_lengkap'];
$tgl_lahir = $_POST['tgl_lahir'];
$kelurahan = $_POST['kelurahan'];
$kecamatan = $_POST['kecamatan'];
$kabupaten = $_POST['kabupaten'];
$pekerjaan = $_POST['pekerjaan'];
$status = $_POST['status'];
$babtis = $_POST['babtis'];
$tempat_baptis = $_POST['tempat_baptis'];
$tgl_babtis = $_POST['tgl_babtis'];
$oleh_metrai = $_POST['oleh_metrai'];
$tempat_kemetraian = $_POST['tempat_kemetraian'];
$tanggal_kemetraian = $_POST['tanggal_kemetraian'];
$gereja_konfirmasi = $_POST['gereja_konfirmasi'];
$tempat_konfirmasi = $_POST['tempat_konfirmasi'];
$tgl_konfirmasi = $_POST['tgl_konfirmasi'];




setlocale(LC_ALL, 'IND');
require 'cetak/fpdf.php';
require 'func/func_konfirmasi.php';


$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L',array(214,170));
$pdf->Image('img/kartu personalia-01.png',0,0,-300);   

// $pdf->SetXY(39, 28.5);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(45, 4, 'Nama Keluarga', 1, 1, 'L', false);

// $pdf->SetXY(95, 28.5);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(45, 4, 'Terlahir', 1, 1, 'L', false);

$pdf->SetXY(39, 35);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(102, 4, $nama_lengkap, 0, 1, 'L', false);

$pdf->SetXY(39, 41.5);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(26, 4, $tgl_lahir, 0, 1, 'L', false);

$pdf->SetXY(70, 41.5);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(70, 4, $kelurahan.', '.$kecamatan.', '.$kabupaten , 0, 1, 'L', false);

$pdf->SetXY(39, 48);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(43, 4, $pekerjaan, 0, 1, 'L', false);

$pdf->SetXY(95, 48);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(43, 4, $status, 0, 1, 'L', false);

$jumlah_bi = $_POST['jumlah_bi'];


if ($jumlah_bi == 1){
    $nomor_bi = $_POST['nomor_bi'];
    $dalam_buku = $_POST['dalam_buku'];
    $pdf->SetXY(142.5, 27);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 27);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku, 0, 1, 'C', false);

}if ($jumlah_bi == 2){
    $nomor_bi = $_POST['nomor_bi'];
    $dalam_buku = $_POST['dalam_buku'];
    $nomor_bi_1 = $_POST['nomor_bi_1'];
    $dalam_buku_1 = $_POST['dalam_buku_1'];

    $pdf->SetXY(142.5, 27);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi_1, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 27);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku_1, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 32);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku, 0, 1, 'C', false);

    $pdf->SetXY(142.5, 32);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi, 0, 1, 'C', false);


}if ($jumlah_bi == 3){
    $nomor_bi = $_POST['nomor_bi'];
    $dalam_buku = $_POST['dalam_buku'];
    $nomor_bi_1 = $_POST['nomor_bi_1'];
    $dalam_buku_1 = $_POST['dalam_buku_1'];
    $nomor_bi_2 = $_POST['nomor_bi_2'];
    $dalam_buku_2 = $_POST['dalam_buku_2'];

    $pdf->SetXY(142.5, 37);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4,$nomor_bi, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 37);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4,$dalam_buku , 0, 1, 'C', false);

    $pdf->SetXY(142.5, 27);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi_1, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 27);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku_1, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 32);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku_2, 0, 1, 'C', false);

    $pdf->SetXY(142.5, 32);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi_2, 0, 1, 'C', false);


}if ($jumlah_bi == 4){
    $nomor_bi = $_POST['nomor_bi'];
    $dalam_buku = $_POST['dalam_buku'];
    $nomor_bi_1 = $_POST['nomor_bi_1'];
    $dalam_buku_1 = $_POST['dalam_buku_1'];
    $nomor_bi_2 = $_POST['nomor_bi_2'];
    $dalam_buku_2 = $_POST['dalam_buku_2'];
    $nomor_bi_3 = $_POST['nomor_bi_3'];
    $dalam_buku_3 = $_POST['dalam_buku_3'];

    $pdf->SetXY(142.5, 42);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 42);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4,$dalam_buku, 0, 1, 'C', false);

    $pdf->SetXY(142.5, 37);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4,$nomor_bi_3, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 37);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4,$dalam_buku_3, 0, 1, 'C', false);

    $pdf->SetXY(142.5, 27);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi_1, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 27);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku_1, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 32);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku_2, 0, 1, 'C', false);

    $pdf->SetXY(142.5, 32);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi_2, 0, 1, 'C', false);



}if ($jumlah_bi == 5){
    $nomor_bi = $_POST['nomor_bi'];
    $dalam_buku = $_POST['dalam_buku'];
    $nomor_bi_1 = $_POST['nomor_bi_1'];
    $dalam_buku_1 = $_POST['dalam_buku_1'];
    $nomor_bi_2 = $_POST['nomor_bi_2'];
    $dalam_buku_2 = $_POST['dalam_buku_2'];
    $nomor_bi_3 = $_POST['nomor_bi_3'];
    $dalam_buku_3 = $_POST['dalam_buku_3'];
    $nomor_bi_4 = $_POST['nomor_bi_4'];
    $dalam_buku_4 = $_POST['dalam_buku_4'];

    $pdf->SetXY(142.5, 47);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 47);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku, 0, 1, 'C', false);

    $pdf->SetXY(142.5, 42);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi_4, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 42);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku_4, 0, 1, 'C', false);

    $pdf->SetXY(142.5, 37);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4,$nomor_bi_3, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 37);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4,$dalam_buku_3 , 0, 1, 'C', false);

    $pdf->SetXY(142.5, 27);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi_1, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 32);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku_2, 0, 1, 'C', false);

    $pdf->SetXY(142.5, 32);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi_2, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 27);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku_1, 0, 1, 'C', false);


}if($jumlah_bi == 6){
    $nomor_bi = $_POST['nomor_bi'];
    $dalam_buku = $_POST['dalam_buku'];
    $nomor_bi_1 = $_POST['nomor_bi_1'];
    $dalam_buku_1 = $_POST['dalam_buku_1'];
    $nomor_bi_2 = $_POST['nomor_bi_2'];
    $dalam_buku_2 = $_POST['dalam_buku_2'];
    $nomor_bi_3 = $_POST['nomor_bi_3'];
    $dalam_buku_3 = $_POST['dalam_buku_3'];
    $nomor_bi_4 = $_POST['nomor_bi_4'];
    $dalam_buku_4 = $_POST['dalam_buku_4'];
    $nomor_bi_5 = $_POST['nomor_bi_5'];
    $dalam_buku_5 = $_POST['dalam_buku_5'];

    $pdf->SetXY(142.5, 52);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 52);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku, 0, 1, 'C', false);
    
    $pdf->SetXY(142.5, 47);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi_5, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 47);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku_5, 0, 1, 'C', false);

    $pdf->SetXY(142.5, 42);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi_4, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 42);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku_4, 0, 1, 'C', false);

    $pdf->SetXY(142.5, 37);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4,$nomor_bi_3, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 37);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4,$dalam_buku_3 , 0, 1, 'C', false);

    $pdf->SetXY(142.5, 27);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi_1, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 27);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku_1, 0, 1, 'C', false);

    $pdf->SetXY(157.2, 32);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(40   , 4, $dalam_buku_2, 0, 1, 'C', false);

    $pdf->SetXY(142.5, 32);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(13.5, 4, $nomor_bi_2, 0, 1, 'C', false);

}


$pdf->SetXY(39, 83.5);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(44   , 4, $babtis, 0, 1, 'L', false);

$pdf->SetXY(88, 83.5);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(58   , 4, $tempat_baptis, 0, 1, 'C', false);

$pdf->SetXY(158, 83.5);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(39   , 4, $tgl_babtis, 0, 1, 'C', false);

$pdf->SetXY(31, 90);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(52   , 4, $gereja_konfirmasi, 0, 1, 'L', false);

$pdf->SetXY(88, 90);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(58   , 4, $tempat_konfirmasi, 0, 1, 'C', false);

$pdf->SetXY(158, 90);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(39   , 4, $tgl_konfirmasi, 0, 1, 'C', false);

$arr = explode(' ',trim($oleh_metrai));               
$tes = "";         
for ($i = 1;$i < count($arr); $i++) {
    $tes.=$arr[$i]." ";
}

$pdf->SetXY(44, 97.2);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(39   , 4, $tes, 0, 1, 'L', false);

$pdf->SetXY(88, 97.2);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(58   , 4, $tempat_kemetraian, 0, 1, 'C', false);

$pdf->SetXY(158, 97.2);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(39   , 4, $tanggal_kemetraian, 0, 1, 'C', false);

// $pdf->SetXY(38, 104);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(86   , 4, 'Keluar', 1, 1, 'L', false);

// $pdf->SetXY(158, 104);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(39   , 4, 'Tgl', 1, 1, 'C', false);

// $pdf->SetXY(20, 110.5);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(64   , 4, 'Keluar', 1, 1, 'L', false);

// $pdf->SetXY(125, 110.5);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(72   , 4, 'Tgl', 1, 1, 'L', false);

// $pdf->SetXY(61, 120.5);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Penetapan ', 1, 1, 'C', false);

// $pdf->SetXY(84.5, 120.5);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Penetapan ', 1, 1, 'C', false);

// $pdf->SetXY(108, 120.5);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Penetapan ', 1, 1, 'C', false);

// $pdf->SetXY(131.5, 120.5);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Penetapan ', 1, 1, 'C', false);

// $pdf->SetXY(155, 120.5);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Penetapan ', 1, 1, 'C', false);

// $pdf->SetXY(178.5, 120.5);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Penetapan ', 1, 1, 'C', false);

// $pdf->SetXY(61, 126.3);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Di ', 1, 1, 'C', false);

// $pdf->SetXY(84.5, 126.3);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Di ', 1, 1, 'C', false);

// $pdf->SetXY(108, 126.3);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Di ', 1, 1, 'C', false);

// $pdf->SetXY(131.5, 126.3);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Di ', 1, 1, 'C', false);

// $pdf->SetXY(155, 126.3);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Di ', 1, 1, 'C', false);

// $pdf->SetXY(178.5, 126.3);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Di ', 1, 1, 'C', false);

// $pdf->SetXY(61, 132.1);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Dalam ', 1, 1, 'C', false);

// $pdf->SetXY(84.5, 132.1);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Dalam ', 1, 1, 'C', false);

// $pdf->SetXY(108, 132.1);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Dalam ', 1, 1, 'C', false);

// $pdf->SetXY(131.5, 132.1);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Dalam ', 1, 1, 'C', false);

// $pdf->SetXY(155, 132.1);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Dalam ', 1, 1, 'C', false);

// $pdf->SetXY(178.5, 132.1);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(20   , 4, 'Dalam ', 1, 1, 'C', false);

$pdf->AddPage('L',array(214,170));
$pdf->Image('img/kartu personalia-02.png',0,0,-300);

// $pdf->SetXY(78.3, 25.6);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(22, 4, 'pernikahan 1', 1, 1, 'L', false);

// $pdf->SetXY(78.3, 30);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(22, 4, 'pernikahan 1', 1, 1, 'L', false);

// $pdf->SetXY(78.3, 34.4);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(22, 4, 'pernikahan 1', 1, 1, 'L', false);

// $pdf->SetXY(78.3, 39);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(22, 4, 'pernikahan 1', 1, 1, 'L', false);

// $pdf->SetXY(78.3, 44);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(22, 4, 'pernikahan 1', 1, 1, 'L', false);

// $pdf->SetXY(102.3, 25.6);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(22, 4, 'pernikahan 2', 1, 1, 'L', false);

// $pdf->SetXY(102.3, 30);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(22, 4, 'pernikahan 2', 1, 1, 'L', false);

// $pdf->SetXY(102.3, 34.4);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(22, 4, 'pernikahan 2', 1, 1, 'L', false);

// $pdf->SetXY(102.3, 39);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(22, 4, 'pernikahan 2', 1, 1, 'L', false);

// $pdf->SetXY(102.3, 44);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(22, 4, 'pernikahan 2', 1, 1, 'L', false);

// $pdf->SetXY(128, 25.6);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(70, 4, 'catatan', 1, 1, 'L', false);

// $pdf->SetXY(128, 30);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(70, 4, 'catatan', 1, 1, 'L', false);

// $pdf->SetXY(128, 34.4);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(70, 4, 'catatan', 1, 1, 'L', false);

// $pdf->SetXY(128, 39);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(70, 4, 'catatan', 1, 1, 'L', false);

// $pdf->SetXY(128, 44);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(70, 4, 'catatan', 1, 1, 'L', false);

// $pdf->SetXY(64.5, 49);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(45, 4, 'nomor gereja', 1, 1, 'L', false);

// $pdf->SetXY(64.5, 53);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(45, 4, 'nomor gereja', 1, 1, 'L', false);

// $pdf->SetXY(139, 49);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(24, 4, 'perak', 1, 1, 'L', false);

// $pdf->SetXY(139, 53);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(24, 4, 'emas', 1, 1, 'L', false);

// $pdf->SetXY(175, 49);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(24, 4, 'perak', 1, 1, 'L', false);

// $pdf->SetXY(175, 53);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(24, 4, 'perak', 1, 1, 'L', false);

$pdf->SetXY(60, 88);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(35, 4, strftime('%d - %B - %Y', $tgl_surat->getTimestamp()), 0, 1, 'L', false);

// $id_data_diri = $_GET['id'];
// $sidang  = query("SELECT * from data_pindah where id_data_diri = '$id_data_diri'");

// $sidang = $sidang['sidang_tujuan'];
// $arr = explode(' ',trim($sidang));


// $pdf->SetXY(73, 93);
// $pdf->SetFont('Arial', '', 7);
// $pdf->Cell(35, 4, $arr[1], 0, 1, 'L', false);

$pdf->SetXY(55, 111);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(50, 4, $pengantar, 0, 1, 'C', false);





$pdf->Output('kartu_personalia_konfirmasi.pdf','I');

?>