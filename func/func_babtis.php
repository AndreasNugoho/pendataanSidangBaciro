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

    $id_data_diri = $_GET['id'];
    $tmpt_babtis = htmlspecialchars($data['tmpt_babtis']);
    $tgl_babtis = htmlspecialchars($data['tgl_babtis']);
    $nama_ayah = htmlspecialchars($data['nama_ayah']);
    $nama_ibu = htmlspecialchars($data['nama_ibu']);


    $query = "INSERT INTO data_babtis VALUES('','$id_data_diri','$tmpt_babtis','$tgl_babtis','$nama_ayah','$nama_ibu')";
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
    
    $id_babtis=$data["id_babtis"];
    $id_data_diri = $data["id_data_diri"];
    $nomor_bi=$data["nomor_bi"];
    $tmpt_babtis = htmlspecialchars($data['tmpt_babtis']);
    $tgl_babtis = htmlspecialchars($data['tgl_babtis']);
    $nama_ayah = htmlspecialchars($data['nama_ayah']);
    $nama_ibu = htmlspecialchars($data['nama_ibu']);

    $query = "UPDATE data_babtis SET tmpt_babtis = '$tmpt_babtis',nama_ayah='$nama_ayah',nama_ibu ='$nama_ibu' WHERE id_data_diri = '$id_data_diri'";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function hapus($id_data_diri){
    global $conn;
    mysqli_query($conn,"DELETE FROM data_babtis WHERE id_data_diri='$id_data_diri'");

    return mysqli_affected_rows($conn);
}
?>