<?php
require 'func/func_babtis.php';
$id = $_GET['id'];
$babtis = query("SELECT * FROM data_babtis JOIN data_diri on data_diri.id_data_diri = data_babtis.id_data_diri WHERE data_babtis.id_data_diri = '$id';")[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Input Data</title>
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css2.css">
    <link rel="stylesheet" href="css/style.css">
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
                    <a class="navbar-brand" href="index.php">Detail Data Diri</a>
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
    <h4 class="kepala" align="center">CEK DATA SURAT BAPTIS</h4>
    <form action="cetak_babtis.php?id=<?= $babtis["id_data_diri"]?>"method="POST">
            <input type="hidden" name="id" value="<?= $babtis["id_babtis"]; ?>">
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_bi" id="nomor_bi" class="form-control"placeholder="nomor_bi" readonly value="<?= $babtis["nomor_bi"]?>">
                    <label for="nomor_bi" class="form-label">Nomor Buku Induk </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tmpt_babtis" id="tmpt_babtis" class="form-control"placeholder="tmpt_babtis" readonly value="<?= $babtis["tmpt_babtis"]?>">
                    <label for="tmpt_babtis" class="form-label">Tempat Baptis </label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3" >
                    <input type="date" name="tgl_babtis" id="tgl_babtis" class="form-control" placeholder="tgl_babtis" readonly value="<?= $babtis["tgl_babtis"]?>">
                    <label for="tgl_babtis" class="form-label">Tanggal Baptis </label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" placeholder="nama_ayah" readonly value="<?= $babtis["nama_ayah"]?>">
                    <label for="nama_ayah" class="form-label">Nama Ayah </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" placeholder="nama_ibu" readonly value="<?= $babtis["nama_ibu"]?>">
                    <label for="nama_ibu" class="form-label">Nama Ibu </label>
                </div>      
            </div>

            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_surat_baptis" id="nomor_surat_baptis" class="form-control" placeholder="nomor_surat_baptis" required>
                    <label for="nomor_surat_baptis" class="form-label">Nomor surat baptis </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" placeholder="tgl_surat" required>
                    <label for="tgl_surat" class="form-label">Tanggal Surat </label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="sidang" id="sidang" class="form-control" placeholder="sidang" required>
                    <label for="sidang" class="form-label">Sidang </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="pengantar_sidang" id="pengantar_sidang" class="form-control" placeholder="pengantar_sidang" required>
                    <label for="pengantar_sidang" class="form-label">Pengantar Sidang </label>
                </div>
            </div>
            <div class="form-floating mb-3 mx-auto w-50">
            &nbsp;<button type="submit" class="btn btn-primary" name="submit">Cetak</button>
            </div>
             
                
           

    </form>
</body>
</html>