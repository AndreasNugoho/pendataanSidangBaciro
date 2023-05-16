<?php
require 'func/func_meninggal.php';
$id = $_GET['id'];
$arr = query("SELECT * FROM data_meninggal JOIN data_diri on data_diri.id_data_diri = data_meninggal.id_data_diri WHERE data_meninggal.id_data_diri = '$id';")[0];
//var_dump($arr);


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
                <a class="navbar-brand" href="index.php">Detail Data Meninggal</a>
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
                <h3 class="text-center fw-bold text-uppercase">DETAIL DATA MENINGGAL</h3>
                <hr>
            </div>
        </div>
        <?php
            setlocale(LC_ALL, 'IND');
            $tgl_meninggal = new DateTime($arr['tanggal_meninggal']);
        ?>
        <div class="row my-2">
            <div class="col-md">
            <table width="30%" class="table table-striped">
                <tr>
                    <td>Nama Lengkap</td>
                    <td><?php echo $arr['nama_lengkap'];?></td>
                </tr>
                <tr>
                    <td>Tanggal Meninggal</td>
                    <td><?php echo strftime('%A %d %B %Y', $tgl_meninggal->getTimestamp())?></td>
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