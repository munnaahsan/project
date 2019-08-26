<?php
 
 if(isset($_POST["btnSubmit"])){
	 
	 $role_id=$_POST["cmbRole"];
	 $username=$_POST["txtUsername"];
	 $email = $_POST["txtEmail"];
	 $password=$_POST["pwdPassword"];
	 $retype_pass=$_POST["pwdRetyePass"];
	 
	 
	 if($password==$retype_pass){
		$con = new mysqli("localhost","root","","my_db");
		$query = $con->query("insert into users(name,email,password,role_id)values('$username','$email','$password','$role_id')");
        echo "succssfully created";
	 }else{
		  echo "password did not match.";
    } 
 }
?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Create User</h3>
  </div>
<!-- form start -->
  <form role="form" action="#" method="post">
    <div class="box-body">
    
      <div class="form-group">
        <label for="cmbRole">Role</label>
        <select class="form-control" id="cmbRole" name="cmbRole">
          <?php
            $con = new mysqli("localhost","root","","my_db");
            $query = $con->query("select name,role_id from role");
            while(list($name,$role) = $query->fetch_row()){
              echo "<option value='$role'>$name</option>";
            }
          ?>
        </select>
   
      </div>
      <div class="form-group">
        <label for="txtUsername">Username</label>
        <input type="text" class="form-control" id="txtUsername" name="txtUsername" placeholder="Enter username">

        

      </div>
      <div class="form-group">
        <label for="txtEmail">Email</label>
        <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Write Your Email Here">
        
      </div>
      
      <div class="form-group">
        <label for="pwdPassword">Password</label>
        <input type="password" class="form-control" id="pwdPassword" name="pwdPassword" placeholder="Password">

      </div>
        <div class="form-group">
        <label for="pwdRetyePass">Retype Password</label>
        <input type="password" class="form-control" id="pwdRetyePass" name="pwdRetyePass" placeholder="Password">
      </div>
      
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary" value="Submit" name="btnSubmit">Submit</button>
    </div>
  </form>
</div>