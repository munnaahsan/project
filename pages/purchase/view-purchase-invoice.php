<?php
    $user_id = $_POST["txtId"];
?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        View Purchase Details
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
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>UoM</th>
                  <th>Price</th>
                  <th>Total</th>
                  <th>Supplier Name</th>
                  <th>Invoice Id</th>
                  <th>Shipping Name</th>
                  <th>Purchase Date</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $query=$con->query("select p.name,pid.qty,u.uom_name,pid.price,s.name,pid.invoice_id,spg.shp_name,pi.purchase_dt 
                    from product p,purchase_invoice_details pid,uom u,suppliers s, shipping spg,purchase_invoice pi 
                    where pid.product_id=p.id and pid.uom=u.uom_id and pi.supplier_id=s.id and pid.invoice_id=pi.id and pid.ship_id=spg.id and pid.invoice_id='$user_id'");
                    $sl = 1;
                    while(list($prd_name,$prd_qty,$prd_uom,$prd_price,$spl_name,$invoice_id,$shipping_name,$purchae_dt) = $query->fetch_row()){
                        echo "<tr>
                                <td>$sl</td>
                                <td>$prd_name</td>
                                <td>$prd_qty</td>
                                <td>$prd_uom</td>
                                <td>$prd_price</td>
                                <td>$prd_qty*$prd_price</td>
                                <td>$spl_name</td>
                                <td>$invoice_id</td>
                                <td>$shipping_name</td>
                                <td>$purchae_dt</td>
                            </tr>";
                            $sl++;
                        }
                 ?> 
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" name="" class="btn btn-success btn-lg mr-2" value="Print">
            </div>
          </div>
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
    