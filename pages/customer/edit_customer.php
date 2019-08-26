<?php
    $cst_id = $_POST["cstId"]; 
    $query=$con->query("select cst_id,cst_name,cst_num,cst_eml,cst_adr,cst_com from customer where cst_id='$cst_id'");
    list($cst_id,$cst_name,$cst_num,$cst_eml,$cst_adr,$cst_com)=$query->fetch_row();
	
    if(isset($_POST["save"])){
        $cst_id = $_POST["cstId"];
        $cst_name = $_POST["cst_name"];
        $cst_num = $_POST["cst_num"];
        $cst_eml = $_POST["cst_eml"];
        $cst_adr = $_POST["cst_adr"];
        $cst_com = $_POST["cst_com"];
      //  echo "<script>alert('Are you inserted data into customer table ? ')</script>";
        $con->query("update buyers set cst_name='$cst_name',cst_num='$cst_num',cst_eml='$cst_eml',cst_adr='$cst_adr',cst_com='$cst_com' where cst_id='$cst_id'");
        echo "succssfully updated";
    }
?>

<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title"><b>Update Customers</b></h1>
  </div>
<!-- form start -->
  <form role="form" action="#" method="post">
    <div class="box-body">

      <div class="form-group">
        <label for="#">ID </label>
        <input type="text" name="cstId" id="cstId" class="form-control" value="<?php echo $cst_id; ?>">
      </div>

      <div class="form-group">
        <label for="#">Name  </label>
        <input type="text" name="cst_name" id="cst_name" class="form-control" placeholder="Write Buyer Name" value="<?php echo $cst_name; ?>">
      </div>

      <div class="form-group">
        <label for="#">Number  </label>
        <input type="number" name="cst_num" id="cst_num" placeholder="Write Buyer Contact Number" class="form-control" value="<?php echo $cst_num; ?>">
      </div>

      <div class="form-group">
        <label for="#">Email</label>
        <input type="email" name="cst_eml" id="cst_eml" placeholder="Input Buyer Email " class="form-control" value="<?php echo $cst_eml; ?>">
      </div>

      <div class="form-group">
        <label for="#">Address</label>
        <textarea name="cst_adr" id="cst_adr" cols="02" rows="02" class="form-control" placeholder="<?php echo $cst_adr; ?>"></textarea>
      </div>   

      <div class="form-group">
        <label for="#">Comments</label>
        <textarea name="cst_com" id="cst_com" cols="02" rows="02" class="form-control" placeholder="<?php echo $cst_com; ?>"></textarea>

      </div>   
      
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button style="margin-left:910px" type="submit" class="btn btn-primary" value="Save" id="save" name="save" onclick="return confirm('are you sure?')">Update</button>
    </div>
  </form>
</div>