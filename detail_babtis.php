<?php
setlocale(LC_ALL, 'IND');
require 'func/func_babtis.php';
$id = $_GET['id'];
$arr = query("SELECT * FROM data_babtis JOIN data_diri on data_diri.id_data_diri = data_babtis.id_data_diri WHERE data_babtis.id_data_diri = '$id';")[0];
$tanggal = new DateTime($arr['tgl_babtis']);


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
                    <li class="nav-item">
                        <a class="nav-link" href="detail.php?id=<?= $arr['id_data_diri'];?>">Detail</a>
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
                <h3 class="text-center fw-bold text-uppercase">DETAIL DATA BAPTIS</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
            <table width="100%"  class="table table-striped">
                <tr>
                    <td>Nama Lengkap</td>
                    <td>: <?php echo $arr['nama_lengkap'];?></td>
                </tr>
                <tr>
                    <td>Tempat Babtis</td>
                    <td>: <?php echo $arr['tmpt_babtis'];?></td>
                </tr>
                <tr>
                    <td>Tanggal Baptis</td>
                    <td>: <?php echo strftime('%d %B %Y', $tanggal->getTimestamp()); ?></td>
                </tr>
                <tr>
                    <td>Nama Ayah</td>
                    <td>: <?php echo $arr['nama_ayah'];?></td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>: <?php echo $arr['nama_ibu']?></td>
                </tr>
            </table>
         
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                    <thead class="table-dark">
                    <tr>
                        <th>Surat Babtis</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>
                            <a href="cek_cetak_babtis.php?id=<?= $arr["id_data_diri"]?>" target="_blank" class="btn btn-secondary btn-sm" style="font-weight: 600;"> Cetak Surat Baptis</a>
                            <a href="cek_cetak_babtis_salinan.php?id=<?= $arr["id_data_diri"]?>" target="_blank" class="btn btn-secondary btn-sm" style="font-weight: 600;"> Cetak Surat Baptis Salinan</a>
                        </td>  
                        </tr>
                        
                </table>
            </div>
        </div>
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