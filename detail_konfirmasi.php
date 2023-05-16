<?php
require 'func/func_konfirmasi.php';
$id = $_GET['id'];
$arr = query("SELECT * FROM data_konfirmasi JOIN data_diri on data_diri.id_data_diri = data_konfirmasi.id_data_diri WHERE data_konfirmasi.id_data_diri = '$id';")[0];
$tanggal = new DateTime($arr['tgl_konfirmasi']);




?>
<!DOCTYPE html>
<html>
<head>
	<title>Sidang Baciro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
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
                <a class="navbar-brand" href="index.php">Data Konfirmasi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="detail.php?id=<?= $arr["id_data_diri"];?>">Detail</a>
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
                <h3 class="text-center fw-bold text-uppercase">DETAIL DATA KONFIRMASI</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <table class="table table-striped">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>: <?php echo $arr['nama_lengkap'];?></td>
                    </tr>
                    <tr>
                        <td>Tempat konfirmasi</td>
                        <td>: <?php echo $arr['tempat_konfirmasi'];?></td>
                    </tr>
                    <tr>
                        <td>Tanggal konfirmasi</td>
                        <td>: <?php echo strftime('%d %B %Y', $tanggal->getTimestamp()); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                    <thead class="table-dark">
                    <tr>
                        <th>Kartu Personalia</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>
                            <a href="cek_cetak_personalia_konfirmasi.php?id=<?= $arr["id_data_diri"]?>" target="_blank" class="btn btn-secondary btn-sm" style="font-weight: 600;"><i class="bi bi-printer-fill"></i> Cetak Personalia</a>
                        </td>  
                        </tr>
                        
        </table>
        <script src="js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="js/jquery-3.5.1.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap5.min.js"></script>
        <script>
        $(document).ready(function() {
                // Fungsi Table
                $('#data').DataTable();
                // Fungsi Table

                // Fungsi Detail
                $('.detail').click(function() {
                    var dataAkun = $(this).attr("data-id");
                    $.ajax({
                        url: "detail.php",
                        method: "post",
                        data: {
                            dataAkun,
                            dataAkun
                        },
                        success: function(data) {
                            $('#detail-akun').html(data);
                            $('#detail').modal("show");
                        }
                    });
                });
                // Fungsi Detail
            });
        </script>                      
</body>
</html>