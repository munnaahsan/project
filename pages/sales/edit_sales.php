<?php
    if(isset($_POST["update"])){
        // Write Code Tomorrow
    }
?>

<?php
    if(isset($_POST["sls_id"])){
        $sl_id = $_POST["slsId"];

        $query = $con->query("select p.id,p.name,sd.qty,u.uom_name,sd.price,c.cst_name,                        sd.sales_id,spg.shp_name,s.sales_dt
        from product p,sales_details sd,uom u,customer c,shipping spg,sales s where sd.product_id=p.id and sd.uom=u.uom_id
        and s.customer_id=c.cst_id and sd.sales_id=s.id and sd.ship_id=spg.id and sd.sales_id = '$sl_id'");

        $_SESSION["sls"] = array();

        while(list($prd_id,$prd_name,$prd_qty,$prd_uom,$prd_price,$cst_name,$invoice_id,$shipping_name,$sales_dt) = $query->fetch_row()){
                $_SESSION["static_var"]["cst_Name"] = $cst_name;
                $_SESSION["static_var"]["ship_name"] = $shipping_name;
                $_SESSION["static_var"]["sls_dt"] = $sales_dt;
                $_SESSION["static_var"]["invoice_id"] = $invoice_id;

                $_SESSION["sls"][$prd_id]["id"] = $prd_id;
                $_SESSION["sls"][$prd_id]["prdName"] = $prd_name;
                $_SESSION["sls"][$prd_id]["qty"] = $prd_qty;
                $_SESSION["sls"][$prd_id]["uom"] = $prd_uom;
                $_SESSION["sls"][$prd_id]["price"] = $prd_price;

          }
    }

?>
<?php
    if(isset($_POST["btnDelete"])){  // Remove Product Line
        $prd_id = $_POST['prdId'];
        echo $prd_id;
        unset($_SESSION["sls"][$prd_id]);
    }
?>
<section class="content-header">
    <h1>
    Edit-Sales
    <small>Sales info</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="http://localhost/My_Project/home.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="http://localhost/My_Project/home.php?item=manage-sales">Manage Sales</a></li>
    <li class="active">Sales Info</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
                <label for="#">Customer Name</label>
                <input type="text" readonly value="<?php echo $_SESSION["static_var"]["cst_Name"]; ?>" class="form-control">
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="#">Invoice ID</label>
                <input type="text" readonly value="<?php echo $_SESSION["static_var"]["invoice_id"]; ?>" class="form-control">
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="#">Shipping Name</label>
                <input type="text" readonly value="<?php echo $_SESSION["static_var"]["ship_name"]; ?>" class="form-control">
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="#">Sales Date</label>
                <input type="text" readonly value="<?php echo $_SESSION["static_var"]["sls_dt"]; ?>" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Sales Details</h3>
                </div>
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
                      $sl = 1;
                      foreach($_SESSION["sls"] as $slsItem){
                          echo "<tr>
                                 <td>$sl</td>
                                 <td><input type='text' value='$slsItem[prdName]'></td>
                                 <td><input type='text' value='$slsItem[qty]'></td>
                                 <td>$slsItem[uom]</td>
                                 <td><input type='text' value='$slsItem[price]'></td>
                                 <td>$slsItem[qty]*$slsItem[price]</td>
                                 <td>
                                    <form style='display:inline;' method='POST'>
                                        <input  type='text' value='$slsItem[id]' name='prdId'>
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
            </div>
            <div class="box-body">
          <div class="row">
            <div class="col-xs-12">

            <form method='POST'>
            <input type="text" name="hdnValue" value="<?php echo $sl_id; ?>">
              <input type="submit" name="update" class="btn btn-success mr-2" value="Under Construction">
            </form>
 
            </div>
          </div>
        </div>
      </div>
    </div>
</section>