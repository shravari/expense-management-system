<?php 
  session_start();
  if (isset($_SESSION['user_id']) &&  $_SESSION['user_id']!=null) {
	require_once('header.php');
  	require_once('crud/config.php');
  	$id = $_SESSION['user_id'];
  	$select = "SELECT * FROM exp_mng_users where id=$id";
  	$query = mysqli_query($connect, $select);
  	$res = mysqli_fetch_assoc($query);
  	// print_r($res);
 ?>

<div class="container">
	<div class="row">
		<div class="col-lg-3">
			<img class="img-profile rounded-circle profile_pic" src="images/<?php echo $_SESSION['profile_pic'] ?>">
		</div>
		<div class="col-lg-9">
			<div class="card">
				<div class="card-header">
					<h3><div class="card-title">User-Info</div></h3>
				</div>
				<form class="editUser">
				<div class="card-body">
					<div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="w-100 form-control" id="exampleFirstName" name="f_name" value="<?php echo $res['first_name']; ?>">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="w-100 form-control" id="exampleLastName" name="l_name" value="<?php echo $res['last_name']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="w-100 form-control" name="email" value="<?php echo $res['email']; ?>">
                    <input type="hidden" name="id" value="<?php echo $res['id']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="password" class="w-100 form-control" name="password" placeholder="Enter new password">
                  </div>
                </div>

               	<div class="form-group row">
               		<div class="col-sm-12 mb-3 mb-sm-0">
               			 <button type="submit" class="btn btn-primary form-control">Save New Info</button>
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
		var fname = $("input[name='f_name']").val();
		var lname = $("input[name='l_name']").val();
		var email = $("input[name='email']").val();
		var password = $("input[name='password']").val();
		var id = $("input[name='id']").val();

		$.ajax({
			
			url : 'crud/update_user.php',
			method : 'post',
			data : 'id='+id+'&& f_name='+fname+'+&& l_name='+lname+'&& email='+email+'&& password='+password,
      datatype : 'json',
			success: function(res){
				// alert(res);
        console.log(res);
			}
		});
	});
</script>

 <?php 
  }
else{
  header('Location:index.html');

}

  ?>
