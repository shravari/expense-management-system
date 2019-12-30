<?php 

	require_once('config.php');
	// $select = "SELECT min(income_date) from exp_mng_income where user_id=1";
	// // echo $income = "SELECT sum(amount) from exp_mng_income where user_id = 1";
	// echo "<br>";
	// $query = mysqli_query($connect, $select);
	// print_r( $res = mysqli_fetch_assoc($query));
	// echo "<br>";
	// echo 'res min val: '.strtotime($res['min(income_date)']);
	// echo "<br>";
	// echo $d = date('m',strtotime($res['min(income_date)']));
	// echo "<br>";
	// $dat = $res['min(income_date)'];
	// echo $select1 = "SELECT * from exp_mng_income where MONTH(income_date)=11";
	// $query1 = mysqli_query($connect, $select1);
	// print_r($res = mysqli_fetch_assoc($query1))
	// echo "<br>";
	// echo $income1 = "SELECT sum(amount) from exp_mng_expense where user_id = 1";
	// echo "<br>";
	// $query1 = mysqli_query($connect, $income1);
	// print_r( $res1 = mysqli_fetch_assoc($query1));
	// echo "<br>";
	// echo $savings = $res['sum(amount)'] - $res1['sum(amount)'];

// 	$select = "SELECT min(income_date), max(income_date) from exp_mng_income where user_id=1";
// 	$query = mysqli_query($connect,$select);
// 	print_r($res = mysqli_fetch_assoc($query));
// 	echo "<br>";
// 	echo date_create(date_create("2013"), 'y');
// 	echo "<br>";
// 	echo strtotime('y','2000');
// // echo "string".$res['max(income_date)']>2000;
// print_r('income: '.$res['max(income_date)']<$res['max(income_date)']);
// echo "<br>";
	// $find = "SELECT MIN(income_date) "
	$x = 1;
	while($x<=12){
	$select_user = "SELECT SUM(amount), MONTH(income_date) from exp_mng_income where user_id=1 and MONTH(income_date)=$x";
	$query = mysqli_query($connect,$select_user);
	$res = mysqli_fetch_assoc($query);
	// echo (mysqli_num_rows($query)== null);
	if ($res['SUM(amount)'] != '') {
		print_r(date("F", mktime(0, 0, 0, $res['MONTH(income_date)'])).' : ' .$res['SUM(amount)']); 
		echo "<br>";
	}
	
	$x++;
	}

	echo $date = date('Y',mktime(0,0,0,1,1,2019));
 ?>