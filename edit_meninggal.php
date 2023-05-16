<?php
require 'func/func_meninggal.php';
$id = $_GET['id'];
$meninggal = query("SELECT * FROM data_meninggal JOIN data_diri ON data_diri.id_data_diri = data_meninggal.id_data_diri WHERE data_meninggal.id_data_diri = '$id'")[0];

if (isset($_POST["submit"])){
    if (edit($_POST) > 0){
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
                        <a class="nav-link" href="detail.php?id=<?= $meninggal["id_data_diri"];?>">Detail</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><br>
    <h4 class="kepala" align="center">EDIT DATA MENINGGAL</h4><br>
    <form action=""method="POST">
            <input type="hidden" name="id_meninggal" value="<?= $meninggal["id_meninggal"]; ?>">
            <input type="hidden" name="id_data_diri" value="<?= $meninggal["id_data_diri"]; ?>">
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_bi" id="nomor_bi" class="form-control"placeholder="nomor_bi" readonly value="<?= $meninggal["nomor_bi"];?>">
                    <label for="nomor_bi" class="form-label">Nomor Buku Induk </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="date" name="tanggal_meninggal" id="tanggal_meninggal" class="form-control"placeholder="tanggal_meninggal" required value="<?= $meninggal["tanggal_meninggal"]?>">
                    <label for="tanggal_meninggal" class="form-label">Tanggal meninggal </label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3" >
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"placeholder="nama_lengkap" readonly value="<?php echo $meninggal['nama_lengkap']; ?>">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap </label>
                </div>
            </div>

            <div class="mx-auto w-50">
                <button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
            </div>

    </form>
</body>
</html>