<?php 
  session_start();
	require_once('header.php');
  if (isset($_SESSION['user_id']) &&  $_SESSION['user_id']!=null) {
 ?>


 <?php 
  require_once('footer.php');
  }
else{
  echo "login";
  require_once('footer.php');

}
 ?>
