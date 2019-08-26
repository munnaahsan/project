<?php
  $con = new mysqli("localhost","root","","my_db");
?>
<?php
     if(!isset($_SESSION['sales'])){
        $_SESSION['sales'] = array();
    }
    function remove_item($id){
        if(array_key_exists($id,$_SESSION['sales'])){
            unset($_SESSION['sales'][$id]);
        }
    }
    if(isset($_POST["btnremove"])){
        $hdnValue = $_POST["hdnValue"];
        remove_item($hdnValue);
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
      <h3 class="box-title">Create New Sales</h3>
      <form role="form" action="#" method="post">
        <div class="box-body">
          <div class="row">
            <div class= "col-xs-3">
              <div class="form-group">
                <label for="#">Customer Name</label>
                <select name="cmbCstmr" id="" class="form-control">
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
                <select name="cmbEmail" id="" class="form-control">
                  <?php
                    $query = $con->query("select cst_id,cst_eml from customer");
                    while(list($id,$name) = $query->fetch_row()){
                      echo "<option value='$id'>$name</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group">
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
            </div>
            <div class="col-xs-3">
            <label for="#">Purchase Date</label>
                <div class="row">
                  <div class="col-xs-4">
                    <select class="form-control" name="cmbDay">
                     
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
            <div class="row">
                <div class="col-xs-12">
                  <div clas="form-group">
                    <label for="#">Customer Information/Type</label>
                    <textarea name="cstinfrmt" id="" cols="05" rows="02" class="form-control"></textarea>
                  </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="#">Product Name</label>
                        <select name="cmbprd" id="" class="form-control">
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
                      <input type="text" name="txtQty" class="form-control" placeholder="Include Quantity">
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
                        <input type="text" name="txtPrice" class="form-control" placeholder="Include Price">
                    </div>
                </div>
            </div>
          </div>
        </div>
     
         <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
            <input type="submit" name="add" class="btn btn-primary mr-2" value="Add Sales">
			      <input type="submit" name="reset" class="btn btn-success" value="Reset form">
            </div>
          </div>
        </div>
  
          <table class='table table-hover' border='2' cellspacing='0px' cellpadding='10px'>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>UoM</th>
                <th>Price</th>
                <th>Total Amount</th>
                <th>Remove</th>
            </tr>

            <?php
               

                function getName($id){
                    global $con;
                    $query = $con->query("select name from product where id = '$id'");
                    list($name) = $query->fetch_row();
                    return $name;
                }

                if(isset($_POST["add"])){
                    $id = $_POST["cmbprd"];
                    $prd_name = getName($id);
                    $cstmr_id = $_POST["cmbCstmr"];
                    $eml = $_POST["cmbEmail"];
                    $shp =$_POST["cmbShip"];

                    $day = $_POST["cmbDay"];
                    $month = $_POST["cmbMonth"];
                    $year = $_POST["cmbYear"];
                    $date_str=$year."-".$month."-".$day;	  
                    $sales_date=date("Y-m-d",strtotime($date_str));

                    
                    $qty = $_POST["txtQty"];
                    $uom = $_POST["cmbUom"];
                    $price = $_POST["txtPrice"];
                    $total = $qty*$price;

                    $_SESSION["sales"][$id]["cmbprd"] = $id;
                    $_SESSION["sales"][$id]["prdName"] = $prd_name;
                    $_SESSION["sales"][$id]["email"] = $eml;
                    $_SESSION["sales"][$id]["ship"] = $shp;
                    $_SESSION["sales"][$id]["day"] = $day;
                    $_SESSION["sales"][$id]["month"] = $month;
                    $_SESSION["sales"][$id]["year"] = $year;
                    $_SESSION["sales"][$id]["date"] = $sales_date;
                    $_SESSION["sales"][$id]["qty"] = $qty;
                    $_SESSION["sales"][$id]["uom"] = $uom;
                    $_SESSION["sales"][$id]["price"] = $price;
                    $_SESSION["sales"][$id]["total"] = $total;

                   /* if(array_key_exists($id,$_SESSION['sales'])){
                        $_SESSION['sales'][$id]['qty'] += $qty;
                        $_SESSION['sales'][$id]['total'] = $_SESSION['sales'][$id]['total'] * $price;
        
                      }else{
                        $_SESSION['cart'][$id]['id'] = $id;
                        $_SESSION['cart'][$id]['name'] = $name;
                        $_SESSION['cart'][$id]['qty'] = $qty;
                        $_SESSION['cart'][$id]['uom'] = $uom;
                        $_SESSION['cart'][$id]['price'] = $price;
                        $_SESSION['cart'][$id]['gross'] = $qty*$price;
                      }
                   
                    */                    
                    foreach($_SESSION["sales"] as $item){
                        $sl = 1;
                        echo "<tr>";
                        echo "<td>$sl</td>";
                        echo "<td>$item[prdName]</td>";
                        echo "<td>$item[qty]</td>";
                        echo "<td>$item[uom]</td>";
                        echo "<td>$item[price]</td>";
                        echo "<td>$item[total]</td>";
                        echo "<form method='POST'>
                                <td>
                                    <input type='text' value='$item[cmbprd]'  name='hdnValue'>
                                    <input type='submit' name='btnremove' value='Remove'>
                                </td>
                            </form>";
                        echo "</tr>";
                        $sl++;
                        
                    }
                    echo "<tr>
                            <td colspan='5'>Sum Total</td>
                            <td></td>
                        </tr>";

                }else{
                    foreach($_SESSION["sales"] as $item){
                        $sl = 1;
                        
                        echo "<tr>";
                        echo "<td>$sl</td>";
                        echo "<td>$item[prdName]</td>";
                        echo "<td>$item[qty]</td>";
                        echo "<td>$item[uom]</td>";
                        echo "<td>$item[price]</td>";
                        echo "<td>$item[total]</td>";
                        echo "<form method='POST'>
                                <td>
                                    <input type='text' value='$item[cmbprd]'  name='hdnValue'>
                                    <input type='submit' name='btnremove' value='Remove'>
                                </td>
                            </form>";
                        echo "</tr>";
                        $sl++;
                        
                    }
                    echo "<tr>
                            <td colspan='5'>Sum Total</td>
                            <td></td>
                        </tr>";
                }
            ?>
          </table>
          <div class="box-body">
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" name="save" class="btn btn-primary mr-2" value="Save">
            </div>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
              <div class="form-group">
                <div class="col-xs-4">
                  <label for="#">Discount</label><br>
                  <label for="#">Transport Cost</label><br>
                  <label for="#">Vat</label><br>
                  <label for="#">Additional Fees</label><br>
                  <label for="#">Payment</label><br>
                  <label for="#">Due</label>
                </div>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>