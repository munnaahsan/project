
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        View Suppliers
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
                </tr>
              </thead>
              <tbody>
                <?php
                 $con = new mysqli("localhost","root","","my_db");
                 $query = $con->query("select id,name,contact_no,email,address,comments from suppliers");
                    while(list($id,$sup_name,$sup_num,$sup_eml,$sup_adr,$sup_cmnt) = $query->fetch_row()){
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$sup_name</td>";
                        echo "<td>$sup_num</td>";
                        echo "<td>$sup_eml</td>";
                        echo "<td>$sup_adr</td>";
                        echo "<td>$sup_cmnt</td>";
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
    