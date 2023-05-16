<?php
require 'func/func.php';
$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT * from data_diri  WHERE id_data_diri = '$id'");
$arr = mysqli_fetch_assoc($query);
$query2 = mysqli_query($conn,"SELECT * from data_babtis WHERE id_data_diri = '$id'");
$babtis = mysqli_fetch_assoc($query2);
$query3 = mysqli_query($conn,"SELECT * from data_kemetraian WHERE id_data_diri = '$id'");
$kemetraian = mysqli_fetch_assoc($query3);
$query4 = mysqli_query($conn,"SELECT * from data_konfirmasi WHERE id_data_diri = '$id'");
$konfirmasi = mysqli_fetch_assoc($query4);
$query5 = mysqli_query($conn,"SELECT * from data_menikah WHERE id_data_diri_suami = '$id' OR id_data_diri_istri = '$id'");
$menikah = mysqli_fetch_assoc($query5);
$query6 = mysqli_query($conn,"SELECT * from data_meninggal WHERE id_data_diri = '$id'");
$meninggal = mysqli_fetch_assoc($query6);
$query7 = mysqli_query($conn,"SELECT * from data_pindah WHERE id_data_diri = '$id'");
$pindah = mysqli_fetch_assoc($query7);
$query8 = mysqli_query($conn,"SELECT * from data_jawatan WHERE id_data_diri = '$id'");
$jawatan = mysqli_fetch_assoc($query8);

setlocale(LC_ALL, 'IND');
$tanggal_lahir = new DateTime($arr['tgl_lahir']);


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
    </nav>
            </div>
        </nav>
        <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">DETAIL DATA DIRI</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
            <table id="data" class="table table-striped table-responsive table-hover text-left" style="width:100%">
            <thead class="table-dark">
                <tr>
                       
                </tr>
                </thead>
                <tbody>
   

                <tr>
                    <td>Nama Lengkap </td>
                    <td>: <?php echo $arr['nama_lengkap'];?></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>: <?php echo $arr['nik'];?></td>
                </tr>
                <tr>
                    <td>Tempat Tanggal Lahir</td>
                    <td>: <?php echo $arr['tempat_lahir'].' , '.strftime('%d %B %Y', $tanggal_lahir->getTimestamp());?></td>
                </tr>
                <tr>
                    <td>Alamat Domisili</td>
                    <td>: <?php echo $arr['alamat_domisili'];?></td>
                </tr>
                <tr>
                    <td>Nomor Hp</td>
                    <td>: <?php echo $arr['no_hp'];?></td>
                </tr>
                <tr>
                    <td>Golongan Darah</td>
                    <td>: <?php echo $arr['gol_dar'];?></td>
                </tr>
            </table>

            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                    <thead class="table-dark">
                    <tr>
                        <th>Babtis</th>
                        <th>Kemetraian</th>
                        <th>Konfirmasi</th>
                        <th>Menikah</th>
                        <!-- <th>Meninggal</th> -->
                        <th>Pindah</th>
                        <th>Jawatan</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>
                            <?php
                                if($babtis != NULL){?>
                                    <a href="edit_babtis.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-secondary btn-sm" style="font-weight: 600;"> Edit</a>
                                    <a href="detail_babtis.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-primary btn-sm" style="font-weight: 600;"> Detail</a>
                                <?php }
                                else{ ?> <a href="tambah_babtis.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-warning btn-sm" style="font-weight: 600;"> Tambah</a><?php } ?>
                        </td>  
                        <td>
                            <?php
                                if($kemetraian != NULL){?>
                                    <a href="edit_kemetraian.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-secondary btn-sm" style="font-weight: 600;"> Edit</a>
                                    <a href="detail_kemetraian.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-primary btn-sm" style="font-weight: 600;"> Detail</a>
                                <?php }
                                else{ ?><a href="tambah_kemetraian.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-warning btn-sm" style="font-weight: 600;"> Tambah</a><?php } ?>
                        </td>  
                        <td>
                            <?php
                                if($konfirmasi != NULL){?>
                                    <a href="edit_konfirmasi.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-secondary btn-sm" style="font-weight: 600;">Edit</a>
                                    <a href="detail_konfirmasi.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-primary btn-sm" style="font-weight: 600;">Detail</a>
                                <?php }
                                else{ ?><a href="tambah_konfirmasi.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-warning btn-sm" style="font-weight: 600;">Tambah</a><?php } ?>
                        </td>  
                        <td>
                            <?php
                                if($menikah != NULL){?>
                                    <a href="edit_menikah.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-secondary btn-sm" style="font-weight: 600;"> Edit</a>
                                    <a href="detail_menikah.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-primary btn-sm" style="font-weight: 600;"> Detail</a>
                                <?php }
                                    else{ ?><a href="tambah_menikah.php" class="btn btn-warning btn-sm" style="font-weight: 600;"> Tambah</a><?php } ?>
                                </td>
                        <td>
                        <?php
                                if($pindah != NULL){?>
                                    <a href="edit_pindah.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-secondary btn-sm" style="font-weight: 600;">Edit</a>
                                    <a href="detail_pindah.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-primary btn-sm" style="font-weight: 600;"> Detail</a>
                                <?php }
                                else{ ?><a href="tambah_pindah.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-warning btn-sm" style="font-weight: 600;"> Tambah</a><?php } ?>

                        </td>
                        <td>
                        <?php
                                if($jawatan != NULL){?>
                                    <a href="detail_jawatan.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-primary btn-sm" style="font-weight: 600;"> Detail</a>
                                    <a href="tambah_jawatan.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-warning btn-sm" style="font-weight: 600;"> Tambah</a>
                                <?php }
                                else{ ?><a href="tambah_jawatan.php?id=<?= $arr["id_data_diri"];?>" class="btn btn-warning btn-sm" style="font-weight: 600;"> Tambah</a><?php } ?>

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