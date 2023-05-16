<?php
require 'func/func_kemetraian.php';
$nomor_kemetraian = $_GET["id"];
if (hapus($nomor_kemetraian)>0){
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'detail.php?id=$nomor_kemetraian';
		</script>
	";
} else {
	echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'detail.php?id=$nomor_kemetraian';
        </script>
	";
}
?>
