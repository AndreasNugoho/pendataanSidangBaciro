<?php
require 'func/func_menikah.php';
$id = $_GET['id'];
// $query = mysqli_query($conn,"SELECT * FROM `data_menikah` JOIN data_diri ON data_menikah.nomor_bi_istri = data_diri.nomor_bi OR data_menikah.nomor_bi_suami = data_diri.nomor_bi WHERE data_menikah.nomor_bi_istri = '$id' OR data_menikah.nomor_bi_suami = '$id'");
$arr = query("SELECT * FROM `data_menikah` WHERE data_menikah.id_data_diri_istri = '$id' OR data_menikah.id_data_diri_suami = '$id'")[0];
$id_nikah = $arr['id_menikah'];


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
                <a class="navbar-brand" href="index.php">Detail Data Menikah</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="detail.php?id=<?= $id?>">Detail</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
            </div>
        </nav>
        <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">DETAIL DATA MENIKAH</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <?php 
                    setlocale(LC_ALL, 'IND');
                    $tampil = query("SELECT * FROM data_menikah WHERE id_menikah = '$id_nikah'")[0];
                    $tgl_nikah = new DateTime($tampil['tanggal_menikah']);

                ?>
                <table class="table table-striped">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>: <?php echo $tampil['tempat_menikah'] ?></td>
                    </tr>
                    <tr>
                        <td>Tempat Menikah</td>
                        <td>: <?php echo strftime('%d %B %Y', $tgl_nikah->getTimestamp())?></td>
                    </tr>
                    <tr>
                        <td>Pemberkatan Pernikahan</td>
                        <td>: <?php echo $tampil['oleh_menikah']?></td>
                    </tr>
                </table>

                <!-- <p>
                    Tempat Menikah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $tampil['tempat_menikah'] ?><br>
                    Tanggal Menikah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo strftime('%d %B %Y', $tgl_nikah->getTimestamp())?><br>
                    Pemberkatan Pernikahan : <?php echo $tampil['oleh_menikah']?>
                </p> -->
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                    <thead class="table-dark">
                    <tr>
                        <th>Detail Suami</th>
                        <th>Detail Istri</th>
                        <th>Cetak</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                setlocale(LC_ALL, 'IND');
                                $nikah = query("SELECT * FROM `data_menikah` JOIN data_diri ON data_menikah.id_data_diri_suami = data_diri.id_data_diri or data_menikah.id_data_diri_istri = data_diri.id_data_diri where id_menikah = '$id_nikah'")[0];
                                $suami = $nikah['id_data_diri_suami'];
                                $istri = $nikah['id_data_diri_istri'];
                                $cek_suami = query("SELECT * FROM data_diri WHERE id_data_diri = '$suami'")[0];
                                $cek_istri = query("SELECT * FROM data_diri WHERE id_data_diri = '$istri'")[0];
                                $tgl_lahir_suami = new DateTime($cek_suami['tgl_lahir']);
                                $tgl_lahir_istri = new DateTime($cek_istri['tgl_lahir']);



                            ?>
                            <td>
                                <p>Nama Lengkap     : <?php echo $cek_suami['nama_lengkap']?></p>
                                <p>Tempat / Lahir   : <?php echo $cek_suami['tempat_lahir'].' , '.strftime('%d %B %Y', $tgl_lahir_suami->getTimestamp()) ?></p>
                                <p>Nama Ayah        : <?php echo $nikah['nama_ayah_suami']?></p>
                                <p>Nama Ibu         : <?php echo $nikah['nama_ibu_suami']?></p>

                            </td>
                            <td>
                                <p>Nama Lengkap     : <?php echo $cek_istri['nama_lengkap']?></p>
                                <p>Tempat / Lahir   : <?php echo $cek_istri['tempat_lahir'].' , '.strftime('%d %B %Y', $tgl_lahir_istri->getTimestamp())?></p>
                                <p>Nama Ayah        : <?php echo $nikah['nama_ayah_istri']?></p>
                                <p>Nama Ibu       : <?php echo $nikah['nama_ibu_istri']?></p>

                            </td>
                            <td>
                                <a href="cek_cetak_nikah.php?id=<?= $id?>" target="_blank" class="btn btn-secondary btn-sm" style="font-weight: 600;">Cetak</a>
                                <a href="cek_cetak_nikah_salinan.php?id=<?= $id?>" target="_blank" class="btn btn-secondary btn-sm" style="font-weight: 600;"> Cetak Salinan</a>
                            </td>
                        </tr>
                        
        </table>
        <script src="js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap5.min.js"></script>
                       
</body>
</html>