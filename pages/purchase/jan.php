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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title text-center text-aqua" id="exampleModalLabel">Purchase Invoice Details</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <table style="border: 1px solid #ddd;text-align: middle">
              <div class="modal-body">
                  <tr>
                          <th>Id</th>
                          <th>Product</th>
                          <th>Quantity</th>
                          <th>UoM</th>
                          <th>Price</th>
                          <th>Total</th>-
                          <th>Supplier</th>
                          <th>Invoice</th>
                          <th>Shipping</th>
                          <th>Date</th>
                        
                  </tr>
                  <?php
                      if(isset($_POST["nnn"])){
                          $id = $_POST["id"];
                          $query=$con->query("select p.name,pid.qty,u.uom_name,pid.price,s.name,pid.invoice_id,spg.shp_name,pi.purchase_dt 
                        from product p,purchase_invoice_details pid,uom u,suppliers s, shipping spg,purchase_invoice pi 
                        where pid.product_id=p.id and pid.uom=u.uom_id and pi.supplier_id=s.id and pid.invoice_id=pi.id and pid.ship_id=spg.id and pid.invoice_id='$id'");
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
                        }               
                    ?> 
              </div>
              </table>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
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
                  <th>Supplier Name</th>
                  <th>Purchase Date</th>
                  <th>Purchase  Details</th>                  
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
                          <form action='#'  method='POST'>
                            <input  type='hidden' value='$prc_id' name='id'>
                            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'  name='nnn'>
                             Details
                            </button>
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