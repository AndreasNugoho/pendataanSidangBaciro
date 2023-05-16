<?php
require 'func/func_pindah.php';
$nomor_pindah = $_GET["id"];
if (hapus($nomor_pindah)>0){
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'detail.php?id=$nomor_pindah';
		</script>
	";
} else {
	echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'detail.php?id=$nomor_pindah';
        </script>
	";
}
?>