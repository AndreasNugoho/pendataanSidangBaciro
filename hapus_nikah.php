<?php
require 'func/func_menikah.php';
$nomor_menikah = $_GET["id"];
if (hapus($nomor_menikah)>0){
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'detail.php?id=$nomor_menikah';
		</script>
	";
} else {
	echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'detail.php?id=$nomor_menikah';
        </script>
	";
}
?>