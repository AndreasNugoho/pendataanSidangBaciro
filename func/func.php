<?php
//session_start();
$conn = mysqli_connect("localhost","root","","gereja");
//$conn = new PDO("mysql:host=localhost; dbname=gereja", "root", "");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data){
    global $conn;

    $status = $data['status'];
    $nomor_bi = htmlspecialchars($data['nomor_bi']);
    $nik = htmlspecialchars($data['nik']);
    $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
    $tgl_lahir = htmlspecialchars($data['tgl_lahir']);
    $alamat_domisili = htmlspecialchars($data['alamat_domisili']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $gol_dar = htmlspecialchars($data['gol_dar']);
    $sidang = htmlspecialchars($data['sidang']);
    $tmpt_lahir = htmlspecialchars($data['tmpt_lahir']);


    $query = "INSERT INTO data_diri VALUES('','$nomor_bi','$nik','$nama_lengkap','$tmpt_lahir','$tgl_lahir','$alamat_domisili','$no_hp','$gol_dar','$sidang','$status')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
// function hapus($id_akun){
//     global $conn;
//     mysqli_query($conn,"DELETE FROM barang WHERE id_barang=$id_akun");

//     return mysqli_affected_rows($conn);
// }
function edit($data){
    global $conn;
    
    $id_data_diri = $data['id_data_diri'];
    $nomor_bi=htmlspecialchars($data["nomor_bi"]);
    $nik = htmlspecialchars($data['nik']);
    $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
    $tgl_lahir = htmlspecialchars($data['tgl_lahir']);
    $alamat_domisili = htmlspecialchars($data['alamat_domisili']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $gol_dar = htmlspecialchars($data['gol_dar']);
    $sidang = htmlspecialchars($data['sidang']);
    $tmpt_lahir = htmlspecialchars($data['tmpt_lahir']);
    
    $query = "UPDATE data_diri SET nomor_bi = '$nomor_bi',nik = '$nik',nama_lengkap = '$nama_lengkap',tempat_lahir = '$tmpt_lahir',tgl_lahir = '$tgl_lahir',alamat_domisili ='$alamat_domisili', no_hp ='$no_hp', gol_dar ='$gol_dar', sidang = '$sidang' WHERE id_data_diri = '$id_data_diri'";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function hapus($id_data_diri){
    global $conn;
    mysqli_query($conn,"DELETE FROM data_diri WHERE id_data_diri='$id_data_diri'");

    return mysqli_affected_rows($conn);
}
?>