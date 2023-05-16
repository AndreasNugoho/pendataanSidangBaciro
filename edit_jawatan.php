<?php
require 'func/func_jawatan.php';
$id = $_GET['id'];
$jawatan = query("SELECT * FROM data_jawatan JOIN data_diri ON data_diri.id_data_diri = data_jawatan.id_data_diri WHERE id_jawatan = '$id'")[0];
$jaw = $jawatan['id_data_diri'];
if (isset($_POST["submit"])){
    if (edit($_POST) > 0){
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'detail.php?id=$jaw';

            </script>
		";
    } else {
		echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'detail.php?id=$jaw';
            </script>
		";
	}

}
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
            <input type="hidden" name="id_jawatan" value="<?= $jawatan["id_jawatan"]; ?>">
            <input type="hidden" name="id_data_diri" value="<?= $jawatan["id_data_diri"]; ?>">
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="nama_lengkap" readonly value="<?= $jawatan["nama_lengkap"]?>">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="date" name="tanggal_penetapan" id="tanggal_penetapan" class="form-control"placeholder="tanggal_penetapan" required value="<?= $jawatan["tanggal_penetapan"]?>">
                    <label for="tanggal_penetapan" class="form-label">Tanggal Penetapan </label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tempat_penetapan" id="tempat_penetapan" class="form-control" placeholder="tempat_penetapan" required value="<?= $jawatan["tempat_penetapan"]?>">
                    <label for="tempat_penetapan" class="form-label">Tempat Penetapan </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="sebagai_penetapan" id="sebagai_penetapan" class="form-control" placeholder="tgl_lahir" required value="<?= $jawatan["sebagai_penetapan"]?>">
                    <label for="tgl_lahir" class="form-label">Dalam Jawatan</label>
                </div>
            </div>

                <div class="form-floating mb-3 mx-auto w-50">
                &nbsp;<button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
                </div>
           

    </form>
</body>
</html>