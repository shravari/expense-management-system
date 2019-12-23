<?php 

	require_once('config.php');
	$user_id = $_POST['user_id'];
	$dateinc = $_POST['dateinc'];
	$amount = $_POST['amount'];
	$purpose = $_POST['source']; //source of income

	$insert = "INSERT INTO exp_mng_income(user_id, income_date, amount, source) values('$user_id', '$dateinc', '$amount', '$source')";
	mysqli_query($connect, $insert);
	echo "Income added successfully";

 ?>