<?php
require 'func/func_jawatan.php';
$nomor_jawatan = $_GET["id"];
$jawatan = query("SELECT * FROM data_jawatan JOIN data_diri ON data_diri.id_data_diri = data_jawatan.id_data_diri WHERE id_jawatan = '$nomor_jawatan'")[0];
$jaw = $jawatan['id_data_diri'];
if (hapus($nomor_jawatan)>0){
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'detail.php?id=$jaw';
		</script>
	";
} else {
	echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'detail.php?id=$jaw';
        </script>
	";
}
?>
