<?php
//session_start();

$conn = mysqli_connect("localhost","root","","gereja");

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

    $id_data_diri = $_GET['id'];
    $tempat_konfirmasi = htmlspecialchars($data['tempat_konfirmasi']);
    $tgl_konfirmasi = htmlspecialchars($data['tgl_konfirmasi']);
    // $oleh_konfirmasi = htmlspecialchars($data['oleh_konfirmasi']);

    $query = "INSERT INTO data_konfirmasi VALUES('','$id_data_diri','$tempat_konfirmasi','$tgl_konfirmasi')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
function hapus($id_data_diri){
    global $conn;
    mysqli_query($conn,"DELETE FROM data_konfirmasi WHERE id_data_diri=$id_data_diri");

    return mysqli_affected_rows($conn);
}
function edit($data){
    global $conn;
    
    $id_data_diri=$data["id_data_diri"];
    $tempat_konfirmasi = htmlspecialchars($data["tempat_konfirmasi"]);
    $tgl_konfirmasi = htmlspecialchars($data["tgl_konfirmasi"]);
    // $oleh_konfirmasi = htmlspecialchars($data["oleh_konfirmasi"]);

    $query = "UPDATE data_konfirmasi SET tempat_konfirmasi = '$tempat_konfirmasi',tgl_konfirmasi = '$tgl_konfirmasi' WHERE id_data_diri = '$id_data_diri'";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
?>