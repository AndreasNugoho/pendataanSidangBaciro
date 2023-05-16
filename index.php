<?php
require 'func/func.php';
$result = mysqli_query($conn,"SELECT * FROM data_diri");
setlocale(LC_ALL, 'IND');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sidang Baciro</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <!-- Data Tables -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css"> -->
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Google -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet"> -->
    <!-- Own CSS -->
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
                <a class="navbar-brand" href="index.php">Sidang Baciro</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
            </div>
        </div>
    </nav>
            </div>
        </nav>
        <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">DATA SIDANG</h3>
                <hr>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-auto">
                <a href="tambah_data.php" type="button">
                <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
                </a>
            </div>
            <div class="col-md-auto">
                <a href="cek_cetak_pindah.php" type="button">
                <button type="submit" class="btn btn-primary" name="submit">Cetak Surat Pindah</button>
                </a>
            </div>
            <div class="col-md-auto">
                <a href="cek_cetak_personalia.php" type="button">
                <button type="submit" class="btn btn-primary" name="submit">Cetak Personalia</button>
                </a>
            </div>

        </div>
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive-sm table-hover text-center" style="width:100%">
                    <thead class="table-dark">
                    <tr>
                        <th>No Buku Induk</th>
                        <th>Nama Lengkap</th>
                        <th width="175">TTL</th>
                        <th>Sidang</th>
                        <th>Status</th>
                        <th width="200">Detail</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row):
                            $tanggal_lahir = new DateTime($row['tgl_lahir']);
                        ?>    
                        <tr>
                            <td><?php echo $row['nomor_bi'];?></td>
                            <td><?php echo $row['nama_lengkap'];?></td>
                            <td><?php echo $row['tempat_lahir'].' , '.strftime('%d %B %Y', $tanggal_lahir->getTimestamp()) ?></td>
                            <td><?php echo $row['sidang'];?></td>
                            <td><?php echo $row['status'];?></td>
                            <td>
                                <a href="hapus_datadiri.php?id=<?= $row["id_data_diri"];?>" onclick="return confirm('apakah data akan di hapus?');" class="btn btn-danger btn-sm" style="font-weight: 600;"> Hapus</a>
                                <a href="edit_datadiri.php?id=<?= $row["id_data_diri"];?>" class="btn btn-secondary btn-sm" style="font-weight: 600;"> Edit</a>
                                <a href="detail.php?id=<?= $row["id_data_diri"];?>" class="btn btn-warning btn-sm" style="font-weight: 600;"> Detail</a>
                            
                            </td>  
                        </tr>
                        <?php endforeach;?>
        </table>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
        <script src="js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <!-- Data Tables -->
        <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
        <script src="js/jquery-3.5.1.js"></script>

        <!-- <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> -->
        <script src="js/jquery.dataTables.min.js"></script>

        <!-- <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script> -->
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