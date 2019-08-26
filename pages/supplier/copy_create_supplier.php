<?php 
 // session_start();
 require_once("lib.php");
?>
<?php
  
  if(isset($_POST["btnSave"])){
	  
	  $supplier_id=  $_POST["cmbSupplier"];
	  $day=$_POST["cmbDay"];
	  $month=$_POST["cmbMonth"];
	  
	  $year=$_POST["cmbYear"];
	  
	   if(checkdate($month,$day,$year)){
		   
		 $date_str=$year."-".$month."-".$day;	  
	   $purchase_date=date("Y-m-d",strtotime($date_str));
	  
	     
		 $con->query("insert into purchase_invoice(supplier_id,purchase_dt)value('$supplier_id','$purchase_date')");
		 
		 
		 foreach($_SESSION["cart"] as $row){
	  
	    $item_id=$row["id"];
		  $qty=$row["qty"];
		  $uom=$row["uom"];
		  $price=$row["price"];
		  $invoice_id=$db->insert_id;
	    $con->query("insert into purchase_invoice_details(invoice_id,product_id,qty,uom,price)value('$invoice_id','$item_id','$qty','$uom','$price')");
	   }
        unset($_SESSION["cart"]);
	      echo "Saved";
	  }else{
		  echo "Invalid Date";
	  }
  }
