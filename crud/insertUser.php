<?php 

	//Making a connection with database
	require_once('config.php');

	//Storing the data from global array post to individual variable
	$fname = strtoupper($_POST['f_name']);
	$lname = strtoupper($_POST['l_name']);
	$email = $_POST['email'];
	$password = $_POST['password'];

	//checking if the user has entered a profile picture
	if ($_FILES['profile_pic']['name'] == ""){ 
		//if user didn't select a profile picture set file name to an default image
		$file = 'default.png';
		echo $insert = "INSERT INTO exp_mng_users(first_name, last_name, email, password, profile_pic) values('$fname', '$lname', '$email', '$password', '$file')";

	}else{
		// if user did select profile pic set file name accordingly
		$file = Date('ymdhis').$_FILES['profile_pic']['name'];

		// By default the image is saved inside the tmp_name of xampp we move those to the desired folder
		$source = $_FILES['profile_pic']['tmp_name'];
		$destination = '../images/'.$file;
		move_uploaded_file($source, $destination);

		echo $insert = "INSERT INTO exp_mng_users(first_name, last_name, email, password, profile_pic) values('$fname', '$lname', '$email', '$password', '$file')";
	}
	
	//Executing the query using database variable $connect
	mysqli_query($connect , $insert);

	//Redirect to login page
	header('Location:../login.html');
	
 ?>