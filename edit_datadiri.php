<?php
require 'func/func.php';
$id = $_GET['id'];
$data = query("SELECT * FROM data_diri WHERE id_data_diri = '$id'")[0];

if (isset($_POST["submit"])){
    if (edit($_POST) > 0){
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';

            </script>
		";
    } else {
		echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
		";
	}

}
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
                    <a class="navbar-brand" href="index.php">Edit Data Diri</a>
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
        </nav>
    <h4 class="kepala" align="center">INPUT DATA SIDANG</h4>
    <form action=""method="POST">
            <input type="hidden" name="id_data_diri" value="<?= $data["id_data_diri"]; ?>">
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_bi" id="nomor_bi" class="form-control" placeholder="nomor_bi" required value="<?= $data["nomor_bi"]?>">
                    <label for="nomor_bi" class="form-label">Nomor Buku Induk </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nik" id="nik" class="form-control"placeholder="nik" required value="<?= $data["nik"]?>">
                    <label for="nik" class="form-label">Nomor Induk Kependudukan </label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="nama_lengkap" required value="<?= $data["nama_lengkap"]?>">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tmpt_lahir" id="nama_lengkap" class="form-control" placeholder="tmpt_lahir" required value="<?= $data["tempat_lahir"]?>">
                    <label for="tmpt_lahir" class="form-label">Tempat Lahir </label>
                </div>
            </div>
            <div class="row g-2">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="tgl_lahir" required value="<?= $data["tgl_lahir"]?>">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="alamat_domisili" id="alamat_domisili" class="form-control" placeholder="alamat_domisili" required value="<?= $data["alamat_domisili"]?>">
                    <label for="alamat_domisili" class="form-label">Alamat Domisili </label>
                </div> 
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="no_hp" required value="<?= $data["no_hp"]?>">
                    <label for="no_hp" class="form-label">Nomor Hp</label>
                </div>     
            </div>  
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="gol_dar" id="gol_dar" class="form-control" placeholder="gol_dar" required value="<?= $data["gol_dar"]?>">
                    <label for="gol_dar" class="form-label">Golongan Darah </label>
                </div> 
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="sidang" id="sidang" class="form-control" placeholder="sidang" required value="<?= $data["sidang"]?>">
                    <label for="sidang" class="form-label">Sidang</label>
                </div>
            </div>
                <div class="form-floating mb-3 mx-auto w-50">
                &nbsp;<button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
                </div>
           

    </form>
</body>
</html>