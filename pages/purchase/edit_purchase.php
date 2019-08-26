<?php
  if(isset($_POST["final_save"])){

    $master_id = $_POST["hdnValue"];
    $con->query("delete from purchase_invoice_details where invoice_id = '$master_id'");

    
    foreach($_SESSION["var"] as $item){
      $id = $item["id"];
      $inv_id = $item["invoice_id"];
      $qty = $item["Qty"];
      $uom = $_SESSION["var_static"]["uomId"];
      $price = $item["price"];
      $shp_id = $_SESSION["var_static"]["shpId"];

      echo $inv_id . ", " . $id . ", " . $qty . ", " . $uom . ", " . $price . ", "  .  $shp_id . "<br>";

       $con->query("insert into purchase_invoice_details(invoice_id,product_id,qty,uom,price,ship_id)values('$inv_id','$id','$qty','$uom','$price','$shp_id')");
       
       
    }
    echo "Successfully Updated";
  }
  
?>


<?php

if (isset($_POST['btnsub'])){
    $prcId = $_POST["prcId"];
    
    $query=$con->query("select p.id, p.name,pid.qty,u.uom_id,u.uom_name,pid.price,s.name,spg.id,spg.shp_name,pi.purchase_dt from product p,purchase_invoice_details pid,uom u,suppliers s, shipping spg,purchase_invoice pi where pid.product_id=p.id and pid.uom=u.uom_id and pi.supplier_id=s.id and pid.invoice_id=pi.id and pid.ship_id=spg.id and pi.id='$prcId'");
    // unset($_SESSION["var"]);
    $_SESSION["var"] = array();
    while(list($id, $prd_name,$prd_qty,$uom_id,$prd_uom,$prd_price,$spl_name,$shp_id,$shipping_name,$purchae_dt) = $query->fetch_row()){

      // echo  "$id, $prd_name,$prd_qty,$prd_uom,$prd_price,$spl_name,$invoice_id,$shipping_name,$purchae_dt";
      // echo "<br>";

      $_SESSION["var"][$id]["id"] = $id;
      $_SESSION["var"][$id]["prdName"] = $prd_name;
      $_SESSION["var"][$id]["Qty"] = $prd_qty;
      $_SESSION["var"][$id]["uom"] = $prd_uom;
      $_SESSION["var"][$id]["price"] = $prd_price;
      $_SESSION["var"][$id]["invoice_id"] = $prcId;

      $_SESSION["var_static"]["uomId"] = $uom_id;
      $_SESSION["var_static"]["splName"] = $spl_name;
      $_SESSION["var_static"]["shpId"] = $shp_id;
      $_SESSION["var_static"]["shp_name"] = $shipping_name;
      $_SESSION["var_static"]["prc_dt"] = $purchae_dt;
      $_SESSION["var_static"]["invc_id"] = $prcId;

    }
    
}

// Remove Product Line
if(isset($_POST["btnDelete"])){
  $prd_id = $_POST["prdId"];
  $prcId = $_POST["prcId"];
  echo $prd_id;
    unset($_SESSION["var"][$prd_id]);
}
?>



<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Edit-Purchase
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
  <div class="box">
  <form action="#" method="POST">
  <div class="row">
    <div class="col-xs-3">
      <div class="form-group">
        <label for="#">Supplier Name</label>
        <input type="text"  value="<?php echo $_SESSION["var_static"]["splName"]; ?>" class="form-control" name="txtId">
      </div>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
        <label for="#">Invoice ID</label>
        <input type="text" readonly value="<?php echo $_SESSION["var_static"]["invc_id"]; ?>" class="form-control"  name="invoice_id">
        
      </div>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
        <label for="#">Shipping Name</label>
        <input type="text" readonly value="<?php echo $_SESSION["var_static"]["shp_name"]; ?>" class="form-control"  name="shp_id">
      </div>
    </div>
    <div class="col-xs-3">
      <div class="form-group">
        <label for="#">Purchase Date</label>
        <input type="text" readonly value="<?php echo $_SESSION["var_static"]["prc_dt"]; ?>" class="form-control"  name="prc_dt">
      </div>
    </div>
    </form>
  </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase Details</h3>
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
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody>
              
         
<?php


// echo "<pre>";
//  print_r ($_SESSION["var"]);
// echo "</pre>";

 $sl = 1;
foreach($_SESSION["var"] as $item){
  echo "<tr>
          <td>$sl</td>
          <td>$item[prdName]</td>
          <td><input type='text' value='$item[Qty]' name=''></td>
          <td>$item[uom]</td>
          <td><input type='text' value='$item[price]' name=''></td>
          <td>$item[price]*$item[Qty]</td>
          <td>
          <form style='display:inline;' method='POST'>
            <input  type='hidden' value='$item[id]' name='prdId'>
            <input  type='hidden' value='$prcId' name='prcId'>
            <button type='submit'  name='btnDelete'  class='btn btn-danger'><i class='fas fa-trash-alt'></i></button>
          </form>
          </td>
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

            <form method='POST'>
              <input type="hidden" name="hdnValue" value="<?php echo $prcId; ?>">
              <input type="submit" name="final_save" class="btn btn-success mr-2" value="Update">
            </form>
 
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
      
      <!-- /.row -->
    </section>
    <!-- /.content -->