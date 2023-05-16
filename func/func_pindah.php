<?php
//session_start();

$conn = mysqli_connect("localhost","root","","gereja");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data){
    global $conn;
    $id = $_GET['id'];
    
    //$id_babtis = $data['id_babtis'];
    $status = $data['status'];
    $id_data_diri = $_GET['id'];
    $distrik_asal = htmlspecialchars($data['distrik_asal']);
    $distrik_pindah = htmlspecialchars($data['distrik_pindah']);
    $alamat_baru = htmlspecialchars($data['alamat_baru']);
    $kel = htmlspecialchars($data['kel']);
    $tgl_pindah = htmlspecialchars($data['tgl_pindah']);
    $kategori = htmlspecialchars($data['kategori']);
    $sidang_tujuan = htmlspecialchars($data['sidang_tujuan']);


    // $query1 = "UPDATE data_diri  SET sidang = '$sidang_tujuan',alamat_domisili = '$alamat_baru' WHERE nomor_bi = '$nomor_bi'";
    // mysqli_query($conn,$query1);
    $query = "INSERT INTO data_pindah VALUES('','$id_data_diri','$distrik_asal','$sidang_tujuan','$distrik_pindah','$alamat_baru','$kel', '$tgl_pindah','$kategori')";
    $query1 = "UPDATE data_diri SET status = '$status' WHERE id_data_diri = '$id'";
    mysqli_query($conn,$query);
    mysqli_query($conn,$query1);
    return mysqli_affected_rows($conn);
}
function hapus($id_data_diri){
    global $conn;

    $id = $_GET['id'];
    $query1 = "UPDATE data_diri SET status = 'aktif' WHERE id_data_diri = '$id'";
    mysqli_query($conn,"DELETE FROM data_pindah WHERE id_data_diri=$id_data_diri");
    mysqli_query($conn,$query1);
    return mysqli_affected_rows($conn);
}
function edit($data){
    global $conn;
    
    $id_data_diri = $data["id_data_diri"];
    $distrik_asal = htmlspecialchars($data['distrik_asal']);
    $distrik_pindah = htmlspecialchars($data['distrik_pindah']);
    $alamat_baru = htmlspecialchars($data['alamat_baru']);
    $kel = htmlspecialchars($data['kel']);
    $tgl_pindah = htmlspecialchars($data['tgl_pindah']);
    $kategori = htmlspecialchars($data['kategori']);
    $sidang_tujuan = htmlspecialchars($data['sidang_tujuan']);


    $query = "UPDATE data_pindah SET distrik_asal = '$distrik_asal',distrik_pindah = '$distrik_pindah',alamat_baru ='$alamat_baru',keluarga = '$kel', tgl_pindah = '$tgl_pindah',kategori = '$kategori',sidang_tujuan = '$sidang_tujuan' WHERE id_data_diri = '$id_data_diri'";
    mysqli_query($conn,$query);

    
    return mysqli_affected_rows($conn);
}

?>