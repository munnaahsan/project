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
        Purchase Return
        <small>Purchase Return info</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Purchase Return Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase Return</h3>
            </div>
          <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
              <div class="col-xs-4">
                <label for="#">Search</label>
                <input type="text" class="form-control" placeholder="Vandor Name / Invoice ID">
              </div>
              <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-6">
                    <label for="#">&nbsp;</label>
                    <button class='btn btn-primary form-control'>Result</button>
                  </div>
                  <div class="col-xs-6"></div>
                </div>
              </div>
              <div class="col-xs-4"></div>
        </div>
          <br>
          <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Supplier Name</th>
                  <th>Purchase Date</th>
                  <th>Return Product</th>                  
                </tr>
              </thead>
              <tbody>
                <?php

                $query = $con->query("select pi.id, s.name, pi.purchase_dt from suppliers s, purchase_invoice pi where s.id = pi.supplier_id");
                
                while(list($id,$sup_name,$prc_dt) = $query->fetch_row()){
                  echo "<tr>";
                  echo "<td>$id</td>";
                  echo "<td>$sup_name</td>";
                  echo "<td>$prc_dt</td>";
                  echo "<td>
                            <form style='display:inline;' action='home.php?item=manage-purchase-rtn' method='POST'>
                              <input  type='hidden' value='$id' name='txtId'>
                              <button name='btnValue' class='btn btn-primary'>Return</button>
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
    