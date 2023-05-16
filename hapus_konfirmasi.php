<?php
require 'func/func_konfirmasi.php';
$nomor_konfirmasi = $_GET["id"];
if (hapus($nomor_konfirmasi)>0){
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'detail.php?id=$nomor_konfirmasi';
		</script>
	";
} else {
	echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'detail.php?id=$nomor_konfirmasi';
        </script>
	";
}
?>