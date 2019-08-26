<?php

  if (isset($_POST["save"])){
    $customer_id = $_POST["cmbCustomer"];
    $ship_id = $_POST["cmbship"];
    $email = $_POST["txtEmail"];
    $product = $_POST["cmbProduct"];
    $comment = $_POST["txtNote"];
    $qty = $_POST["txtQty"];
    $uom = $_POST["uom"];
    $price = $_POST["txtPrice"];
    $day = $_POST["cmbDay"];
    $month = $_POST["cmbMonth"];
    $year = $_POST["cmbYear"];
    if(checkdate($month,$day,$year)){
      $date_str=$year."-".$month."-".$day;	  
      $purchase_date=date("Y-m-d",strtotime($date_str));

       $con->query("insert into sales(customer_id,sales_dt)values('$customer_id','$purchase_date')");
       $invoice_id = $con->insert_id;
     
       
      foreach($_SESSION["sales"] as $row){
        $prd_id = $row["id"];
        $qty = $row["qty"];
        $uom = $row["uom"];
        $price = $row["price"];
        
        $con->query("insert into sales_details(sales_id,product_id,qty,uom,price,ship_id)values
        ('$invoice_id','$prd_id','$qty','$uom','$price','$ship_id')");


      }
      unset($_SESSION["sales"]);
      echo "<script>alert('Saved Data')</script>";

      

    }else{
      echo "Somthing Wrong";
    }

  } 

?>
<?php

  if(!isset($_SESSION['sales'])){
    $_SESSION['sales'] = array();
  }
  if(isset($_POST["btnRemove"])){
    $rmv = $_POST["rmvid"];
    remove_itm($rmv);
  }
  function remove_itm($id){
    if(array_key_exists($id,$_SESSION["sales"])){
      unset($_SESSION['sales'][$id]);
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
      <form action="#" role="form" method="POST">
        <div class="box-body">
          <div class="row">
            <div class="col-xs-3">
              <div class="form-group">
                <label for="#">Customer Name</label>
                <select name="cmbCustomer" id="" class="form-control">
                  <?php
                    $query = $con->query("select cst_id,cst_name from customer");
                    while(list($id,$name) = $query->fetch_row()){
                      echo "<option value='$id'>$name</option>";
                    }
                  ?>
                </select>
              </div>

            </div>
            <div class="col-xs-3">
              <div class="form-group">
                <label for="#">Customer Email</label>
                <!--We Can Create Combo Box From Customer Table-->
                <input type="text" name="txtEmail" class="form-control"> 
              </div>
                    
            </div>

            <div class="col-xs-3">
              <div class="form-group">
                <label for="#">Shipping Agency</label>
                  <select name="cmbship" id="" class="form-control">
                    <?php
                      $query = $con->query("select id,shp_name from shipping");
                      while(list($id,$name) = $query->fetch_row()){
                        echo "<option value='$id'>$name</option>";
                      }
                    ?>
                  </select>
                </div>
            </div>
            <div class="col-xs-3">
                <label for="#">Purchase Date</label>
                <div class="row">
                  <div class="col-xs-4">
                    <select class="form-control" name="cmbDay">
                      <?php
                        for($i=1;$i<=31;$i++){
                          if(date("d") == $i){
                            echo "<option selected>$i</option>";
                          }else{
                            echo "<option>$i</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <select class="form-control" name="cmbMonth">
                      <?php
                          $months=array(1=>"Jan",2=>"Feb",3=>"Mar",4=>"Apr",5=>"May",6=>"Jun",7=>"Jul",8=>"Aug",9=>"Sep",10=>"Oct",11=>"Nov",12=>"Dec");
                          foreach($months as $key=>$value){
                           if(date("m")==$key){
                             echo "<option selected value='$key'>$value</option>";
                           }else{
                             echo "<option value='$key'>$value</option>";
                           }
                         }
                      ?>
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <select class="form-control" name="cmbYear" >
                      <?php
                        for($i=date("Y")-5;$i<=date("Y")+50;$i++){
                          
                        if(date("Y")==$i){
                          echo "<option selected value='$i'>$i</option>";
                        }else{
                           echo "<option value='$i'>$i</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                 <label for="#">Comment</label>
                 <textarea name="txtNote" id="" cols="03" rows="03" placeholder="Note About Sales" class="form-control"></textarea>
              </div>
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-3">
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
            <div class="col-xs-2">
              <div class="form-group">
                <label for="#">Quantity</label>
                <input type="text" name="txtQty" class="form-control" placeholder="Quantity">
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label for="#">Unity Of Measure</label>
                <select name="uom" id="" class="form-control">
                  <?php
                    $query = $con->query("select uom_id,uom_name from uom");
                    while(list($id,$name) = $query->fetch_row()){
                      echo "<option value='$id'>$name</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-xs-2">
              <div class="form-group">
                <label for="#">Price</label>
                <input type="number" name="txtPrice" class="form-control" placeholder="$1000">
              </div>
            </div>
          </div>
          <div class="col-xs-3"></div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
            <input type="submit" name="addSales" class="btn btn-primary mr-2" value="Add Sales">
			      <input type="submit" name="reset" class="btn btn-success" value="Reset form">
            </div>
          </div>
        </div>

        <?php
        
          function getName($id){
            global $con;
            $query = $con->query("select name from product where id = '$id' ");
            list($name) = $query->fetch_row();
            return $name;
          }

          if(isset($_POST["addSales"])){
            $id = $_POST["cmbProduct"];
            $name = getName($id);
            $qty = $_POST["txtQty"];
            $uom = $_POST["uom"];
            $price = $_POST["txtPrice"];
            $total = $price * $qty;



            add_item($id,$qty,$name,$price,$uom);
          }

          function add_item($id,$qty,$name,$price,$uom){
            if(array_key_exists($id,$_SESSION['sales'])){
              $_SESSION["sales"][$id]['qty'] += $qty;
              $_SESSION["sales"][$id]['gross'] = $_SESSION["sales"][$id]['qty'] * $price;
            }else{
              $_SESSION["sales"][$id]['id'] = $id;
              $_SESSION['sales'][$id]['name'] = $name;
              $_SESSION['sales'][$id]['qty'] = $qty;
              $_SESSION['sales'][$id]['uom'] = $uom;
              $_SESSION['sales'][$id]['price'] = $price;
              $_SESSION['sales'][$id]['gross'] = $qty*$price;
            }
          }

          function sales_cart(){
            $sl = 1;
            $totalgr = 0;

            echo "<table class='table table-hover' border='2' cellspacing='0px' cellpadding='10px'>";
            echo "<thead class='thead-dark'>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Quantity</th>
                      <th>UoM</th>
                      <th>Price</th>
                      <th>Total Amount</th>
                      <th>Remove</th>
                    </tr>
                  </thead>";

            foreach($_SESSION["sales"] as $item){
              $totalgr+=$item["gross"];
              echo "<tr>";
              echo "<td>$sl</td>";
              echo "<td>$item[name]</td>";
              echo "<td>$item[qty]</td>";
              echo "<td>$item[uom]</td>";
              echo "<td>$item[price]</td>";
              echo "<td>$item[gross]</td>";
              echo "<td><form action='' method='post'>
                          <input type='hidden' name='rmvid' value='$item[id]'>
                          <input type='submit' name='btnRemove' value='Remove' >
                        </form>
                    </td>";
              echo "</tr>";
              
              $sl++;
            } // Finish Foreach

            echo "<tr>
                    <td colspan='5'>Sum Total</td>
                    <td style='background-color: red'>".$totalgr."</td>
                  </tr>";

            echo "</table>";
          } // Finis.......... 
          
          sales_cart();
        
        ?>

        <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
              <input onclick="return confirm('Are you sure?');" type="submit" name="save" class="btn btn-primary mr-2" value="Save">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
