<?php 

  session_start();
	require_once('header.php');
  if (isset($_SESSION['user_id']) &&  $_SESSION['user_id']!=null) {

 ?>


 <div class="container">
	<div class="row">
		<div class="col-lg-4">
			<img class="img-profile " width="350" height="300" src="images/expense.jpg">
		</div>
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					<h3><div class="card-title">Add Expense</div></h3>
				</div>
				<form class="editUser">
				<div class="card-body">
					<div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="date" class="w-100 form-control" name="dateinc">
                  </div>
                  <div class="col-sm-6">
                    <input type="number" class="w-100 form-control" name="amount" placeholder="Enter Expense amount">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <textarea class="w-100 form-control" name="purpose" rows="2" placeholder="Reason for this expenditure.."></textarea>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                  </div>
                </div>

               	<div class="form-group row">
               		<div class="col-sm-12 mb-3 mb-sm-0">
               			 <button type="submit" class="btn btn-primary form-control">Save My Expense</button>
               		</div>
               	</div>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>


 <?php 
  require_once('footer.php');
 ?>

<script type="text/javascript">
	$('form').on('submit', function(e){
		e.preventDefault();
		var dateinc = $("input[name='dateinc']").val();
		var amount = $("input[name='amount']").val();
		var purpose = $("textarea[name='purpose']").val();
		var user_id = $("input[name='user_id']").val();

		$.ajax({
			
			url : 'crud/insert_expense.php',
			method : 'post',
			data : 'user_id='+user_id+'&& dateinc='+dateinc+'+&& amount='+amount+'&& purpose='+purpose,
			success: function(res){
				alert(res);
				window.location.assign('addDebits.php');
			}
		});
	});
</script>

 <?php 
  }
else{
  echo "login";
  require_once('footer.php');

}

  ?>
