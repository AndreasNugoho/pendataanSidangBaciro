<?php
require 'func/func_babtis.php';
$nomor_baptis = $_GET["id"];
if (hapus($nomor_baptis)>0){
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'detail.php?id=$nomor_baptis';
		</script>
	";
} else {
	echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'detail.php?id=$nomor_baptis';
        </script>
	";
}
?>