<?php
require 'func/func_menikah.php';
$id = $_GET['id'];
$menikah = query("SELECT * FROM data_menikah WHERE id_data_diri_suami = '$id' OR id_data_diri_istri = '$id'")[0];
$id_menikah = $menikah['id_menikah'];
$ambil = query("SELECT * FROM data_menikah WHERE id_menikah = '$id_menikah'")[0];
$istri = $menikah['id_data_diri_istri'];
$suami = $menikah['id_data_diri_suami'];
$query_istri = query("SELECT * FROM data_diri WHERE id_data_diri = '$istri'")[0];
$query_suami = query("SELECT * FROM data_diri WHERE id_data_diri = '$suami'")[0];
$query = query("SELECT * FROM data_diri WHERE id_data_diri = '$id'")[0];
setlocale(LC_ALL, 'IND');
$tgl_suami = new DateTime($query_suami['tgl_lahir']);
$tgl_istri = new DateTime($query_istri['tgl_lahir']);
// $konfirmasi = query("SELECT * FROM data_konfirmasi WHERE id_data_diri = '$id'");


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
                        <a class="nav-link" href="detail.php?id=<?= $query["id_data_diri"];?>">Detail</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><br>
    <h4 class="kepala" align="center">EDIT DATA NIKAH</h4><br>
    <form action=""method="POST">
            <input type="hidden" name="id_menikah" value="<?= $id_menikah; ?>">
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_bi_suami" id="nomor_bi_suami" class="form-control"placeholder="nomor_bi_suami" readonly value="<?php echo $query_suami['nomor_bi']; ?>">
                    <label for="nomor_bi_suami" class="form-label">Nomor Buku Induk Suami</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_bi_istri" id="nomor_bi_istri" class="form-control"placeholder="nomor_bi_istri" readonly value="<?php echo $query_istri['nomor_bi']; ?>">
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
                    <input type="text" name="TTL" id="TTL" class="form-control"placeholder="TTL" readonly value="<?php echo $query_suami['tempat_lahir'].' , '.strftime('%d %B %Y', $tgl_suami->getTimestamp());; ?>">
                    <label for="TTL" class="form-label">Tempat Tanggal Lahir</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="TTL" id="TTL" class="form-control"placeholder="TTL" readonly value="<?php echo $query_istri['tempat_lahir'].' , '.strftime('%d %B %Y', $tgl_istri->getTimestamp());; ?>">
                    <label for="TTL" class="form-label">Tempat Tanggal Lahir</label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ayah_suami" id="nama_ayah_suami" class="form-control"placeholder="nama_ayah_suami" required value="<?php echo $ambil['nama_ayah_suami']?>">
                    <label for="nama_ayah_suami" class="form-label">Nama Ayah</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ayah_istri" id="nama_ayah_istri" class="form-control"placeholder="nama_ayah_istri" required value="<?php echo $ambil['nama_ayah_istri']?>">
                    <label for="nama_ayah_istri" class="form-label">Nama Ayah</label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ibu_suami" id="nama_ibu_suami" class="form-control"placeholder="nama_ibu_suami" required value="<?php echo $ambil['nama_ibu_suami']?>">
                    <label for="nama_ibu_suami" class="form-label">Nama Ibu</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ibu_istri" id="nama_ibu_istri" class="form-control"placeholder="nama_ibu_istri" required value="<?php echo $ambil['nama_ibu_istri']?>">
                    <label for="nama_ibu_istri" class="form-label">Nama Ibu</label>
                </div>
            </div>

            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="date" name="tanggal_menikah" id="tanggal_menikah" class="form-control" placeholder="tanggal_menikah" required value="<?= $ambil["tanggal_menikah"]?>">
                    <label for="tanggal_menikah" class="form-label">Tanggal menikah </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="oleh_menikah" id="oleh_menikah" class="form-control" placeholder="oleh_menikah" required value="<?= $ambil["oleh_menikah"]?>">
                    <label for="oleh_menikah" class="form-label">Pemberkatan pernikahan Oleh </label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tmpt_tinggal_pemberkat" id="tmpt_tinggal_pemberkat" class="form-control" placeholder="tmpt_tinggal_pemberkat" required value="<?= $ambil["tmpt_tinggal_pemberkat"]?>">
                    <label for="tmpt_tinggal_pemberkat" class="form-label">Tempat Tinggal Pemberi Berkat </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tempat_menikah" id="tempat_menikah" class="form-control" placeholder="tempat_menikah" required value="<?= $ambil["tempat_menikah"]?>">
                    <label for="tempat_menikah" class="form-label">Tempat Menikah</label>
                </div>
                
            </div>
            <div class="mx-auto w-50">
                &nbsp;<button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
                <a href="hapus_nikah.php?id=<?= $id;?>" onclick="return confirm('apakah data akan di hapus?');" class="btn btn-danger" style="font-weight: 600;"><i class="bi bi-trash"></i> Hapus</a>
            </div>

    </form>
</body>
</html>