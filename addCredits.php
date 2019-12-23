<?php 

  session_start();
	require_once('header.php');
  if (isset($_SESSION['user_id']) &&  $_SESSION['user_id']!=null) {

 ?>


 <div class="container">
	<div class="row">
		<div class="col-lg-4">
			<img class="img-profile " width="350" height="300" src="images/addIncome.jpg">
		</div>
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					<h3><div class="card-title">Add Income</div></h3>
				</div>
				<form class="editUser">
				<div class="card-body">
					<div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="date" class="w-100 form-control" name="dateinc">
                  </div>
                  <div class="col-sm-6">
                    <input type="number" class="w-100 form-control" name="amount" placeholder="Enter the amount you were paid">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <textarea class="w-100 form-control" name="source" rows="2" placeholder="Enter the source of payment"></textarea>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                  </div>
                </div>

               	<div class="form-group row">
               		<div class="col-sm-12 mb-3 mb-sm-0">
               			 <button type="submit" class="btn btn-primary form-control">Save My Income</button>
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
		var source = $("textarea[name='source']").val();
		var user_id = $("input[name='user_id']").val();

		$.ajax({
			
			url : 'crud/insert_income.php',
			method : 'post',
			data : 'user_id='+user_id+'&& dateinc='+dateinc+'+&& amount='+amount+'&& source='+source,
			success: function(res){
				alert(res);
				window.location.assign('addCredits.php');
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
