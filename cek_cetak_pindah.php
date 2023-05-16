<?php
require 'func/func_pindah.php';
$query = "SELECT * FROM data_pindah ORDER BY keluarga ASC";
$result = $conn->query($query);
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
    <h4 class="kepala" align="center">CEK DATA SURAT PINDAH</h4><br>
            <form action="" method="POST">
                        <div class="row g-2 mx-auto w-50">
                            <div class="form-group mb-3 mx-auto w-50">
                                <label for="keluarga" class="form-label">Pilih nama keluarga</label>
                                <select name="keluarga" id="keluarga" class="form-control form-control-lg select2">
                                    <?php
                                        foreach($result as $row)
                                        {
                                        echo '<option value="'.$row['keluarga'].'">'.$row['keluarga'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 mx-auto w-50">
                            <div class="form-floating mb-3 mx-auto w-50">
                                <button type="submit" class="btn btn-primary" name="ok" id="ok">tampilkan data</button>
                            </div>
                        </div>
            </form>
            <?php
            if(!empty($_POST['keluarga'])){?>
            
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive-sm table-hover text-center" style="width:100%" >
                    <thead class="table-dark">
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Sidang Asal</th>
                        <th>Distrik Asal</th>
                        <th>Sidang Tujuan</th>
                        <th>Distrik Pindah</th>
                        <th>Keluarga</th> 
                        <th>Tanggal Pindah</th> 
                        <th>Kategori</th> 
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $keluarga = $_POST['keluarga'];?> 
                        <form action="cetak_pindah.php?kel=<?= $keluarga ?>" method="POST">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM data_pindah JOIN data_diri on data_diri.id_data_diri = data_pindah.id_data_diri WHERE keluarga = '$keluarga'");                        
                        foreach($query as $row):
                        ?>                      
                        <tr>
                            <td><?php echo $row['nama_lengkap'];?></td>
                            <td><?php echo $row['sidang'];?></td>
                            <td><?php echo $row['distrik_asal'];?></td>
                            <td><?php echo $row['sidang_tujuan'];?></td>
                            <td><?php echo $row['distrik_pindah'];?></td>
                            <td><?php echo $row['keluarga'];?></td>
                            <td><?php echo $row['tgl_pindah'];?></td>
                            <td><?php echo $row['kategori'];?></td>
                            
                        </tr>
                        
                        <?php endforeach;?>
                        </table>
                        <div class="row g-3 mx-auto w-50">
                            <input type="hidden" name="keluarga" value="<?php $keluarga ?>">
                            <div class="form-floating mb-3 mx-auto w-50" >
                                <input type="text" name="kepercayaan" id="kepercayaan" class="form-control"placeholder="kepercayaan" required>
                                <label for="kepercayaan" class="form-label">Keadaan Kepercayaan </label>
                            </div>
                            <div class="form-floating mb-3 mx-auto w-50" >
                                <input type="text" name="kehadiran" id="kehadiran" class="form-control"placeholder="kehadiran" required>
                                <label for="kehadiran" class="form-label">Kehadiran Dalam Kebaktian </label>
                            </div>
                        </div>
                        <div class="row g-3 mx-auto w-50">
                            <div class="form-floating mb-3 mx-auto w-50" >
                                <input type="text" name="perhatian" id="perhatian" class="form-control"placeholder="perhatian" required>
                                <label for="perhatian" class="form-label">Yang Perlu Di Perhatikan </label>
                            </div>
                            <div class="form-floating mb-3 mx-auto w-50" >
                                <input type="text" name="catatan" id="catatan" class="form-control"placeholder="catatan" required>
                                <label for="catatan" class="form-label">Catatan </label>
                            </div>
                        </div>
                        <div class="row g-3 mx-auto w-50">
                            <div class="form-floating mb-3 mx-auto w-50" >
                                <input type="date" name="tgl" id="tgl" class="form-control"placeholder="tgl" required>
                                <label for="tgl" class="form-label">Tanggal </label>
                            </div>
                            <div class="form-floating mb-3 mx-auto w-50" >
                                <input type="text" name="sdg_baciro" id="sdg_baciro" class="form-control"placeholder="sdg_baciro" required>
                                <label for="sdg_baciro" class="form-label">Ketua Sidang Baciro </label>
                            </div>
                        </div>
                        <div class="row g-3 mx-auto w-50">
                            <div class="form-floating mb-3 mx-auto w-50" >
                                <input type="text" name="distrik_yk" id="distrik_yk" class="form-control"placeholder="distrik_yk" required>
                                <label for="distrik_yk" class="form-label">Ketua Sub Distrik Yogyakarta Barat </label>
                            </div>
                            <div class="form-floating mb-3 mx-auto w-50">
                                <button type="submit" class="btn btn-primary" name="submit" id="submit">Cetak</button>
                            </div>
                        </div>
                        
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
                        url:"bagian_pindah.php",
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

    </form>
    
</body>
</html>