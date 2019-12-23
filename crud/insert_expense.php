<?php 

	require_once('config.php');
	$user_id = $_POST['user_id'];
	$dateinc = $_POST['dateinc'];
	$amount = $_POST['amount'];
	$purpose = $_POST['purpose']; //source of income

	$insert = "INSERT INTO exp_mng_expense(user_id, expense_date, amount, purpose) values('$user_id', '$dateinc', '$amount', '$purpose')";
	mysqli_query($connect, $insert);
	echo "Expenditure added successfully";

 ?>