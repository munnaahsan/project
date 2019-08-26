<?php
  if(isset($_POST["dltSupplier"])){
    $sup_id = $_POST["txtsupplier"];

      if($con->query("delete from suppliers where id = '$sup_id'")){
      echo "Supplier Data Deleted";
    }
  }
?>


<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Manage Suppliers
        <small>Suppliers info</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Suppliers Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Suppliers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Supplier Name</th>
                  <th>Contact Number</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Comments</th>
                  <th>Correction</th>
                </tr>
              </thead>
              <tbody>
                <?php
                 $con = new mysqli("localhost","root","","my_db");
                 $query = $con->query("select id,name,contact_no,email,address,comments from suppliers");
                  while(list($sup_id,$sup_name,$sup_num,$sup_eml,$sup_adr,$sup_cmnt) = $query->fetch_row()){
                    echo "<tr>";
                    echo "<td>$sup_id</td>";
                    echo "<td>$sup_name</td>";
                    echo "<td>$sup_num</td>";
                    echo "<td>$sup_eml</td>";
                    echo "<td>$sup_adr</td>"; 
                    echo "<td>$sup_cmnt</td>";
                    echo "<td>
                            <form style='display:inline;' action='home.php?item=edit-supplier' method='POST'>
                              <input  type='hidden' value='$sup_id' name='txtId'>
                              <button class='btn btn-primary'><i class='fas fa-edit'></i> </button>
                            </form>
                            <form style='display:inline' method='POST'>
                            <input type='hidden' name='txtsupplier' value='$sup_id'>
                            <button type='submit' name='dltSupplier' class='btn btn-danger'><i class='fas fa-trash-alt'></i> </button>
                            </form>
                          </td>";

                    echo "</tr>";
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
    