<?php
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
 
?>

<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title"><b>Create New Supplier</b></h1>
  </div>
<!-- form start -->
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
        <textarea name="sup_cmt" id="sup_cmt" cols="02" rows="02" class="form-control"></textarea>

      </div>   
      
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button style="margin-left:910px" type="submit" class="btn btn-primary" value="Save" id="save" name="save">Save</button>
    </div>
  </form>
</div>