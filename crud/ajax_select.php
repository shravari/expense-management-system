<?php 
	require_once('config.php');
	// $select = "SELECT "
	$x = 1;
	while($x<=12){
		$select_income = "SELECT SUM(amount), MONTH(income_date) from exp_mng_income where user_id=1  and MONTH(income_date)=$x";
	  	$query = mysqli_query($connect,$select_income);
	  	$res = mysqli_fetch_assoc($query);
	  	$select_expense = "SELECT SUM(amount) from exp_mng_expense where user_id=1  and MONTH(expense_date)=$x";
	   	$query1 = mysqli_query($connect,$select_expense);
	 	$res1 = mysqli_fetch_assoc($query1);
	 	$savings = [];
	 	if ($res['SUM(amount)'] != '') {
	 		$amount = $res['SUM(amount)']-$res1['SUM(amount)'];
	 		$month = date("F", mktime(0, 0, 0, $res['MONTH(income_date)']));
	 		$savings[$month] = $amount;
	 	}
	 	$x++;
	 }
	 echo $save = mysqli_fetch_assoc($savings);
	 echo json_encode($save);
	
 ?>