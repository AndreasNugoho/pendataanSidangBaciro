<?php
setlocale(LC_ALL, 'IND');
require 'func/func_jawatan.php';
$id = $_GET['id'];
$jawatan = query("SELECT * FROM data_jawatan JOIN data_diri ON data_diri.id_data_diri = data_jawatan.id_data_diri WHERE data_jawatan.id_data_diri = '$id'");
$jawatan1 = query("SELECT * FROM data_jawatan WHERE data_jawatan.id_data_diri = '$id'");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sidang Baciro</title>
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css2.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    .navbar.bg-light {
        background-color: #f3e2b3 !important;
        .form-control {
            border-radius: 4.25rem;
        }
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
                <div class="container">
                    <a class="navbar-brand" href="index.php">Edit Data Baptis</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="detail.php?id=<?= $babtis["id_data_diri"];?>">Detail</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">DATA SIDANG</h3>
                <hr>
            </div>
        </div>
    
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive-sm table-hover text-center" style="width:100%">
                    <thead class="table-dark">
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Tanggal Penetapan</th>
                        <th>Tempat Penetapan</th>
                        <th width="175">Dalam Jawatan</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($jawatan as $row):
                            $tanggal_penetapan = new DateTime($row['tanggal_penetapan']);
                        ?>    
                        <tr>
                            <td><?php echo $row['nama_lengkap'];?></td>
                            <td><?php echo strftime('%d %B %Y', $tanggal_penetapan->getTimestamp()) ?></td>
                            <td><?php echo $row['sebagai_penetapan'];?></td>
                            <td><?php echo $row['tempat_penetapan'];?></td>
                            <td>
                                <a href="hapus_jawatan.php?id=<?= $row["id_jawatan"];?>" onclick="return confirm('apakah data akan di hapus?');" class="btn btn-danger btn-sm" style="font-weight: 600;"> Hapus</a>
                                <a href="edit_jawatan.php?id=<?= $row["id_jawatan"];?>" class="btn btn-secondary btn-sm" style="font-weight: 600;"> Edit</a>
                            
                            </td>  
                        </tr>
                        <?php endforeach;?>
                </table>

</body>
