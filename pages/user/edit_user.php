<?php

/*
$user_id="";
if(isset($_POST["editid"])){
    $user_id = $_POST["editid"];
}
    $con = new mysqli("localhost","root","","my_db");
    $query = $con->query("select id,name,email,password,role_id from users where id = '$user_id'");
    list($id,$username,$email,$password,$role_id) = $query->fetch_row();
    echo $username;

    if(isset($_POST["btnSubmit"])){
      $userid = $_POST["txtId"];
      $role_id = $_POST["cmbRole"] ;
      $txtUsername = $_POST["txtUsername"];
      $txtEmail = $_POST["txtEmail"];
      $pwdPassword = $_POST["pwdPassword"];
      $pwdRetyePass = $_POST["pwdRetyePass"];

      if($pwdPassword == $pwdRetyePass){
        $con = new mysqli("localhost","root","","my_db");
        $con->query("update users set name = '$txtUsername', email='$txtEmail',password='$pwdPassword' where id = $userid");
        echo "Updated";
      }else{
        echo "Password did not match";
      }
    }
*/

$user_id=$_POST["txtId"]; 
   
$rs_row=$con->query("select id,name,email,password,role_id from users where id='$user_id'");
list($id,$username,$email,$password,$role_id)=$rs_row->fetch_row();



if(isset($_POST["btnSubmit"])){

$user_id=$_POST["txtId"];
$role_id=$_POST["cmbRole"];
$username=$_POST["txtUsername"];
$txtEmail = $_POST["txtEmail"];
$passsword=$_POST["pwdPassword"];
$retype_pass=$_POST["pwdRetyePass"];

echo $txtEmail;

if($passsword==$retype_pass){
  
   $con->query("update users set name='$username', email='$txtEmail',password='$passsword',role_id='$role_id' where id='$user_id'");
  
      //header("location:home.php?item=4");
     echo "succssfully updated";

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
          <label for="txtId">ID</label>
          <input type="text" readonly value="<?php echo $id; ?>" class="form-control" id="txtId" name="txtId">
        </div>
    
      <div class="form-group">
        <label for="cmbRole">Role</label>
        <select class="form-control" id="cmbRole" name="cmbRole">
          <?php
            $con = new mysqli("localhost","root","","my_db");
            $query = $con->query("select name,role_id from role");
            while(list($name,$role) = $query->fetch_row()){
              if($role == $role_id){
                echo "<option value='$role' selected='selected'>$name</option>";
              }else{
                echo "<option value='$role'>$name</option>";
              }
            }
          ?>
        </select>
   
      </div>
      <div class="form-group">
        <label for="txtUsername">Username</label>
        <input type="text" value="<?php echo $username; ?>" class="form-control" id="txtUsername" name="txtUsername" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="txtEmail">Email</label>
        <input type="email" value="<?php echo $email; ?>" class="form-control" id="txtEmail" name="txtEmail" placeholder="Write Your Email Here">
      </div>
      
      <div class="form-group">
        <label for="pwdPassword">Password</label>
        <input type="password" value="<?php echo $password; ?> " class="form-control" id="pwdPassword" name="pwdPassword" placeholder="Password">
      </div>
        <div class="form-group">
        <label for="pwdRetyePass">Retype Password</label>
        <input type="password" value="<?php echo $password; ?>" class="form-control" id="pwdRetyePass" name="pwdRetyePass" placeholder="Password">
      </div>
      
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary" value="Submit" name="btnSubmit">Update</button>
    </div>
  </form>
</div>