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
    
    $id_data_diri = $_GET['id'];
    $tanggal_penetapan = htmlspecialchars($data['tanggal_penetapan']);
    $tempat_penetapan = htmlspecialchars($data['tempat_penetapan']);
    $sebagai_penetapan = htmlspecialchars($data['sebagai_penetapan']);



    $query = "INSERT INTO data_jawatan VALUES('','$id_data_diri','$tanggal_penetapan','$tempat_penetapan','$sebagai_penetapan')";
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
    
    $id_jawatan = $data['id_jawatan'];
    $id_data_diri = $data['id_data_diri'];
    $tanggal_penetapan = htmlspecialchars($data['tanggal_penetapan']);
    $tempat_penetapan = htmlspecialchars($data['tempat_penetapan']);
    $sebagai_penetapan = htmlspecialchars($data['sebagai_penetapan']);

    $query = "UPDATE data_jawatan SET id_data_diri = '$id_data_diri',tanggal_penetapan = '$tanggal_penetapan',tempat_penetapan = '$tempat_penetapan',sebagai_penetapan = '$sebagai_penetapan' WHERE id_jawatan = '$id_jawatan'";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function hapus($id_jawatan){
    global $conn;
    mysqli_query($conn,"DELETE FROM data_jawatan WHERE id_jawatan='$id_jawatan'");

    return mysqli_affected_rows($conn);
}
?>