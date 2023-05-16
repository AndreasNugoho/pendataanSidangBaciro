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
    //$id = $_GET['id'];
    
    $id_data_diri_suami = $data['id_data_diri_suami'];
    $id_data_diri_istri = $data['id_data_diri_istri'];
    $tempat_menikah = htmlspecialchars($data['tempat_menikah']);
    $tanggal_menikah = htmlspecialchars($data['tanggal_menikah']);
    $oleh_menikah = htmlspecialchars($data['oleh_menikah']);
    $nama_ayah_suami = htmlspecialchars($data['nama_ayah_suami']);
    $nama_ayah_istri = htmlspecialchars($data['nama_ayah_istri']);
    $nama_ibu_suami = htmlspecialchars($data['nama_ibu_suami']);
    $nama_ibu_istri = htmlspecialchars($data['nama_ibu_istri']);
    $tmpt_tinggal_pemberkat = htmlspecialchars($data['tmpt_tinggal_pemberkat']);


    $query = "INSERT INTO data_menikah VALUES('','$id_data_diri_istri','$id_data_diri_suami','$tempat_menikah','$tanggal_menikah','$oleh_menikah','$tmpt_tinggal_pemberkat','$nama_ayah_suami','$nama_ayah_istri','$nama_ibu_suami','$nama_ibu_istri')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
function hapus($id_data_diri){
    global $conn;
    mysqli_query($conn,"DELETE FROM data_menikah WHERE id_data_diri_suami = $id_data_diri OR id_data_diri_istri = $id_data_diri");

    return mysqli_affected_rows($conn);
}
function edit($data){
    global $conn;
    
    $id_menikah = $data['id_menikah'];
    $nomor_bi_suami = $data['nomor_bi_suami'];
    $nomor_bi_istri = $data['nomor_bi_istri'];
    $tempat_menikah = htmlspecialchars($data['tempat_menikah']);
    $tanggal_menikah = htmlspecialchars($data['tanggal_menikah']);
    $oleh_menikah = htmlspecialchars($data['oleh_menikah']);
    $nama_ayah_suami = htmlspecialchars($data['nama_ayah_suami']);
    $nama_ayah_istri = htmlspecialchars($data['nama_ayah_istri']);
    $nama_ibu_suami = htmlspecialchars($data['nama_ibu_suami']);
    $nama_ibu_istri = htmlspecialchars($data['nama_ibu_istri']);
    $tmpt_tinggal_pemberkat = htmlspecialchars($data['tmpt_tinggal_pemberkat']);

    $query = "UPDATE data_menikah SET tempat_menikah = '$tempat_menikah',tanggal_menikah = '$tanggal_menikah',oleh_menikah = '$oleh_menikah',tmpt_tinggal_pemberkat = '$tmpt_tinggal_pemberkat',nama_ayah_suami = '$nama_ayah_suami',nama_ayah_istri = '$nama_ayah_istri',nama_ibu_suami = '$nama_ibu_suami',nama_ibu_istri = '$nama_ibu_istri' WHERE id_menikah = '$id_menikah'";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
?>