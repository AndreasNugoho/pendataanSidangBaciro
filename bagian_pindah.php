<?php


require "func/func_pindah.php";

if(isset($_POST["keluarga"]))
{
	$keluarga = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $_POST["nama_lengkap"]);

	$data = array(
		':keluarga'	=>	$keluarga
	);

	$query = "
	SELECT * FROM data_pindah 
	WHERE keluarga = :keluarga
	";

	$statement = $conn->prepare($query);

	$statement->execute($data);

	if($statement->rowCount() == 0)
	{
		$query = "
		INSERT INTO data_pindah 
		(keluarga) 
		VALUES (:keluarga)
		";

		$statement = $conn->prepare($query);

		$statement->execute($data);

		echo 'yes';
	}
}

?>
