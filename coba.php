<?php
require 'func/func_menikah.php';
// $id = $_GET['id'];
$query = " SELECT * FROM data_diri ORDER BY nama_lengkap ASC";
$result = $conn->query($query);

//var_dump($babtis);
// if (isset($_POST["submit"])){
//     if (tambah($_POST) > 0){
//         echo "
// 			<script>
// 				alert('data berhasil ditambahkan!');
// 				document.location.href = 'index.php';
// 			</script>
// 		";
//     } else {
// 		echo "
//             <script>
//                 alert('data gagal ditambahkan!');
//                 document.location.href = 'index.php';
//             </script>
// 		";
// 	}

// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Input Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    	<!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    
    <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <style>
    .navbar.bg-light {
        background-color: #f3e2b3 !important;
        .form-control {
            border-radius: 4.25rem;
        }
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" integrity="sha512-6EvBgCHS8n53Oz5WmMqqi7rvq3OleJhh49KekVqRql5z4aUMgiGImNsS3+Svn9a6F8rC6Hdro3X/qwn4uVYm1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                        echo '<option value="'.$row['nomor_bi'].'">'.$row['nomor_bi'].'&nbsp;  -  &nbsp;'.$row['nama_lengkap'].'</option>';
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
                                            echo '<option value="'.$row['nomor_bi'].'">'.$row['nomor_bi'].'&nbsp; - &nbsp;'.$row['nama_lengkap'].'</option>';
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
            if(!empty($_POST['suami']) AND !empty($_POST['suami'])){?>
            <?php 
                $nama_suami  = $_POST['suami'];
                $nama_istri  = $_POST['istri'];
                $cek_baptis_suami = query("SELECT nomor_bi FROM data_babtis WHERE data_babtis.nomor_bi = '$nama_suami'");
                $cek_baptis_istri = query("SELECT nomor_bi FROM data_babtis WHERE data_babtis.nomor_bi = '$nama_istri'");
                $query1 = mysqli_query($conn, "SELECT nomor_bi_istri as 'istri' from data_menikah WHERE nomor_bi_istri = '$nama_istri'");
                $tes = mysqli_num_rows($query1);

                if ($tes > 0){
                        echo "
                        <script>
                        alert('any');
                    </script> 
                "; }else{?> 
                
        <form action=""method="POST">
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_bi_suami" id="nomor_bi_suami" class="form-control" placeholder="nomor_bi_suami" required value="<?= $suami['nomor_bi'] ?>">
                    <label for="nomor_bi_suami" class="form-label">Nomor Buku Induk Suami</label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nomor_bi_istri" id="nomor_bi_istri" class="form-control" placeholder="nomor_bi_istri" required value="<?= $istri['nomor_bi'] ?>">
                    <label for="nomor_bi_istri" class="form-label">Nomor Buku Induk Istri</label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_lengkap_suami" id="nama_lengkap" class="form-control" placeholder="nama_lengkap_suami" required value="<?= $suami['nama_lengkap'] ?>">
                    <label for="nama_lengkap_suami" class="form-label">Nama Lengkap Suami </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_lengkap_istri" id="nama_lengkap_istri" class="form-control" placeholder="nama_lengkap_istri" required value="<?= $istri['nama_lengkap'] ?>">
                    <label for="nama_lengkap_istri" class="form-label">Nama Lengkap Istri </label>
                </div>
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tempat_lahir_suami" id="tempat_lahir_suami" class="form-control" placeholder="tempat_lahir_suami" required value="<?= $suami['tempat_lahir'] ?>">
                    <label for="tempat_lahir_suami" class="form-label">Tempat Lahir Suami </label>
                </div>
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="tempat_lahir_istri" id="tempat_lahir_istri" class="form-control" placeholder="tempat_lahir_istri" required value="<?= $suami['tempat_lahir'] ?>">
                    <label for="tempat_lahir_istri" class="form-label">Tempat Lahir Istri </label>
                </div>      
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="date" name="tgl_lahir_suami" id="tgl_lahir_suami" class="form-control" placeholder="tgl_lahir_suami" required value="<?= $suami['tgl_lahir'] ?>">
                    <label for="tgl_lahir_suami" class="form-label">Tgl Lahir Suami </label>
                </div> 
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="date" name="tgl_lahir_istri" id="tgl_lahir_istri" class="form-control" placeholder="tgl_lahir_istri" required value="<?= $istri['tgl_lahir'] ?>">
                    <label for="tgl_lahir_istri" class="form-label">Tgl Lahir Istri </label>
                </div>  
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ayah_suami" id="nama_ayah_suami" class="form-control" placeholder="nama_ayah_suami" required value="<?= $suami['nama_ayah'] ?>">
                    <label for="nama_ayah_suami" class="form-label">Nama Ayah Suami </label>
                </div> 
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ayah_istri" id="nama_ayah_istri" class="form-control" placeholder="nama_ayah_istri" required value="<?= $istri['nama_ayah'] ?>">
                    <label for="nama_ayah_istri" class="form-label">Nama Ayah Istri </label>
                </div>  
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ibu_suami" id="nama_ibu_suami" class="form-control" placeholder="nama_ibu_suami" required value="<?= $suami['nama_ibu'] ?>">
                    <label for="nama_ibu_suami" class="form-label">Nama Ibu Suami </label>
                </div> 
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="nama_ibu_istri" id="nama_ibu_istri" class="form-control" placeholder="nama_ibu_istri" required value="<?= $istri['nama_ibu'] ?>">
                    <label for="nama_ibu_istri" class="form-label">Nama Ibu Istri </label>
                </div>  
            </div>
            <div class="row g-2 mx-auto w-50">
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="agama_suami" id="agama_suami" class="form-control" placeholder="agama_suami" required>
                    <label for="agama_suami" class="form-label">Agama Suami </label>
                </div> 
                <div class="form-floating mb-3 mx-auto w-50" >
                    <input type="text" name="agama_istri" id="agama_istri" class="form-control" placeholder="agama_istri" required>
                    <label for="agama_istri" class="form-label">Agama Istri </label>
                </div>  
            </div>
            <div class="mx-auto w-50">
                <button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
            </div>
        </form>
            <?php 
                    }
                }
            ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js" integrity="sha512-21mA6bhcbg4AFCkR0UprmyvoUbv4SoG85V6Y92dqjKWTh1U3NxsxQ3BtOezfYLaBClKbs0ZebbyUQpc+tXGQcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

            <!-- Data Tables -->
            <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script> -->
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