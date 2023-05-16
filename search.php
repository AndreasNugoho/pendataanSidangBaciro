<?php
require_once "func/func.php";
header('Content-Type: application/json; charset=utf-8');
if(isset($_GET['term'])){
    $stmt = $conn->prepare("SELECT * from data_diri WHERE nama_lengkap LIKE :keyword");
    $stmt->bindValue('keyword','%' .$_GET['term']. '%');
    $stmt->execute();
    echo json_encode($stmt->fetchAll(PDO::FETCH_CLASS));
}else{
    $stmt = $conn->prepare("SELECT * from data_diri");
    $stmt->execute();
    echo json_encode($stmt->fetchAll(PDO::FETCH_CLASS));
}
?>