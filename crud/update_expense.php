<?php 

	require_once('config.php');
	$id = $_POST['id'];
	$user_id = $_POST['user_id'];
	$dateinc = $_POST['dateinc'];
	$amount = $_POST['amount'];
	$purpose = $_POST['purpose'];

	$update = "UPDATE exp_mng_expense SET expense_date='$dateinc', amount='$amount', purpose='$purpose' where id=$id and user_id='$user_id'";
	mysqli_query($connect, $update);
	header('Location:../viewExpense.php?edit=1')

 ?>