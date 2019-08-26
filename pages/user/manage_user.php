<?php
  if(isset($_POST["dltUser"])){
    $id = $_POST['userId'];
    if($con->query("delete from users where id = '$id'")){
      echo "Deleted";
    }
    
  }
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Users
        <small>user info</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User</a></li>
        <li class="active">User Info</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Correction</th>
                </tr>
                </thead>
               <tbody>
                 <?php



  $con = new mysqli("localhost","root","","my_db");
  $query=$con->query("select u.id,u.name,u.email,r.name from users u,role r where u.role_id = r.role_id");
  while(list($id,$username,$email,$role)=$query->fetch_row()){
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$username</td>";
    echo "<td>$email</td>";
    echo "<td>$role</td>";
    echo "<td> <form style='display:inline;' action='home.php?item=77' method='POST'>
                   <input type='hidden' value='$id'  name='txtId' />
                   <button class='btn btn-primary'><i class='fas fa-edit'></i> </button>
            </form>
              <form style='display:inline' method='POST'>
              <input type='hidden' value='$id' name='userId'>
              <button type='submit' name='dltUser'  class='btn btn-danger'><i class='fas fa-trash-alt'></i> </button>
            </form>
          </td>";
    echo "</tr>";
  }
  
?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    