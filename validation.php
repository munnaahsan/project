<?php
    session_start();
    $con = mysqli_connect('localhost','root','','my_db');

    $name = $_POST['user'];
    $pass = $_POST["password"];

    $query = $con->query("select name,password from  users where name='$name' && password='$pass' ");

    $num = mysqli_num_rows($query);
    
    if($num==1){
        header('location:home.php');
    }else{
        header('location:demo.php');
    }
    
?>