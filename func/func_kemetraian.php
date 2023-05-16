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
    //$id = $_GET['id'];
    
    //$id_babtis = htmlspecialchars($data['id_babtis']);
    $id_data_diri = $_GET['id'];
    $tempat_kemetraian = htmlspecialchars($data['tempat_kemetraian']);
    $tanggal_kemetraian = htmlspecialchars($data['tanggal_kemetraian']);
    $oleh_kemetraian = htmlspecialchars($data['oleh_kemetraian']);

    $query = "INSERT INTO data_kemetraian VALUES('','$id_data_diri','$tempat_kemetraian','$tanggal_kemetraian','$oleh_kemetraian')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
function hapus($id_data_diri){
    global $conn;
    mysqli_query($conn,"DELETE FROM data_kemetraian WHERE id_data_diri=$id_data_diri");

    return mysqli_affected_rows($conn);
}
function edit($data){
    global $conn;
    
    $id_data_diri=$data["id_data_diri"];
    $tempat_kemetraian = htmlspecialchars($data["tempat_kemetraian"]);
    $tanggal_kemetraian = htmlspecialchars($data["tanggal_kemetraian"]);
    $oleh_kemetraian = htmlspecialchars($data["oleh_kemetraian"]);

    $query = "UPDATE data_kemetraian SET tempat_kemetraian = '$tempat_kemetraian',tanggal_kemetraian = '$tanggal_kemetraian',oleh_kemetraian ='$oleh_kemetraian' WHERE id_data_diri = '$id_data_diri'";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
?>