?>
<div class="box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Create Supplier</h3>
      <form action="#" role="form" method="POST">
        <div class="box-body">
          <div class="row">
            <div class="col-xs-3">
              <div class="form-group">
                <label for="#">Supplier Name</label>
                <select class="form-control" name="cmbSupplier" id="#">
                  <?php
                   // $con = new mysqli("localhost","root","","my_db");
                    $query = $con->query("select id,name from suppliers");
                    while(list($id,$sup_name) = $query->fetch_row()){
                      echo "<option value='$id'>$sup_name</option>";
                    }

                  ?>
                </select>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group">
                <label for="#">Supplier Contact Number</label>
                <select class="form-control" name="splNum" id="#">
                  <?php
                   // $con = new mysqli("localhost","root","","my_db");
                    $query = $con->query("select id,contact_no from suppliers");
                    while(list($id,$sup_num) = $query->fetch_row()){
                      echo "<option value='$id'>$sup_num</option>";
                    }

                  ?>
                </select>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group">
                <label for="#">Supplier Email</label>
                <select class="form-control" name="splEml" id="#">
                  <?php
                   // $con = new mysqli("localhost","root","","my_db");
                    $query = $con->query("select id,email from suppliers");
                    while(list($id,$sup_eml) = $query->fetch_row()){
                      echo "<option value='$id'>$sup_eml</option>";
                    }

                  ?>
                </select>
              </div>
            </div>
            <div class="col-xs-3">
              <label for="#">Purchase Date</label>
                    <div class="row">
                    
                      <div class="col-xs-4">
                        
                        <div class="form-group">
                        <span><b>Day</b></span>
                          <select name="cmbDay">
                            <option>DD</option>
                            <?php
                                for($i=1;$i<=31;$i++){
                                
                                if(date("d")==$i){
                                  echo "<option selected>$i</option>";
                                }else{
                                  echo "<option>$i</option>";
                                }
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="form-group">
                        <span><b>Month</b></span>
                          <select name="cmbMonth">
                            <option>MM</option>
                              <?php
                                  
                                $months=array(1=>"Jan",2=>"Feb",3=>"Mar",4=>"Apr",5=>"May",6=>"Jun",7=>"Jul",8=>"Aug",9=>"Sep",10=>"Oct",11=>"Nov",12=>"Dec");
                                foreach($months as $key=>$value){
                                  if(date("m")==$key){
                                    echo "<option value='$key' selected>$value</option>";
                                  }else{
                                    echo "<option value='$key'>$value</option>";
                                  }
                                }
                              ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="form-group">
                        <span><b>Year</b></span>
                          <select name="cmbYear">
                            <option>YY</option>
                              <?php
                                for($i=date("Y")-5;$i<=date("Y")+5;$i++){
                                
                                if(date("Y")==$i){
                                  echo "<option selected>$i</option>";
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
        </div>
        <div class="box-body">			
          <div class="row">
            <div class="col-xs-3">
              <div class="form-group">
                <label for="#">Product</label>
                  <select class="form-control" name="cmbProduct" id="#">
                    <?php
                      // $con = new mysqli("localhost","root","","my_db");
                      $query = $con->query("select id,name from product");
                      while(list($id,$prd_name) = $query->fetch_row()){
                        echo "<option value='$id'>$prd_name</option>";
                      }

                    ?>
                  </select>
              </div>
            </div>
            <div class="col-xs-3">
              <label>Quantity</label>
              <input type="text" name="txtQty" class="form-control" placeholder="Product Quantity">
            </div>
            <div class="col-xs-3">
              <div class="form-group">
                <label for="#">Unity Of Measure</label>
                  <select class="form-control" name="cmbUom" id="">
                    <?php
                      $query = $con->query("select uom_id, uom_name from uom");
                      while(list($id,$uom_name) = $query->fetch_row()){
                        echo "<option vlaue='$id'>$uom_name</option>";
                      }
                    ?>
                  </select>
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group">
                <label>Price</label>
                <input type="number" name="txtPrice" class="form-control" placeholder="Product Price">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button style="margin-left:940px" type="submit" class="btn btn-primary" value="Save" id="save" name="btnAdd">Add</button>
          </div>
        </div>
        </div>
      </form>
  </div>
</div>

<?php
function getname($id){
	global $con;
	
	$row=$con->query("select name from product where id='$id'");
	list($name)=$row->fetch_row();
	

	return $name;
}

	
	if(!isset($_SESSION['cart'])){
   		$_SESSION['cart'] = array();
	}
			
	if(isset($_POST['btnAdd'])){
			
			 $id=$_POST["cmbProduct"];
       $product_name=getname($id);
       $qty=$_POST["txtQty"];
       $uom=$_POST["cmbUom"];
			 $price=$_POST["txtPrice"];
			
			 
			 $total=$price*$qty;
					 
		  		 
		add_item($id,$qty,$product_name,$price,$uom);
	}
	
	
	if(isset($_POST['btnRemove'])){
				$rid=$_POST['rid'];
				remove_item($rid);
		
	}
	
			
	 print_cart();		 
			
 
?>


















<?php
/*
    if(isset($_POST["save"])){
        $sup_name = $_POST["sup_name"];
        $sup_num = $_POST["sup_num"];
        $sup_eml = $_POST["sup_eml"];
        $sup_adr = $_POST["sup_adr"];
        $sup_cmt = $_POST["sup_cmt"];

        $con = new mysqli("localhost","root","","my_db");
        $query = $con->query("insert into suppliers(name,contact_no,email,address,comments) values('$sup_name','$sup_num','$sup_eml','$sup_adr','$sup_cmt')");
 
        echo "<script> alert('Successfulyy Inserted Data into Suppliears Table'); </script>";
    }
 */
?>
<!--

<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title"><b>Create New Supplier</b></h1>
  </div>

-->
<!-- form start -->
<!--
  <form role="form" action="#" method="post">
    <div class="box-body">

      <div class="form-group">
        <label for="#">Supplier Name  </label>
        <input type="text" name="sup_name" id="sup_name" class="form-control" placeholder="Write Supplier Name">
      </div>

      <div class="form-group">
        <label for="#">Supplier Contact Number  </label>
        <input type="number" name="sup_num" id="sup_num" placeholder="Write Supplier Contact Number" class="form-control">
      </div>

      <div class="form-group">
        <label for="#">Supplier Email</label>
        <input type="email" name="sup_eml" id="sup_eml" placeholder="Input Supplier Email " class="form-control">
      </div>

      <div class="form-group">
        <label for="#">Supplier Address</label>
        <textarea name="sup_adr" id="sup_adr" cols="02" rows="02" class="form-control" placeholder="Write Supplier Address"></textarea>
      </div>   

      <div class="form-group">
        <label for="#">Comment About Supplier</label>
        <textarea name="sup_cmt" id="sup_cmt" cols="02" rows="02" class="form-control" placeholder="What Kind of Supplier / Details About Supplier"></textarea>

      </div>   
      
    </div>


  -->  


    <!-- /.box-body -->
<!--
    <div class="box-footer">
      <button style="margin-left:910px" type="submit" class="btn btn-primary" value="Save" id="save" name="save">Save</button>
    </div>
  </form>
</div>

-->
