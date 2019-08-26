<?php
    if(isset($_POST["save"])){
        $cst_name = $_POST["cst_name"];
        $cst_num = $_POST["cst_num"];
        $cst_eml = $_POST["cst_eml"];
        $cst_adr = $_POST["cst_adr"];
        $cst_cmt = $_POST["cst_cmt"];

        $con = new mysqli("localhost","root","","my_db");
        $query = $con->query("insert into customer(cst_name,cst_num,cst_eml,cst_adr,cst_com) values('$cst_name','$cst_num','$cst_eml','$cst_adr','$cst_cmt')");
 
        echo "<script> alert('Successfulyy Inserted Data into  Buyers Table'); </script>";
    }
 
?>

<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title"><b>Create New customer</b></h1>
  </div>
<!-- form start -->
  <form role="form" action="#" method="post">
    <div class="box-body">

      <div class="form-group">
        <label for="#">Name  </label>
        <input type="text" name="cst_name" id="cst_name" class="form-control" placeholder="Write Customer Name">
      </div>

      <div class="form-group">
        <label for="#">Number  </label>
        <input type="number" name="cst_num" id="cst_num" placeholder="Write Customer Contact Number" class="form-control">
      </div>

      <div class="form-group">
        <label for="#">Email</label>
        <input type="email" name="cst_eml" id="cst_eml" placeholder="Input Customer Email " class="form-control">
      </div>

      <div class="form-group">
        <label for="#">Address</label>
        <textarea name="cst_adr" id="cst_adr" cols="02" rows="02" class="form-control" placeholder="Write Customer Address"></textarea>
      </div>   

      <div class="form-group">
        <label for="#">Comment</label>
        <textarea name="cst_cmt" id="cst_cmt" cols="02" rows="02" class="form-control"></textarea>

      </div>   
      
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button style="margin-left:910px" type="submit" class="btn btn-primary" value="Save" id="save" name="save">Save</button>
    </div>
  </form>
</div>