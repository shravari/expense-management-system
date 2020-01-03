<?php 
session_start();
  if (isset($_SESSION['user_id']) &&  $_SESSION['user_id']!=null) {
    require_once('header.php');
    require_once('crud/config.php');
        $user_id = $_SESSION['user_id'];

 ?>
 

 <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Savings</li>
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
                    <th>Month</th>
                    <th>Income</th>
                    <th>Expense</th>
                    <th>Savings</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $x = 1;
                    $i = 1;
  while($x<=12){
  $select_user = "SELECT SUM(amount), MONTH(income_date) from exp_mng_income where user_id=$user_id  and MONTH(income_date)=$x";
  $query = mysqli_query($connect,$select_user);
  $res = mysqli_fetch_assoc($query);
  $select_expense = "SELECT SUM(amount) from exp_mng_expense where user_id=$user_id  and MONTH(expense_date)=$x";
   $query1 = mysqli_query($connect,$select_expense);
  $res1 = mysqli_fetch_assoc($query1);
  if ($res['SUM(amount)'] != '') { ?>
                  <tr>
                    <td><?php echo $i++;  ?></td>
                    <td><?php echo date("F", mktime(0, 0, 0, $res['MONTH(income_date)'], 10)); ?></td>
                    <td><?php echo $res['SUM(amount)']; ?></td>
                    <td><?php echo $res1['SUM(amount)']; ?></td>
                    <td><?php echo $res['SUM(amount)']-$res1['SUM(amount)']; ?></td>
                  </tr>
                 <?php }
                 $x++;
                  }?>
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
     <form method="post" class="editUser" action="crud/update_expense.php">
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
                    <textarea class="w-100 form-control" name="purpose" rows="2"></textarea>
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


 <?php 
  }
else{
  header('Location:index.html');


}

  ?>
