<?php 

	require_once('config.php');
	$id = $_GET['id'];
	$select = "SELECT * FROM exp_mng_income where id=$id";
	$query = mysqli_query($connect, $select);
	$res = mysqli_fetch_assoc($query);
	echo json_encode($res);

 ?>