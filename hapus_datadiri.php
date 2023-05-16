<?php
require 'func/func.php';
$nomor_bi = $_GET["id"];
if (hapus($nomor_bi)>0){
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'index.php';
		</script>
	";
}
?>