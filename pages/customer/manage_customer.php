<?php

if(isset($_POST["btnDelete"])) {
  echo "<script> alert('Are You Sure ?') </script>";
  $id = $_POST["cstId"];
  if($con->query("delete from customer where cst_id = '$id'")) {
    echo "Deleted";
  }
  
}


?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Manage Customers
        <small>Customers info</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Customers Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Number</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Comments</th>
                  <th>Correction</th>
                </tr>
              </thead>
              <tbody>
                <?php
                 $con = new mysqli("localhost","root","","my_db");
                 $query = $con->query("select cst_id,cst_name,cst_num,cst_eml,cst_adr,cst_com from customer");
                    while(list($cst_id,$cst_name,$cst_num,$cst_eml,$cst_adr,$cst_cmnt) = $query->fetch_row()){
                        echo "<tr>";
                        echo "<td>$cst_id</td>";
                        echo "<td>$cst_name</td>";
                        echo "<td>$cst_num</td>";
                        echo "<td>$cst_eml</td>";
                        echo "<td>$cst_adr</td>";
                        echo "<td>$cst_cmnt</td>";
                        echo "<td>
                            <form style='display:inline;' action='home.php?item=edit-customer' method='POST'>
                              <input  type='hidden' value='$cst_id' name='cstId'>
                              <button class='btn btn-primary'><i class='fas fa-edit'></i> </button>
                            </form>
                            <form style='display:inline;' method='POST'>
                            <input  type='hidden' value='$cst_id' name='cstId'>
                            <button type='submit'  name='btnDelete'  class='btn btn-danger'><i class='fas fa-trash-alt'></i></button>
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