<?php
/*
  if(isset($_POST["id"])){
  $supId = $_POST["id"];
  }
*/
?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Manage Sales
        <small>Sales info</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/My_Project/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Sales Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <!--  <h3 class="box-title">Sales</h3> -->
            </div>
          <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
              <div class="col-xs-4">
                <label for="#">Search</label>
                <input type="text" class="form-control" placeholder="Customer Name">
              </div>
              
          <div class="col-xs-4"></div>
          <div class="col-xs-4"></div>
        </div>
          <br>
          <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Customer Name</th>
                  <th>Sales Date</th>
                  <th>Correction</th>                  
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = $con->query("select s.id,c.cst_name,s.sales_dt from sales s,customer c where c.cst_id = s.customer_id order BY s.id");  // Order By  Ascendings
                  while(list($sls_id,$cus_name,$sls_dt) = $query->fetch_row()){
                    echo "<tr>";
                    echo "<td>$sls_id</td>";
                    echo "<td>$cus_name</td>";
                    echo "<td>$sls_dt</td>";
                    echo "<td>
                              <form style='display:inline;' action='home.php?item=edit-sales' method='POST'>
                                <input  type='hidden' value='$sls_id' name='slsId'>
                                <button name='sls_id' class='btn btn-primary'>Edit</button>
                              </form>
                        </td>";
                    echo "<tr>"; 
                  }
                ?>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    