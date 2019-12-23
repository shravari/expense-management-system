<?php 

  require_once('config.php');
  $id = $_POST['id'];
  $delete = "DELETE FROM exp_mng_expense where id=$id";
  mysqli_query($connect, $delete);
  echo "Expense deleted successfully!";

 ?>