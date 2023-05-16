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
    $tanggal_meninggal = htmlspecialchars($data['tanggal_meninggal']);

    $query = "INSERT INTO data_meninggal VALUES('','$id_data_diri','$tanggal_meninggal')";
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
    
    $id_data_diri=$data["id_data_diri"];
    $tanggal_meninggal = htmlspecialchars($data["tanggal_meninggal"]);
    
    $query = "UPDATE data_meninggal SET tanggal_meninggal = '$tanggal_meninggal' WHERE id_data_diri = '$id_data_diri'";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
?>