
<?php
  $user_id = $_POST["txtId"]; 
  $query=$con->query("select id,name,contact_no,email,address,comments from suppliers where id='$user_id'");
  list($sup_id,$sup_name,$sup_con,$sup_eml,$sup_adr,$sup_comnts)=$query->fetch_row();
  
  if(isset($_POST["btnSubmit"])){
    $user_id = $_POST["txtId"];
    $sup_name = $_POST["sup_name"];
    $sup_num = $_POST["sup_num"];
    $sup_eml = $_POST["sup_eml"];
    $sup_adr = $_POST["sup_adr"];
    $sup_cmt = $_POST["sup_cmt"];
      
    $con->query("update suppliers set name='$sup_name',contact_no='$sup_num',email='$sup_eml',address='$sup_adr',comments='$sup_cmt' where id='$user_id'");
    echo "succssfully updated";
}

 /*
 $sup_id = $_POST["supId"];
    $con = new mysqli("localhost","root","","my_db");
    $query = $con->query("select id,name,contact_no,email,address,comments from suppliers where id = $sup_id");
    list($sup_id,$sup_name,$sup_con,$sup_eml,$sup_adr,$sup_comnts) = $query->fetch_row();

    if(isset($_POST["update"])){
        $sup_id = $_POST["supId"];
        $sup_name = $_POST["sup_name"];
        $sup_num = $_POST["sup_num"];
        $sup_eml = $_POST["sup_eml"];
        $sup_adr = $_POST["sup_adr"];
        $sup_adr = $_POST["sup_adr"];
        $sup_cmt = $_POST["sup_cmt"];
        echo "<script>alert($sup_name)</script>";
    
    }
    
*/  

?>

<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title"><b>Update Supplier</b></h1>
  </div>
<!-- form start -->
  <form role="form" action="#" method="post">
    <div class="box-body">

      <div class="form-group">
        <label for="#">Supplier ID </label>
        <input type="text" name="txtId" id="txtId" class="form-control" placeholder="Write Supplier Name" value="<?php echo $sup_id; ?>">
      </div>

      <div class="form-group">
        <label for="#">Supplier Name  </label>
        <input type="text" name="sup_name" id="sup_name" class="form-control" placeholder="Write Supplier Name" value="<?php echo $sup_name; ?>">
      </div>

      <div class="form-group">
        <label for="#">Supplier Contact Number  </label>
        <input type="number" name="sup_num" id="sup_num" placeholder="Write Supplier Contact Number" class="form-control" value="<?php echo $sup_con; ?>">
      </div>

      <div class="form-group">
        <label for="#">Supplier Email</label>
        <input type="email" name="sup_eml" id="sup_eml" placeholder="Input Supplier Email " class="form-control" value="<?php echo $sup_eml; ?>">
      </div>

      <div class="form-group">
        <label for="#">Supplier Address</label>
        <textarea name="sup_adr" id="sup_adr" cols="02" rows="02" class="form-control" placeholder="<?php echo $sup_adr; ?>"></textarea>
      </div>  
      <div class="form-group">
          <label for="#">Comment About Supplier</label>
          <textarea name="sup_cmt" id="sup_cmt" cols="02" rows="02" class="form-control" placeholder="<?php echo $sup_comnts; ?>"></textarea>
      </div>   
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button style="margin-left:910px" type="submit" class="btn btn-primary" value="Save" id="save" name="btnSubmit">Update</button>
    </div>
  </form>
</div>