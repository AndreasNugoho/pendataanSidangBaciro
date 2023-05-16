<?php
require 'func/func_jawatan.php';
$id = $_GET['id'];
// $query = "SELECT * FROM data_diri WHERE id_data_diri = '$id' ORDER BY nama_lengkap ASC";
// $result = $conn->query($query);
$jawatan = query("SELECT * FROM data_diri WHERE id_data_diri ='$id'")[0];
if (isset($_POST["submit"])){
    if (tambah($_POST) > 0){
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
                    <a class="navbar-brand" href="index.php">Tambah Data Jawatan</a>
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
        <h4 class="kepala" align="center">INPUT DATA JAWATAN</h4><br>
        <form action="" method="POST">
                        <!-- <div class="row g-2 mx-auto w-50">
                            <div class="form-group mb-3 mx-auto w-50">
                                <label for="id_data_diri" class="form-contol">Pilih Nama</label>
                                <select name="id_data_diri" id="id_data_diri" class="form-control form-control-lg select2">
                                    <?php
                                        foreach($result as $row)
                                        {
                                        echo '<option value="'.$row['id_data_diri'].'">'.$row['id_data_diri'].'&nbsp;  -  &nbsp;'.$row['nama_lengkap'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div> -->
                         
                        <div class="row g-2 mx-auto w-50">
                            <div class="form-floating mb-3 mx-auto w-50" >
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="tanggal_penetapan" required value="<?= $jawatan['nama_lengkap']?>" readonly>
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            </div>
                            <div class="form-floating mb-3 mx-auto w-50" >
                                <input type="date" name="tanggal_penetapan" id="tanggal_penetapan" class="form-control" placeholder="tanggal_penetapan" required>
                                <label for="tanggal_penetapan" class="form-label">Tanggal Penetapan</label>
                            </div>
                        </div>
                        <div class="row g-2 mx-auto w-50">
                            <div class="form-floating mb-3 mx-auto w-50" >
                                <input type="text" name="tempat_penetapan" id="tempat_penetapan" class="form-control"placeholder="tempat_penetapan  " required>
                                <label for="tempat_penetapan" class="form-label">Tempat Penetapan </label>
                            </div>
                            <div class="form-floating mb-3 mx-auto w-50" >
                                <input type="text" name="sebagai_penetapan" id="sebagai_penetapan" class="form-control" placeholder="sebagai_penetapan" required>
                                <label for="sebagai_penetapan" class="form-label">Dalam Jawatan</label>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="form-floating mb-3 mx-auto w-50">
                                &nbsp;&nbsp;<button type="submit" class="btn btn-primary" name="submit">Masukkan Data</button>
                            </div>
                        </div>
        </form>
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
                            
                            

