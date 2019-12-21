<?php 	session_start();

	require_once('config.php');
	$email = $_POST['email'];
	$password = $_POST['password'];

	$select = "SELECT * FROM exp_mng_users WHERE email='$email' and  password='$password'";
	$query = mysqli_query($connect, $select);
	$res = mysqli_fetch_assoc($query);

	if (mysqli_num_rows($query)>0) {
		$_SESSION['user_id'] = $res['id'];
		$_SESSION['user_name'] = $res['first_name'];
		$_SESSION['profile_pic'] = $res['profile_pic'];
		header('Location:../dashboard.php');
	}
	else{
		header('Location:../login.html?error=2');
	}

 ?>