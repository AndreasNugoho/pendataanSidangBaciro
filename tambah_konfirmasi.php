<?php
require 'func/func_konfirmasi.php';
$id = $_GET['id'];
$query = query("SELECT * FROM data_diri WHERE id_data_diri = '$id'")[0];


//var_dump($babtis);
if (isset($_POST["submit"])){
    if (tambah($_POST) > 0){
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
    <h4 class="kepala" align="center">INPUT DATA KONFIRMASI</h4><br>
    <form action=""method="POST">
        
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_bi" id="nomor_bi" class="form-control"placeholder="nomor_bi" readonly value="<?= $query["nomor_bi"]?>">
                    <label for="nomor_bi" class="form-label">Nomor Buku Induk </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tempat_konfirmasi" id="tempat_konfirmasi" class="form-control"placeholder="tempat_konfirmasi" required>
                    <label for="tempat_konfirmasi" class="form-label">Tempat Konfirmasi </label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="date" name="tgl_konfirmasi" id="tgl_konfirmasi" class="form-control" placeholder="tgl_konfirmasi" required>
                    <label for="tgl_konfirmasi" class="form-label">Tanggal Konfirmasi </label>
                </div>   
                <div class="mx-auto w-50">
                    &nbsp;<button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
                </div>
            </div>


    </form>
</body>
</html>