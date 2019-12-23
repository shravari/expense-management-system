<?php 
session_start();

require_once('header.php');
require_once('crud/config.php');
  if (isset($_SESSION['user_id']) &&  $_SESSION['user_id']!=null) {
    $user_id = $_SESSION['user_id'];
$select = "SELECT * FROM exp_mng_income where user_id='$user_id'";
$query = mysqli_query($connect, $select);

 ?>
 

 <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Income statement table</li>
        </ol>

  <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Source</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $i = 1;
                   while ($res = mysqli_fetch_assoc($query)) { ?>
                  <tr>
                    <td><?php echo $i++;  ?></td>
                    <td><?php echo $res['income_date']; ?></td>
                    <td><?php echo $res['amount']; ?></td>
                    <td><?php echo $res['source']; ?></td>
                    <td><button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" onclick="edit_income(<?php echo $res['id']; ?>);">Edit</button> / <button class="btn btn-danger" onclick="del_income(<?php echo $res['id']; ?>);">Delete</button></td>
                  </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    <!-- /.content-wrapper -->
    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <form method="post" class="editUser" action="crud/update_income.php">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Income Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
          <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="date" class="w-100 form-control" name="dateinc">
                  </div>
                  <div class="col-sm-6">
                    <input type="number" class="w-100 form-control" name="amount">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <textarea class="w-100 form-control" name="source" rows="2" placeholder="Enter the source of payment"></textarea>
                    <input type="hidden" name="user_id" >
                    <input type="hidden" name="id">

                  </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit Income Entry</button>
      </div>
    </div>
        </form>

  </div>
</div>


 <?php 
  require_once('footer.php');
 ?>


  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap4.min.js"></script>
  <script src="js/datatables-demo.js"></script>
<script type="text/javascript">
  var currentUrl = $(location).attr('href');  
    if (currentUrl.match(/edit=1/g)) {
       alert("Income edited successfully!");
        window.location.assign('viewIncome.php');

    }


  function del_income(income_id){
    var check = confirm("Sure, You want to delete?");
    if (check == true) {
      $.ajax({
        'url' : 'crud/delete_income.php',
        'data' : 'id='+income_id,
        'method' : 'post',
        'success' : function(response){
            alert(response);
            window.location.assign('viewIncome.php');
        }
      });
    } 
  }


  function edit_income(id){
      // alert(id);
      $.ajax({
        url : 'crud/edit_income.php',
        data: 'id='+id,
        method:'get',
        dataType :'json',
        success:function(res){
          $('input[name="dateinc"]').val(res.income_date);
          $('input[name="amount"]').val(res.amount);
          $('textarea[name="source"]').val(res.source);
          $('input[name="id"]').val(res.id);
          $('input[name="user_id"]').val(res.user_id);
        }
      });
    }
</script>



 <?php 
  }
else{
  echo "login";
  require_once('footer.php');

}

  ?>
