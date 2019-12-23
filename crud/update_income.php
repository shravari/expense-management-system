<?php 

	require_once('config.php');
	$id = $_POST['id'];
	$user_id = $_POST['user_id'];
	$dateinc = $_POST['dateinc'];
	$amount = $_POST['amount'];
	$source = $_POST['source'];

	$update = "UPDATE exp_mng_income SET income_date='$dateinc', amount='$amount', source='$source' where id=$id and user_id='$user_id'";
	mysqli_query($connect, $update);
	header('Location:../viewIncome.php?edit=1')

 ?>