<?php
require 'func/func_pindah.php';
$id = $_GET['id'];
//$id =var_dump($id);
$query = query("SELECT * FROM data_diri WHERE id_data_diri = '$id'")[0];



//var_dump($babtis);
if (isset($_POST["submit"])){
    if (tambah($_POST) > 0){
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'detail.php?id=$id';
            </script>
		";
    } else {
		echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'detail.php?id=$id';
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
                    <a class="navbar-brand" href="index.php">Data Baptis</a>
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
    <h4 class="kepala" align="center">INPUT DATA BAPTIS</h4><br>
    <form action=""method="POST">
            <input type="hidden" name="status" value="Pindah">
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_bi" id="nomor_bi" class="form-control"placeholder="nomor_bi" readonly value="<?= $query["nomor_bi"]?>">
                    <label for="nomor_bi" class="form-label">Nomor Buku Induk </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="distrik_asal" id="distrik_asal" class="form-control"placeholder="distrik_asal" required>
                    <label for="distrik_asal" class="form-label">Distrik Asal</label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="distrik_pindah" id="distrik_pindah" class="form-control" placeholder="distrik_pindah" required>
                    <label for="distrik_pindah" class="form-label">Distrik Tujuan </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="sidang_tujuan" id="sidang_tujuan" class="form-control" placeholder="sidang_tujuan" required>
                    <label for="sidang_tujuan" class="form-label">Sidang Tujuan</label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3" >
                    <input type="text" name="alamat_baru" id="alamat_baru" class="form-control" placeholder="alamat_baru" required>
                    <label for="alamat_baru" class="form-label">Alamat Baru </label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="kel" id="kel" class="form-control" placeholder="kel" required>
                    <label for="kel" class="form-label">Keluarga </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="date" name="tgl_pindah" id="tgl_pindah" class="form-control" placeholder="tgl_pindah" required>
                    <label for="tgl_pindah" class="form-label">Tanggal Pindah </label>
                </div>
                      
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="kategori" id="kategori" class="form-control" placeholder="kategori" required>
                    <label for="kategori" class="form-label">kategori </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50">
                    <button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
                </div>
            </div>
                
            

    </form>
</body>
</html>