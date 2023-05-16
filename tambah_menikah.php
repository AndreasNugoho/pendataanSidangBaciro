<?php
require 'func/func_menikah.php';
// $id = $_GET['id'];
$query = " SELECT * FROM data_diri ORDER BY nama_lengkap ASC";
$result = $conn->query($query);

//var_dump($babtis);
if (isset($_POST["submit"])){
    if (tambah($_POST) > 0){
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
		";
    } else {
		echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="css/select2/jquery.min.js"></script>
    <link rel="stylesheet" href="css/select2/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="css/select2/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <link href="css/select2/select2.min.css" rel="stylesheet" />
    
    <link href="css/select2/select2-bootstrap4.css" rel="stylesheet" />
    <script src="css/select2/select2.min.js"></script>
    <link rel="stylesheet" href="css/select2/select2.css" integrity="sha512-6EvBgCHS8n53Oz5WmMqqi7rvq3OleJhh49KekVqRql5z4aUMgiGImNsS3+Svn9a6F8rC6Hdro3X/qwn4uVYm1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        </nav><br>
    <h4 class="kepala" align="center">INPUT DATA NIKAH</h4><br>
        <form action="" method="POST">
                        <div class="row g-2 mx-auto w-50">
                            <div class="form-group mb-3 mx-auto w-50">
                                <label for="suami" class="form-contol">Pilih nama suami</label>
                                <select name="suami" id="suami" class="form-control form-control-lg select2">
                                    <?php
                                        foreach($result as $row)
                                        {
                                        echo '<option value="'.$row['id_data_diri'].'">'.$row['nomor_bi'].'&nbsp;  -  &nbsp;'.$row['nama_lengkap'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        <div class="form-group mb-3 mx-auto w-50">
                                <label for="istri" class="form-contol">Pilih nama istri</label>
                                <select name="istri" id="istri" class="form-control form-control-lg select2">
                                    <?php
                                        foreach($result as $row)
                                        {
                                            echo '<option value="'.$row['id_data_diri'].'">'.$row['nomor_bi'].'&nbsp; - &nbsp;'.$row['nama_lengkap'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                            <div class="form-floating mb-3 mx-auto w-50">
                            &nbsp;<button type="submit" class="btn btn-primary" name="ok" id="ok">tampilkan data</button>
                            </div>
            </form>
            <?php
            if(!empty($_POST['suami']) AND !empty($_POST['istri'])){?>
            <?php 
                $nama_suami  = $_POST['suami'];
                $nama_istri  = $_POST['istri'];
                // $suami_bi = query("SELECT * FROM data_diri WHERE nomor_bi = '$nama_suami'")[0];
                // $istri_bi = query("SELECT * FROM data_diri WHERE nomor_bi = '$nama_istri'")[0];
                // var_dump($suami_bi);
                $cek_baptis_suami = query("SELECT nomor_bi FROM data_babtis JOIN data_diri ON data_diri.id_data_diri = data_babtis.id_data_diri WHERE data_diri.nomor_bi = '$nama_suami'");
                $cek_baptis_istri = query("SELECT nomor_bi FROM data_babtis JOIN data_diri ON data_diri.id_data_diri = data_babtis.id_data_diri WHERE data_diri.nomor_bi = '$nama_istri'");
                $query1 = mysqli_query($conn, "SELECT id_data_diri_istri  from data_menikah WHERE id_data_diri_istri = '$nama_istri' OR id_data_diri_istri = '$nama_suami'");
                $query2 = mysqli_query($conn, "SELECT id_data_diri_suami  from data_menikah WHERE id_data_diri_suami = '$nama_suami' OR id_data_diri_suami = '$nama_istri'");
                $tes1 = mysqli_num_rows($query2);
                $tes = mysqli_num_rows($query1);
                if ($tes != null){
                        echo "
                        <script>
                            alert('data sudah terpakai!');
                            document.location.href = 'tambah_menikah.php';
                        </script>
                        ";  
                }if ($tes1 != null){
                    echo "
                    <script>
                        alert('data sudah terpakai!');
                        document.location.href = 'tambah_menikah.php';
                    </script>
                    ";  
            }   if ($nama_suami == $nama_istri){
                        echo "
                        <script>
                            alert('data tidak boleh sama!');
                            document.location.href = 'tambah_menikah.php';
                        </script>
                    ";
                }else{
                        $suami = query("SELECT * FROM data_diri WHERE nomor_bi = '$nama_suami'")[0];
                        $istri = query("SELECT * FROM data_diri WHERE nomor_bi = '$nama_istri'")[0];
                }
                    ?>
        <form action=""method="POST">
            <input type="hidden" name="id_data_diri_suami" value="<?= $suami["id_data_diri"]; ?>">
            <input type="hidden" name="id_data_diri_istri" value="<?= $istri["id_data_diri"]; ?>">
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_bi_suami" id="nomor_bi_suami" class="form-control" placeholder="nomor_bi_suami" readonly value="<?= $suami['nomor_bi'] ?>">
                    <label for="nomor_bi_suami" class="form-label">Nomor Buku Induk Suami</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_bi_istri" id="nomor_bi_istri" class="form-control" placeholder="nomor_bi_istri" readonly value="<?= $istri['nomor_bi'] ?>">
                    <label for="nomor_bi_istri" class="form-label">Nomor Buku Induk Istri</label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_lengkap_suami" id="nama_lengkap" class="form-control" placeholder="nama_lengkap_suami" readonly value="<?= $suami['nama_lengkap'] ?>">
                    <label for="nama_lengkap_suami" class="form-label">Nama Lengkap Suami </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_lengkap_istri" id="nama_lengkap_istri" class="form-control" placeholder="nama_lengkap_istri" readonly value="<?= $istri['nama_lengkap'] ?>">
                    <label for="nama_lengkap_istri" class="form-label">Nama Lengkap Istri </label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tempat_lahir_suami" id="tempat_lahir_suami" class="form-control" placeholder="tempat_lahir_suami" readonly value="<?= $suami['tempat_lahir'] ?>">
                    <label for="tempat_lahir_suami" class="form-label">Tempat Lahir Suami </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tempat_lahir_istri" id="tempat_lahir_istri" class="form-control" placeholder="tempat_lahir_istri" readonly value="<?= $suami['tempat_lahir'] ?>">
                    <label for="tempat_lahir_istri" class="form-label">Tempat Lahir Istri </label>
                </div>      
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="date" name="tgl_lahir_suami" id="tgl_lahir_suami" class="form-control" placeholder="tgl_lahir_suami" readonly value="<?= $suami['tgl_lahir'] ?>">
                    <label for="tgl_lahir_suami" class="form-label">Tgl Lahir Suami </label>
                </div> 
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="date" name="tgl_lahir_istri" id="tgl_lahir_istri" class="form-control" placeholder="tgl_lahir_istri" readonly value="<?= $istri['tgl_lahir'] ?>">
                    <label for="tgl_lahir_istri" class="form-label">Tgl Lahir Istri </label>
                </div>  
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ayah_suami" id="nama_ayah_suami" class="form-control" placeholder="nama_ayah_suami" required >
                    <label for="nama_ayah_suami" class="form-label">Nama Ayah Suami </label>
                </div> 
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ayah_istri" id="nama_ayah_istri" class="form-control" placeholder="nama_ayah_istri" required >
                    <label for="nama_ayah_istri" class="form-label">Nama Ayah Istri </label>
                </div>  
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ibu_suami" id="nama_ibu_suami" class="form-control" placeholder="nama_ibu_suami" required >
                    <label for="nama_ibu_suami" class="form-label">Nama Ibu Suami </label>
                </div> 
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ibu_istri" id="nama_ibu_istri" class="form-control" placeholder="nama_ibu_istri" required >
                    <label for="nama_ibu_istri" class="form-label">Nama Ibu Istri </label>
                </div>  
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tempat_menikah" id="tempat_menikah" class="form-control" placeholder="tempat_menikah" required>
                    <label for="tempat_menikah" class="form-label">Tempat Menikah </label>
                </div> 
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="date" name="tanggal_menikah" id="tanggal_menikah" class="form-control" placeholder="tanggal_menikah" required>
                    <label for="tanggal_menikah" class="form-label">Tanggal Menikah </label>
                </div>  
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="oleh_menikah" id="oleh_menikah" class="form-control" placeholder="oleh_menikah" required>
                    <label for="oleh_menikah" class="form-label">Pemberkatan Oleh </label>
                </div> 
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tmpt_tinggal_pemberkat" id="tmpt_tinggal_pemberkat" class="form-control" placeholder="tmpt_tinggal_pemberkat" required>
                    <label for="tmpt_tinggal_pemberkat" class="form-label">Tempat tinggal pemberi berkat</label>
                </div> 
                
            </div>
            <div class="mx-auto w-50">
                    <button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
                </div>  
            
        </form>
            <?php 
                    }
            ?>
            <script src="js/select2/jquery.min.js"></script>
            <script src="js/select2/bootstrap.min.js" crossorigin="anonymous"></script>
            <script src="js/select2/select2.js" integrity="sha512-21mA6bhcbg4AFCkR0UprmyvoUbv4SoG85V6Y92dqjKWTh1U3NxsxQ3BtOezfYLaBClKbs0ZebbyUQpc+tXGQcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="js/select2/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

            <script>
               $(document).ready(function(){

                    $('.select2').select2({
                    placeholder:'Masukkan nama',
                    theme:'bootstrap4',
                    tags:true,
                    }).on('select2:close', function(){
                    var element = $(this);
                    var new_category = $.trim(element.val());

                    if(new_category != '')
                    {
                        $.ajax({
                        url:"bagian_nikah.php",
                        method:"POST",
                        data:{category_name:new_category},
                        success:function(data)
                        {
                            if(data == 'yes')
                            {
                            element.append('<option value="'+new_category+'">'+new_category+'</option>').val(new_category);
                            }
                        }
                        })
                    }
                    });
                    });
            </script>



</body>
</html>