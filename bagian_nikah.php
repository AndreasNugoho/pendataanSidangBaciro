<?php


require "func/func_nikah.php";

if(isset($_POST["suami"]) AND isset($_POST["istri"]))
{
	$suami = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $_POST["suami"]);
	$istri = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $_POST["istri"]);


	$data = array(
		':suami'	=>	$suami,
		':istri'	=>	$istri

	);

	$query = "
	SELECT * FROM data_diri 
	WHERE id_data_diri = :suami AND id_data_diri = :istri
	";

	$statement = $conn->prepare($query);

	$statement->execute($data);

	
}

?>
