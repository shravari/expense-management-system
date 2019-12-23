<?php 

	require_once('config.php');
	print_r($_POST);
	// die;
	$id = $_POST['id'];
	$fname = $_POST['f_name'];
	$lname = $_POST['l_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$update = "UPDATE exp_mng_users SET first_name = '$fname' ,last_name = '$lname', email='$email', password = '$password' WHERE id=$id";
	mysqli_query($connect, $update);
	echo "Your information is successfully updated!";
 ?>