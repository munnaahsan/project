<?php
  if(isset($_POST["id"])){
  $supId = $_POST["id"];
  }
?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        View Purchase
        <small>Purchase info</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Purchase Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase</h3>
            </div>
          <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
              <div class="col-xs-4">
                <label for="#">Search</label>
                <input type="text" class="form-control" placeholder="Invoice ID">
              </div>
              <div class="col-xs-4">
                <label for="#">Supplier</label>
                <select name="cmbSupplier" id="" class="form-control">
                  <?php
                    $query = $con->query("select id, name from suppliers");
                    while(list($id,$name) = $query->fetch_row()){
                      echo "<option value='$id'>$name</option>";
                    }
                  ?>
                </select>
            </div>
          
          <div class="col-xs-4">
            <label for="#">Date</label>
            <input type="text" class="form-control" placeholder="15-06-1994">
          </div>
        </div>
          <br>
          <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Supplier Name</th>
                  <th>Purchase Date</th>
                  <th>Purchase Details</th>                  
                </tr>
              </thead>
              <tbody>
                <?php

                $query = $con->query("select pi.id, s.name, pi.purchase_dt from suppliers s, purchase_invoice pi where s.id = pi.supplier_id");
                
                while(list($prc_id,$sup_name,$prc_dt) = $query->fetch_row()){
                  echo "<tr>";
                  echo "<td>$prc_id</td>";
                  echo "<td>$sup_name</td>";
                  echo "<td>$prc_dt</td>";
                  echo "<td>
                            <form style='display:inline;' action='home.php?item=view-purchase-invoice' method='POST'>
                              <input  type='hidden' value='$prc_id' name='txtId'>
                              <button class='btn btn-primary'>Details</button>
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
    