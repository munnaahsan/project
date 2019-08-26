
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        View Product
        <small>user info</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">User Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Product Category</th>
                  <th>Unit Of Measure</th>
                  <th>Size</th>
                  <th>Grade</th>
                  <th>Color</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $con = new mysqli("localhost","root","","my_db");
                  $query = $con->query("select p.id,p.name,p.price,cat.cat_title,u.uom_name,s.sz_name,g.grd_name,c.clr_name from product p,category cat,uom u,size s,grade g,color c where p.category_id = cat.cat_id and p.uom_id = u.uom_id and p.size_id = s.sz_id and p.grad = g.grd_id and p.color = c.clr_id");
                    while(list($id,$prd_name,$prd_price,$prd_cat,$prd_uom,$prd_size,$prd_grd,$prd_clr) = $query->fetch_row()){
                      echo "<tr>
                              <td>$id</td>
                              <td>$prd_name</td>
                              <td>$prd_price</td>
                              <td>$prd_cat</td>
                              <td>$prd_uom</td>
                              <td>$prd_size</td>
                              <td>$prd_grd</td>
                              <td>$prd_clr</td>
                              
                            </tr>";
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
    