<?php
require 'func/func_kemetraian.php';
$id = $_GET['id'];
$kemetraian = query("SELECT * FROM data_kemetraian JOIN data_diri ON data_kemetraian.id_data_diri = data_diri.id_data_diri WHERE data_kemetraian.id_data_diri = '$id'")[0];

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
                        <a class="nav-link" href="detail.php?id=<?= $kemetraian["id_data_diri"];?>">Detail</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><br>
    <h4 class="kepala" align="center">EDIT DATA KEMETRAIAN</h4><br>
    <form action=""method="POST">
            <input type="hidden" name="id_kemetraian" value="<?= $kemetraian["id_kemetraian"]; ?>">
            <input type="hidden" name="id_data_diri" value="<?= $kemetraian["id_data_diri"]; ?>">
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_bi" id="nomor_bi" class="form-control"placeholder="nomor_bi" readonly value="<?= $kemetraian["nomor_bi"]?>">
                    <label for="nomor_bi" class="form-label">Nomor Buku Induk </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tempat_kemetraian" id="tempat_kemetraian" class="form-control"placeholder="tempat_kemetraian" required value="<?= $kemetraian["tempat_kemetraian"]?>">
                    <label for="tempat_kemetraian" class="form-label">Tempat kemetraian </label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="date" name="tanggal_kemetraian" id="tanggal_kemetraian" class="form-control" placeholder="tanggal_kemetraian" required value="<?= $kemetraian["tanggal_kemetraian"]?>">
                    <label for="tanggal_kemetraian" class="form-label">Tanggal kemetraian </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="oleh_kemetraian" id="oleh_kemetraian" class="form-control" placeholder="oleh_kemetraian" required value="<?= $kemetraian["oleh_kemetraian"]?>">
                    <label for="oleh_kemetraian" class="form-label">Dimetraikan Oleh </label>
                </div>
            </div>
                <div class="mx-auto w-50">
                    &nbsp;<button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
                    <a href="hapus_kemetraian.php?id=<?= $id;?>" onclick="return confirm('apakah data akan di hapus?');" class="btn btn-danger" style="font-weight: 600;"> Hapus</a>

                </div>

    </form>
</body>
</html>