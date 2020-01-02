<?php 
session_start();
	require_once('config.php');
	$x = 1;
    $user_id = $_SESSION['user_id'];
	$months = [];
	$amounts = [];
	$current_month = date('m');
	while($x<=12){
		$select_income = "SELECT SUM(amount), MONTH(income_date) from exp_mng_income where user_id=$user_id  and MONTH(income_date)=$x";
	  	$query = mysqli_query($connect,$select_income);
	  	$res = mysqli_fetch_assoc($query);
	  	$select_expense = "SELECT SUM(amount) from exp_mng_expense where user_id=$user_id  and MONTH(expense_date)=$x";
	   	$query1 = mysqli_query($connect,$select_expense);
	 	$res1 = mysqli_fetch_assoc($query1);
	 	
	 	if ($res['SUM(amount)'] != '') {
	 		$amount = $res['SUM(amount)']-$res1['SUM(amount)'];
	 		$months[] = date("F", mktime(0, 0, 0, $res['MONTH(income_date)']));
	 		$amounts[] = $amount;
	 	}
	 	if($current_month==$x){
	 		$income = $res1['SUM(amount)'];
	 	}
	 	$x++;
	 }
	 $data = ['months'=>$months,'amounts'=>$amounts,'CurrentIncome'=>$income];
	 echo json_encode($data);
	
 ?>