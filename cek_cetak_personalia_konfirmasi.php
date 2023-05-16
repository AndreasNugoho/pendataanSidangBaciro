<?php
require 'func/func_konfirmasi.php';
$id = $_GET['id'];
$babtis = mysqli_query($conn,"SELECT * FROM data_babtis WHERE id_data_diri = '$id'");
$kemetraian = mysqli_query($conn,"SELECT * FROM data_kemetraian WHERE id_data_diri = '$id'");
$arr_babtis = mysqli_fetch_array($babtis);
$arr_kemetraian = mysqli_fetch_array($kemetraian);
if (isset($_POST["submit"])){
    if($arr_babtis == NULL AND $arr_kemetraian == NULL){
        echo "
            <script>
                alert('data babtis dan kemetraian kosong!');
                document.location.href = 'detail.php?id=$id';
            </script>
        ";
    }if($arr_babtis == NULL OR $arr_kemetraian == NULL){
        if($arr_babtis == NULL){
            echo "
                <script>
                    alert('data babtis kosong!');
                    document.location.href = 'detail.php?id=$id';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('data kemetraian kosong!');
                    document.location.href = 'detail.php?id=$id';
                </script>
            ";
        }

    }else{
        $data_diri = query("SELECT * FROM data_diri JOIN data_babtis ON data_diri.id_data_diri = data_babtis.id_data_diri JOIN data_konfirmasi ON data_konfirmasi.id_data_diri = data_diri.id_data_diri JOIN data_kemetraian ON data_kemetraian.id_data_diri = data_diri.id_data_diri WHERE data_diri.id_data_diri = '$id'")[0];
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
                    <a class="navbar-brand" href="index.php">CEK DATA KARTU PERSONALIA</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="detail.php?id=<?= $data_diri["id_data_diri"];?>">Detail</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><br/>
    <h4 class="kepala" align="center">CEK DATA KARTU PERSONALIA</h4><br/>
    <form action=""method="POST">
            <div class="row g-2 mx-auto w-50">
                <div class=" mb-3 mx-auto w-50" >
                    <select class="form-select form-select-sm" name="jumlah_bi" id="jumlah_bi">
                        <option selected>Pilih Jumlah Nomor Buku Induk</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>  
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50">
                    <button type="submit" class="btn btn-primary" name="submit">Cetak</button>
                </div>
            </div>  
    </form>
    
    <form action="cetak_personalia_konfirmasi.php?id=<?= $data_diri['id_data_diri'] ?>" method="POST">
        <?php
            if (!empty($_POST['jumlah_bi'])){        
            $jumlah_bi = $_POST['jumlah_bi'];?>
        <input type="hidden" name="jumlah_bi" value="<?= $jumlah_bi ?>">
        <?php
                if ($jumlah_bi == 1){
        ?>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi" id="nomor_bi" class="form-control"placeholder="nomor_bi" readonly value="<?php echo $data_diri['nomor_bi'];?>">
                        <label for="nomor_bi" class="form-label">Nomor Buku Induk</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku" id="dalam_buku" class="form-control"placeholder="dalam_buku" readonly value="Sidang Baciro">
                        <label for="dalam_buku" class="form-label">Dalam Buku</label>
                    </div>
                </div>
        <?php
                }if ($jumlah_bi == 2){
        ?>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_1" id="nomor_bi_1" class="form-control"placeholder="nomor_bi_1" required>
                        <label for="nomor_bi_1" class="form-label">Nomor Buku Induk 1</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_1" id="dalam_buku_1" class="form-control"placeholder="dalam_buku_1" required>
                        <label for="dalam_buku_1" class="form-label">Dalam Buku</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi" id="nomor_bi" class="form-control"placeholder="nomor_bi" readonly value="<?php echo $data_diri['nomor_bi'];?>">
                        <label for="nomor_bi" class="form-label">Nomor Buku Induk</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku" id="dalam_buku" class="form-control"placeholder="dalam_buku" readonly value="Sidang Baciro">
                        <label for="dalam_buku" class="form-label">Dalam Buku</label>
                    </div>
                </div>

        <?php
                }if ($jumlah_bi == 3){
        ?>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_1" id="nomor_bi_1" class="form-control"placeholder="nomor_bi_1" required>
                        <label for="nomor_bi_1" class="form-label">Nomor Buku Induk 1</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_1" id="dalam_buku_1" class="form-control"placeholder="dalam_buku_1" required>
                        <label for="dalam_buku_1" class="form-label">Dalam Buku</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_2" id="nomor_bi_2" class="form-control"placeholder="nomor_bi_2" required>
                        <label for="nomor_bi_2" class="form-label">Nomor Buku Induk 2</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_2" id="dalam_buku_2" class="form-control"placeholder="dalam_buku_2" required>
                        <label for="dalam_buku_2" class="form-label">Dalam Buku</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi" id="nomor_bi" class="form-control"placeholder="nomor_bi" readonly value="<?php echo $data_diri['nomor_bi'];?>">
                        <label for="nomor_bi" class="form-label">Nomor Buku Induk</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku" id="dalam_buku" class="form-control"placeholder="dalam_buku" readonly value="Sidang Baciro">
                        <label for="dalam_buku" class="form-label">Dalam Buku</label>
                    </div>
                </div>

        <?php
                }if ($jumlah_bi == 4){
        ?>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_1" id="nomor_bi_1" class="form-control"placeholder="nomor_bi_1" required>
                        <label for="nomor_bi_1" class="form-label">Nomor Buku Induk 1</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_1" id="dalam_buku_1" class="form-control"placeholder="dalam_buku_1" required>
                        <label for="dalam_buku_1" class="form-label">Dalam Buku</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_2" id="nomor_bi_2" class="form-control"placeholder="nomor_bi_2" required>
                        <label for="nomor_bi_2" class="form-label">Nomor Buku Induk 2</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_2" id="dalam_buku_2" class="form-control"placeholder="dalam_buku_2" required>
                        <label for="dalam_buku_2" class="form-label">Dalam Buku</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_3" id="nomor_bi_3" class="form-control"placeholder="nomor_bi_3" required>
                        <label for="nomor_bi_3" class="form-label">Nomor Buku Induk 3</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_3" id="dalam_buku_3" class="form-control"placeholder="dalam_buku_3" required>
                        <label for="dalam_buku_3" class="form-label">Dalam Buku</label>
                    </div>
                </div>

                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi" id="nomor_bi" class="form-control"placeholder="nomor_bi" readonly value="<?php echo $data_diri['nomor_bi'];?>">
                        <label for="nomor_bi" class="form-label">Nomor Buku Induk</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku" id="dalam_buku" class="form-control"placeholder="dalam_buku" readonly value="Sidang Baciro">
                        <label for="dalam_buku" class="form-label">Dalam Buku</label>
                    </div>
                </div>
        <?php
                }if ($jumlah_bi == 5){
        ?>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_1" id="nomor_bi_1" class="form-control"placeholder="nomor_bi_1" required>
                        <label for="nomor_bi_1" class="form-label">Nomor Buku Induk 1</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_1" id="dalam_buku_1" class="form-control"placeholder="dalam_buku_1" required>
                        <label for="dalam_buku_1" class="form-label">Dalam Buku</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_2" id="nomor_bi_2" class="form-control"placeholder="nomor_bi_2" required>
                        <label for="nomor_bi_2" class="form-label">Nomor Buku Induk 2</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_2" id="dalam_buku_2" class="form-control"placeholder="dalam_buku_2" required>
                        <label for="dalam_buku_2" class="form-label">Dalam Buku</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_3" id="nomor_bi_3" class="form-control"placeholder="nomor_bi_3" required>
                        <label for="nomor_bi_3" class="form-label">Nomor Buku Induk 3</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_3" id="dalam_buku_3" class="form-control"placeholder="dalam_buku_3" required>
                        <label for="dalam_buku_3" class="form-label">Dalam Buku</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_4" id="nomor_bi_4" class="form-control"placeholder="nomor_bi_4" required>
                        <label for="nomor_bi_4" class="form-label">Nomor Buku Induk 4</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_4" id="dalam_buku_4" class="form-control"placeholder="dalam_buku_4" required>
                        <label for="dalam_buku_4" class="form-label">Dalam Buku</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi" id="nomor_bi" class="form-control"placeholder="nomor_bi" readonly value="<?php echo $data_diri['nomor_bi'];?>">
                        <label for="nomor_bi" class="form-label">Nomor Buku Induk</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku" id="dalam_buku" class="form-control"placeholder="dalam_buku" readonly value="Sidang Baciro">
                        <label for="dalam_buku" class="form-label">Dalam Buku</label>
                    </div>
                </div>
        <?php
                }if ($jumlah_bi == 6){
        ?>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_1" id="nomor_bi_1" class="form-control"placeholder="nomor_bi_1" required>
                        <label for="nomor_bi_1" class="form-label">Nomor Buku Induk 1</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_1" id="dalam_buku_1" class="form-control"placeholder="dalam_buku_1" required>
                        <label for="dalam_buku_1" class="form-label">Dalam Buku</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_2" id="nomor_bi_2" class="form-control"placeholder="nomor_bi_2" required>
                        <label for="nomor_bi_2" class="form-label">Nomor Buku Induk 2</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_2" id="dalam_buku_2" class="form-control"placeholder="dalam_buku_2" required>
                        <label for="dalam_buku_2" class="form-label">Dalam Buku</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_3" id="nomor_bi_3" class="form-control"placeholder="nomor_bi_3" required>
                        <label for="nomor_bi_3" class="form-label">Nomor Buku Induk 3</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_3" id="dalam_buku_3" class="form-control"placeholder="dalam_buku_3" required>
                        <label for="dalam_buku_3" class="form-label">Dalam Buku</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_4" id="nomor_bi_4" class="form-control"placeholder="nomor_bi_4" required>
                        <label for="nomor_bi_4" class="form-label">Nomor Buku Induk 4</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_4" id="dalam_buku_4" class="form-control"placeholder="dalam_buku_4" required>
                        <label for="dalam_buku_4" class="form-label">Dalam Buku</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi_5" id="nomor_bi_5" class="form-control"placeholder="nomor_bi_5" required>
                        <label for="nomor_bi_5" class="form-label">Nomor Buku Induk 5</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku_5" id="dalam_buku_5" class="form-control"placeholder="dalam_buku_5" required>
                        <label for="dalam_buku_5" class="form-label">Dalam Buku</label>
                    </div>
                </div>

                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nomor_bi" id="nomor_bi" class="form-control"placeholder="nomor_bi" readonly value="<?php echo $data_diri['nomor_bi'];?>">
                        <label for="nomor_bi" class="form-label">Nomor Buku Induk</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="dalam_buku" id="dalam_buku" class="form-control"placeholder="dalam_buku" readonly value="Sidang Baciro">
                        <label for="dalam_buku" class="form-label">Dalam Buku</label>
                    </div>
                </div>
                <br>
                
        <?php
                }
                setlocale(LC_ALL, 'IND');
                $tanggal_lahir = new DateTime($data_diri['tgl_lahir']);
                $tgl_babtis = new DateTime($data_diri['tgl_babtis']);
                $tgl_kemetraian = new DateTime($data_diri['tanggal_kemetraian']);
                $tgl_konfirmasi = new DateTime($data_diri['tgl_konfirmasi']);


        ?>
        <br>
        <h4 class="kepala" align="center">CEK DATA DIRI</h4><br/>

                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"placeholder="nama_lengkap" readonly value="<?php echo $data_diri["nama_lengkap"]?>">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control"placeholder="tgl_lahir" readonly value="<?php echo strftime('%d - %m - %Y', $tanggal_lahir->getTimestamp())?>">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="kelurahan" id="kelurahan" class="form-control"placeholder="kelurahan" required>
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="kecamatan" id="kecamatan" class="form-control"placeholder="kecamatan" required>
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="kabupaten" id="kabupaten" class="form-control"placeholder="kabupaten" required>
                        <label for="kabupaten" class="form-label">Kabupaten</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"placeholder="pekerjaan">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="status" id="status" class="form-control"placeholder="status">
                        <label for="status" class="form-label">Status</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="babtis" id="babtis" class="form-control"placeholder="babtis" required>
                        <label for="babtis" class="form-label">Dibaptis di gereja</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <?php 
                        // $sidang = $data_diri['tmpt_babtis'];
                        // $arr = explode(' ',trim($sidang));               
                        // $tes = "";         
                        // for ($i = 0;$i < count($arr); $i++) {
                        //     $tes.=$arr[$i]." ";
                        // }
                        // echo $tes;
                        // $oleh_metrai = $data_diri['oleh_kemetraian'];
                        // $kemetraian = explode(' ',trim($oleh_metrai));

                        ?>
                        <input type="text" name="tempat_baptis" id="tempat_baptis" class="form-control"placeholder="tempat_baptis" readonly value="<?php echo $data_diri['tmpt_babtis'] ?>">
                        <label for="tempat_baptis" class="form-label">Tempat Baptis</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="tgl_babtis" id="tgl_babtis" class="form-control"placeholder="tgl_babtis" readonly value="<?php echo strftime('%d - %m - %Y', $tgl_babtis->getTimestamp())?>">
                        <label for="tgl_babtis" class="form-label">Tanggal Baptis</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="gereja_konfirmasi" id="gereja_konfirmasi" class="form-control"placeholder="oleh_konfirmasi" required>
                        <label for="gereja_konfirmasi" class="form-label">Dikonfirmasi Di gereja</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="tempat_konfirmasi" id="tempat_konfirmasi" class="form-control"placeholder="tempat_konfirmasi" readonly value="<?php echo $data_diri['tempat_konfirmasi']?>">
                        <label for="tempat_konfirmasi" class="form-label">Tempat Konfirmasi</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="tgl_konfirmasi" id="tgl_konfirmasi" class="form-control"placeholder="tgl_konfirmasi" readonly value="<?php echo strftime('%d - %m - %Y', $tgl_konfirmasi->getTimestamp()) ?>">
                        <label for="tgl_konfirmasi" class="form-label">Tanggal Konfirmasi</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="oleh_metrai" id="oleh_metrai" class="form-control"placeholder="oleh_metrai" readonly value="<?php echo $data_diri['oleh_kemetraian'] ?>">
                        <label for="oleh_metrai" class="form-label">Dimetraikan Oleh</label>
                    </div>
                </div>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="tempat_kemetraian" id="tempat_kemetraian" class="form-control" placeholder="tempat_kemetraian" readonly value="<?php echo $data_diri['tempat_kemetraian'];?>">
                        <label for="tempat_kemetraian" class="form-label">Tempat Kemetraian</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="tanggal_kemetraian" id="tanggal_kemetraian" class="form-control"placeholder="tanggal_kemetraian" readonly value="<?php echo strftime('%d - %m - %Y', $tgl_kemetraian->getTimestamp()) ?>">
                        <label for="tanggal_kemetraian" class="form-label">Tanggal Kemetraian</label>
                    </div>
                </div><br>
                <h4 class="kepala" align="center">LENGKAPI DATA SURAT</h4><br/>
                <div class="row g-2 mx-auto w-50">
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" placeholder="tgl_surat" required>
                        <label for="tgl_surat" class="form-label">Tanggal Surat</label>
                    </div>
                    <div class="form-floating mb-3 mx-auto w-50" >
                        <input type="text" name="pengantar" id="pengantar" class="form-control"placeholder="pengantar" required>
                        <label for="pengantar" class="form-label">Pengantar Sidang</label>
                    </div>
                </div>

                <div class="form-floating mb-3 mx-auto w-50">
                &nbsp;<button type="submit" class="btn btn-primary" name="submit">Cetak</button>
                </div>

        <?php  
        }
        ?>
    </form>
</body>
</html>