<?php
    
    if(isset($_POST["save"])){
        $con = new mysqli("localhost","root","","my_db");
        $prd_name = $_POST["prd_name"];
        $prd_price = $_POST["prd_price"];
        $prd_dt = $_POST["prd_dt"];
        $prd_ctg = $_POST["prd_ctg"];
        $prd_sz = $_POST["prd_sz"];
        $um_name = $_POST["um_name"];
        $clr_name = $_POST["clr_name"];
        $grd_name = $_POST["grd_name"];

        $query = $con->query("insert into product(name,price,uom_id,category_id,size_id,grad,color,data) values('$prd_name','$prd_price','$um_name','$prd_ctg','$prd_sz','$grd_name','$clr_name','$prd_dt')");
        echo "<script> alert('Successfully Inserted Into Database'); </script>";
    }else{
        //echo "Something Was Wrong";
    }
?>


<body>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create Product : </h3>
    </div>
    <form action="#" method="post" role="form">
        <div class="box-body">
            <div class="form-group">
                <label for="#">Product Name : </label>
                <input type="text" id="prd_name" name="prd_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="#">Product Price</label>
                <input type="number" id="prd_price" name="prd_price" class="form-control">
            </div>
            <div class="form-group">
                <label for="#">Date : </label>
                <input type="date" class="form-control" id="prd_dt" name="prd_dt">
            </div>
            <div class="form-group">
                <label for="#"> Product Category : </label><br>
                <select name="prd_ctg"  id="prd_ctg" class="form-control">
                    <?php
                        $con = new mysqli("localhost","root","","my_db");
                        $query = $con->query("select cat_id, cat_title from category");
                        while(list($id,$name) = $query->fetch_row()){
                            echo "<option value='$id'>$name</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="#">Product Size : </label><br>
                <select name="prd_sz"  id="prd_sz"  class="form-control">
                    <?php
                        $con = new mysqli("localhost","root","","my_db");
                        $query = $con->query("select sz_id, sz_name from size");
                        while(list($id,$name) = $query->fetch_row()){
                            echo "<option value='$id'>$name</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="#">Unity Of Measure : </label><br>
                <select name="um_name" id="um_name" class="form-control">
                    <?php
                        $con = new mysqli("localhost","root","","my_db");
                        $query = $con->query("select uom_id, uom_name from uom");
                        while(list($id,$name) = $query->fetch_row()){
                            echo "<option value='$id'>$name</option>";
                        }
                    ?>  
                </select>
            </div>
            <div class="form-group">
                <label for="#">Color : </label><br>
                <select name="clr_name" id="clr_name" class="form-control">
                    <?php
                        $con = new mysqli("localhost","root","","my_db");
                        $query = $con->query("select clr_id, clr_name from color");
                        while(list($id,$name) = $query->fetch_row()){
                            echo "<option value='$id'>$name</option>";
                        }
                    ?>  
                </select>
            </div>
            <div class="form-group">
                <label for="#">Product Grade : </label><br>
                <select name="grd_name" id="grd_name" class="form-control">
                    <?php
                        
                        $query = $con->query("select grd_id, grd_name from grade");
                        while(list($id,$name) = $query->fetch_row()){
                            echo "<option value='$id'>$name</option>";
                        }
                    ?>  
                </select>
            </div>            
        </div>
        <div>
            <button  type="submit" class="btn-primary btn" name="save" value="save" id="save">Save</button>
        </div>
    </form>
    
</div>
<!--
    select p.id,p.name,p.price,cat.cat_title,u.uom_name,g.grd_name,c.clr_name from product p,category cat,uom u,grade g,color c where p.category_id = cat.cat_id and p.uom_id = u.uom_id and p.grad = g.grd_id and p.color = c.clr_id;
-->
</body>

