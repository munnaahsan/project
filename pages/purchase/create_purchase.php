<?php
  $con = new mysqli("localhost","root","","my_db");
?>
<?php
  if(isset($_POST["save"])){
    $supplier_id = $_POST["cmbSupplier"];
    $ship_id = $_POST["cmbShip"];
    $month = $_POST["cmbMonth"];
    $day = $_POST["cmbDay"];
    $year = $_POST["cmbYear"];

    if(checkdate($month,$day,$year)){
      $date_str=$year."-".$month."-".$day;	  
      $purchase_date=date("Y-m-d",strtotime($date_str));

      $con->query("insert into purchase_invoice(supplier_id,purchase_dt)values('$supplier_id','$purchase_date')");
      $invoice_id = $con->insert_id;

      foreach($_SESSION["cart"] as $row){
        $prd_id = $row["id"];
        $qty = $row["qty"];
        $uom = $row["uom"];
        $price = $row["price"];

        $con->query("insert into purchase_invoice_details(invoice_id,product_id,qty,uom,price,ship_id)values('$invoice_id','$prd_id','$qty','$uom','$price','$ship_id')");
        
      }
      unset($_SESSION["cart"]);
      echo "Saved Data";
      
    }else{
      echo "Something Wrong";
    }
  }
?>

<?php


  if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
  }

  if(isset($_POST["btnRemove"])){
    $rmv = $_POST["rmvid"];
    remove_itm($rmv);
  }
  function remove_itm($id){
    if(array_key_exists($id,$_SESSION["cart"])){
      unset($_SESSION['cart'][$id]);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div class="box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Create New Purchase</h3>
      <form role="form" action="#" method="post">
        <div class="box-body">
          <div class="row">
            <div class= "col-xs-3">
              <div class="form-group">
                <label for="#">Product Name</label>
                <select name="cmbProduct" id="" class="form-control">
                  <?php
                    $query = $con->query("select id,name from product");
                    while(list($id,$name) = $query->fetch_row()){
                      echo "<option value='$id'>$name</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group">
                <label for="#">Quantity</label>
                <input type="text" name="txtQty" class="form-control" placeholder="Quantity">
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group">
                <label for="#">Unity Of Measure</label>
                <select name="cmbUom" id="" class="form-control">
                    <?php
                      $query = $con->query("select uom_id,uom_name from uom");
                      while(list($id,$name) = $query->fetch_row()){
                        echo "<option value='$id'>$name</option>";
                      }
                    ?>
                </select>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group">
                <label for="#">Price</label>
                <input type="text" name="txtPrice" class="form-control" placeholder="Price">
              </div>
            </div>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
            <input type="submit" name="add" class="btn btn-primary mr-2" value="Add Purchase">
			      <input type="submit" name="reset" class="btn btn-success" value="Reset form">
            <!-- <span class="text-danger float-right h4">20 in stock</span> -->
            </div>
          </div>
        </div>


        <?php
            function getName($id){
              global $con;
              $query = $con->query("select name from product where id = '$id'");
              list($name) = $query->fetch_row();
              return $name;
            }

            if(isset($_POST["add"])){
              $id = $_POST["cmbProduct"];
              $name = getName($id);
              $qty = $_POST["txtQty"];
              $uom = $_POST["cmbUom"];
              $price = $_POST["txtPrice"];
              $total = $qty*$price;

            add_item($id,$qty,$name,$price,$uom);
            }
           

            function add_item($id,$qty,$name,$price,$uom){

              if(array_key_exists($id,$_SESSION['cart'])){
                $_SESSION['cart'][$id]['qty'] += $qty;
                $_SESSION['cart'][$id]['gross'] = $_SESSION['cart'][$id]['qty'] * $price;

              }else{
                $_SESSION['cart'][$id]['id'] = $id;
                $_SESSION['cart'][$id]['name'] = $name;
                $_SESSION['cart'][$id]['qty'] = $qty;
                $_SESSION['cart'][$id]['uom'] = $uom;
                $_SESSION['cart'][$id]['price'] = $price;
                $_SESSION['cart'][$id]['gross'] = $qty*$price;
              }
            }

            function price_cart(){
              $sl = 1;
              $totalgr = 0;
  
              echo "<table class='table table-hover' border='2' cellspacing='0px' cellpadding='10px'>";
              echo "<thead class='thead-dark'><tr><th>ID</th><th>Name</th><th>Quantity</th><th>UoM</th><th>Price</th><th>Total Amount</th><th>Remove</th></tr></thead>";
  
              foreach($_SESSION["cart"] as $item){
                  $totalgr+=$item['gross'];
                  echo "<tr>";
                  echo "<td>$sl</td>";
                  echo "<td>$item[name]</td>";
                  echo "<td>$item[qty]</td>";
                  echo "<td>$item[uom]</td>";
                  echo "<td>$item[price]</td>";
                  echo "<td>$item[gross]</td>";
                  echo "<td><form action='' method='post'>
                  <input type='hidden' name='rmvid' value='$item[id]'>
                  <input type='submit' name='btnRemove' value='Remove'>
              </form>
            </td>";
                  echo "</tr>";
  
                  $sl++;
              } // End foreach
              echo "<tr>
                  <td colspan='5'>Sum Total</td>
                  <td style='background-color:lightgray'>".$totalgr."</td>
              </tr>";
  
              echo "</table>";
          }
          price_cart();

          ?>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-3">
              <label for="#">Supplier Name</label>
              <select name="cmbSupplier" id="" class="form-control">
                <?php
                  $query = $con->query("select id, name from suppliers");
                  while(list($id,$name) = $query->fetch_row()){
                    echo "<option value='$id'>$name</option>";
                  }
                ?>
              </select>
            </div>
            <div class="col-xs-3">
                <label for="#">Supplier Email</label>
                <select name="splEml" id="" class="form-control">
                  <?php
                    $query = $con->query("select id,email from suppliers");
                    while(list($id,$eml) = $query->fetch_row()){
                      echo "<option value='$id'>$eml</option>";
                    }
                  ?>
                </select>
            </div>
            <div class="col-xs-3">
              <label for="#">Shipping Company</label>
              <select name="cmbShip" id="" class="form-control">
                <?php
                  $query = $con->query("select id,shp_name from shipping");
                  while(list($id,$name) = $query->fetch_row()){
                    echo "<option value='$id'>$name</option>";
                  }
                ?>
              </select>
            </div>
            <div class="col-xs-3">
                <label for="#">Purchase Date</label>
                <div class="row">
                  <div class="col-xs-4">
                    <select class="form-control" name="cmbDay">
                      <option>Day</option>
                      <?php
                          for($i=1;$i<=31;$i++){
                          
                          if(date("d")==$i){
                            echo "<option>$i</option>";
                          }else{
                            echo "<option>$i</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <select class="form-control" name="cmbMonth">
                      <option>Month</option>
                      <?php
                          $months=array(1=>"Jan",2=>"Feb",3=>"Mar",4=>"Apr",5=>"May",6=>"Jun",7=>"Jul",8=>"Aug",9=>"Sep",10=>"Oct",11=>"Nov",12=>"Dec");
                          foreach($months as $key=>$value){
                           if(date("m")==$key){
                             echo "<option value='$key'>$value</option>";
                           }else{
                             echo "<option value='$key'>$value</option>";
                           }
                         }
                      ?>
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <select class="form-control" name="cmbYear" >
                      <option>Year</option>
                      <?php
                        for($i=date("Y")-5;$i<=date("Y")+5;$i++){
                          
                        if(date("Y")==$i){
                          echo "<option>$i</option>";
                        }else{
                           echo "<option>$i</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
            </div>

          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" name="save" class="btn btn-primary mr-2" value="Save">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div>
 </div>
</body>
</html>