<?php
require 'func/func_menikah.php';
$id = $_GET['id'];
$menikah = query("SELECT * FROM data_menikah JOIN data_diri ON data_diri.id_data_diri = data_menikah.id_data_diri_suami OR data_menikah.id_data_diri_istri WHERE id_data_diri_suami = '$id' OR id_data_diri_istri = '$id'")[0];
$istri = $menikah['id_data_diri_istri'];
$suami = $menikah['id_data_diri_suami'];
$query_istri = query("SELECT * FROM data_diri WHERE id_data_diri = '$istri'")[0];
$query_suami = query("SELECT * FROM data_diri WHERE id_data_diri = '$suami'")[0];
setlocale(LC_ALL, 'IND');
$tgl_suami = new DateTime($query_suami['tgl_lahir']);
$tgl_istri = new DateTime($query_istri['tgl_lahir']);
$tgl_nikah = new DateTime($menikah['tanggal_menikah']);

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
                    </ul>
                </div>
            </div>
        </nav><br>
    <h4 class="kepala" align="center">CEK DATA PASANGAN</h4><br>
    <form action="cetak_nikah_salinan.php"method="POST">
        <?php
            $istri_bi = query("SELECT * FROM data_diri WHERE id_data_diri = '$istri'")[0];
            $suami_bi = query("SELECT * FROM data_diri WHERE id_data_diri = '$suami'")[0];

        ?>

            <input type="hidden" name="id" value="<?= $menikah["id_menikah"]; ?>">
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_bi_suami" id="nomor_bi_suami" class="form-control"placeholder="nomor_bi_suami" readonly value="<?php echo $suami_bi['nomor_bi']; ?>">
                    <label for="nomor_bi_suami" class="form-label">Nomor Buku Induk Suami</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_bi_istri" id="nomor_bi_istri" class="form-control"placeholder="nomor_bi_istri" readonly value="<?php echo $istri_bi['nomor_bi']; ?>">
                    <label for="nomor_bi_istri" class="form-label">Nomor Buku Induk Istri</label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_lengkap_suami" id="nama_lengkap_suami" class="form-control"placeholder="nama_lengkap_suami" readonly value="<?php echo $query_suami['nama_lengkap']; ?>">
                    <label for="nama_lengkap_suami" class="form-label">Nama Lengkap Suami</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_lengkap_istri" id="nama_lengkap_istri" class="form-control"placeholder="nama_lengkap_istri" readonly value="<?php echo $query_istri['nama_lengkap']; ?>">
                    <label for="nama_lengkap_istri" class="form-label">Nama Lengkap Istri</label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="ttl_suami" id="ttl_suami" class="form-control"placeholder="ttl_suami" readonly value="<?php echo $query_suami['tempat_lahir'].' , '.strftime('%d %B %Y', $tgl_suami->getTimestamp()); ?>">
                    <label for="ttl_suami" class="form-label">Tempat Tanggal Lahir</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="ttl_istri" id="ttl_istri" class="form-control"placeholder="ttl_istri" readonly value="<?php echo $query_istri['tempat_lahir'].' , '.strftime('%d %B %Y', $tgl_istri->getTimestamp()); ?>">
                    <label for="ttl_istri" class="form-label">Tempat Tanggal Lahir</label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ayah_suami" id="nama_ayah_suami" class="form-control"placeholder="nama_ayah_suami" readonly value="<?php echo $menikah['nama_ayah_suami']?>">
                    <label for="nama_ayah_suami" class="form-label">Nama Ayah</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ayah_istri" id="nama_ayah_istri" class="form-control"placeholder="nama_ayah_istri" readonly value="<?php echo $menikah['nama_ayah_istri']?>">
                    <label for="nama_ayah_istri" class="form-label">Nama Ayah</label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ibu_suami" id="nama_ibu_suami" class="form-control"placeholder="nama_ibu_suami" readonly value="<?php echo $menikah['nama_ibu_suami']?>">
                    <label for="nama_ibu_suami" class="form-label">Nama Ibu</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ibu_istri" id="nama_ibu_istri" class="form-control"placeholder="nama_ibu_istri" readonly value="<?php echo $menikah['nama_ibu_istri']?>">
                    <label for="nama_ibu_istri" class="form-label">Nama ibu</label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="agama_suami" id="agama_suami" class="form-control"placeholder="agama_suami" required>
                    <label for="agama_suami" class="form-label">Agama Suami</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="agama_istri" id="agama_istri" class="form-control"placeholder="agama_istri" required>
                    <label for="agama_istri" class="form-label">Agama Istri</label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tanggal_menikah" id="tanggal_menikah" class="form-control" placeholder="tanggal_menikah" readonly value="<?= strftime('%A, %d %B %Y', $tgl_nikah->getTimestamp());?>">
                    <label for="tanggal_menikah" class="form-label">Hari / Tanggal </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="oleh_menikah" id="oleh_menikah" class="form-control" placeholder="oleh_menikah" readonly value="<?= $menikah["oleh_menikah"]?>">
                    <label for="oleh_menikah" class="form-label">Pemberkatan pernikahan Oleh </label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
            <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tmpt_tinggal_pemberkat" id="tmpt_tinggal_pemberkat" class="form-control" placeholder="tmpt_tinggal_pemberkat" readonly value="<?= $menikah["oleh_menikah"]?>">
                    <label for="tmpt_tinggal_pemberkat" class="form-label">Tempat tinggal pemberi berkat </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tempat_menikah" id="tempat_menikah" class="form-control" placeholder="tempat_menikah" readonly value="<?= $menikah["tempat_menikah"]?>">
                    <label for="tempat_menikah" class="form-label">Tempat Menikah </label>
                </div>
                
            </div><br>
                <h4 class="kepala" align="center">DATA SURAT NIKAH</h4><br>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" placeholder="nomor_surat" required>
                    <label for="nomor_surat" class="form-label">Nomor Surat </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_pengantar" id="nama_pengantar" class="form-control" placeholder="nama_pengantar" required>
                    <label for="nama_pengantar" class="form-label">Yang Mengesahkan </label>
                </div>
               
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="penghantar_sidang" id="penghantar_sidang" class="form-control" placeholder="penghantar_sidang" required>
                    <label for="penghantar_sidang" class="form-label">Penghantar sidang di</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tempat_tinggal" id="tempat_tinggal" class="form-control" placeholder="tempat_tinggal" required>
                    <label for="tempat_tinggal" class="form-label">Bertempat tinggal di </label>
                </div>
                
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tmpt_surat" id="tmpt_surat" class="form-control" placeholder="tmpt_surat" required>
                    <label for="tmpt_surat" class="form-label">Tempat Surat</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" placeholder="tgl_surat" required>
                    <label for="tgl_surat" class="form-label">Tanggal Surat</label>
                </div>
            </div>
            <div class="mx-auto w-50">
                    &nbsp;<button type="submit" class="btn btn-primary" name="submit">Cetak</button>
                </div>

    </form>
</body>
</html>