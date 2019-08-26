<?php
   // $con = new mysqli("localhost","root","","my_db");
    if(isset($_POST["hdn_id"])){
    $sls_id = $_POST["txtId"];

    $query = $con->query("select  p.name,sd.qty,u.uom_name,sd.price,c.cst_name,                                                    sd.sales_id,spg.shp_name,s.sales_dt
                          from product p,sales_details sd,uom u,customer c,shipping spg,sales s where sd.product_id=p.id and sd.uom=u.uom_id
                          and s.customer_id=c.cst_id and sd.sales_id=s.id and sd.ship_id=spg.id and sd.sales_id = '$sls_id'");
                      list($prd_name,$prd_qty,$prd_uom,$prd_price,$cst_name,$invoice_id,$shipping_name,$sales_dt) = $query->fetch_row();
    }
  
?>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        View Sales Details
        <small>Sales info</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Sales Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class=row>
      <div class="col-xs-3">
        <div class="form-group">
          <label for="#">Customer Name</label>
          <input type="text"  value="<?php echo $cst_name; ?>" class="form-control">
        </div>
      </div>
      <div class="col-xs-3">
        <div class="form-group">
          <label for="#">Invoice ID</label>
          <input type="text" readonly value="<?php echo $invoice_id; ?>" class="form-control"  name="invoice_id">
          
        </div>
      </div>
      <div class="col-xs-3">
        <div class="form-group">
          <label for="#">Shipping Name</label>
          <input type="text" readonly value="<?php echo $shipping_name; ?>" class="form-control"  name="shp_id">
        </div>
      </div>
      <div class="col-xs-3">
        <div class="form-group">
          <label for="#">Sales Date</label>
          <input type="text" readonly value="<?php echo $sales_dt; ?>" class="form-control"  name="prc_dt">
        </div>
      </div>
    </div>
  <div>
    <div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sales</h3>
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
                </tr>
              </thead>
              <tbody>
                <?php 
                /*
                        $query=$con->query("select p.name,pid.qty,u.uom_name,pid.price,s.name,pid.invoice_id,spg.shp_name,
                        pi.purchase_dt from product p,purchase_invoice_details pid,uom u,suppliers s, shipping spg,purchase_invoice pi 
                        where pid.product_id=p.id and pid.uom=u.uom_id and pi.supplier_id=s.id and pid.invoice_id=pi.id and 
                        pid.ship_id=spg.id and pid.invoice_id='$user_id'");
                      
                      $query = $con->query("select p.name,sd.qty,u.uom_name,sd.price,c.cst_name,sd.sales_id,spg.shp_name,s.sales_dt
                      from product p,sales_details sd,uom u,customer c,shipping spg,sales s where sd.product_id=p.id and sd.uom=u.uom_id
                      and s.customer_id=c.cst_id and sd.sales_id=s.id and sd.ship_id=spg.id and sd.sales_id = '$user_id'");
                      

                      $sl = 1;
                    while(list($prd_name,$prd_qty,$prd_uom,$prd_price,$cst_name,$invoice_id,$shipping_name,$sales_dt) = $query->fetch_row()){
                        echo "<tr>
                                <td>$sl</td>
                                <td>$prd_name</td>
                                <td>$prd_qty</td>
                                <td>$prd_uom</td>
                                <td>$prd_price</td>
                                <td>$prd_qty*$prd_price</td>
                                <td>$cst_name</td>
                                <td>$invoice_id</td>
                                <td>$shipping_name</td>
                                <td>$sales_dt</td>
                            </tr>";
                            $sl++;
                        }
                    
            
                  //  while(list($prd_name,$prd_qty,$prd_uom,$prd_price,$cst_name,$invoice_id,$shipping_name,$sales_dt) = $query->fetch_row()){
                   
                      echo "<tr>
                              <td>$prd_name</td> 
                              <td>$prd_name</td> 
                              <td>$prd_qty</td> 
                              <td>$prd_uom</td>
                              <td>$prd_price</td>
                              <td>$prd_qty*$prd_price</td>
                              
                          </tr>";
                   // }
              */
                 ?> 
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" name="" class="btn btn-success mr-2" value="Print">
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