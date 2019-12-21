<?php 

		session_start();
	// session_destroy(); //destroys all the session
	unset($_SESSION['user_id']); //this removes that particular user
	unset($_SESSION['name']); //used when multiple tab or window has different user
	// print_r($_SESSION);
	header('Location:../index.html');

 ?>