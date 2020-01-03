<?php 

  session_start();
  if (isset($_SESSION['user_id']) &&  $_SESSION['user_id']!=null) {
  
	require_once('header.php');

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
				<form class="editUser" onsubmit="return validate();">
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
                    <p id="pTag"></p>
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

		var debitDate = $('input[name="dateinc"]').val();
    	var amount = $('input[name="amount"]').val();
    	var description = $('textarea[name="purpose"]').val();

    	if (!debitDate || !amount || !description) {
    		  if(!debitDate){
		        $('input[name="dateinc"]').css('border', '1px solid red');
		      }
		      else{
		        $('input[name="dateinc"]').css('border', 'none');
		      }
		     if(!amount){
		        $('input[name="amount"]').css('border', '1px solid red');
		      }
		      else{
		        $('input[name="amount"]').css('border', 'none');
		      }
		     if(!description){
		        $('textarea[name="purpose"]').css('border', '1px solid red');
		      }
		      else{
		        $('textarea[name="purpose"]').css('border', 'none');
		      }
     		 $('#pTag').html('feilds marked above are mandatory..');
     		 $('#pTag').css('color','red');
		     return false;
    	}
		else{
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
	}
	});

	function validate(){
    	var debitDate = $('input[name="dateinc"]').val();
    	var amount = $('input[name="amount"]').val();
    	var description = $('textarea[name="purpose"]').val();

    	if (!debitDate && !amount && !description) {
    		 if(!debitDate){
		        $('input[name="dateinc"]').css('border', '1px solid red');
		      }
		     if(!amount){
		        $('input[name="amount"]').css('border', '1px solid red');
		      }
		     if(!description){
		        $('textarea[name="purpose"]').css('border', '1px solid red');
		      }
     		 $('#pTag').html('feilds marked above are mandatory..');
     		 $('#pTag').css('color','red');
		     return false;
    	}
    	// return true;

	}
</script>

 <?php 
  }
else{
  header('Location:index.html');
}

  ?>
