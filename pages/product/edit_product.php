<?php
  $prd_id = $_POST["prdId"];
  echo "<script> alert('Are You Sure ?') </script>";
  $query = $con->query("select id,name,price,uom_id,category_id,size_id,grad,color,image,data from product where id = '$prd_id'");
  list($prd_id,$prd_name,$prd_price,$prd_uom,$prd_cat,$prd_sz,$prd_grd,$prd_clr,$prd_img,$prd_dt) = $query->fetch_row();
 ?>
 <?php
 /*
    $byr_id = $_POST["byrId"]; 
    $query=$con->query("select byr_id,byr_name,byr_num,byr_eml,byr_adr,byr_com from buyers where byr_id='$byr_id'");
    list($byr_id,$byr_name,$byr_num,$byr_eml,$byr_adr,$byr_com)=$query->fetch_row();
	
    if(isset($_POST["save"])){
        $byr_id = $_POST["byrId"];
        $byr_name = $_POST["byr_name"];
        $byr_num = $_POST["byr_num"];
        $byr_eml = $_POST["byr_eml"];
        $byr_adr = $_POST["byr_adr"];
        $byr_com = $_POST["byr_com"];
        $con->query("update buyers set byr_name='$byr_name',byr_num='$byr_num',byr_eml='$byr_eml',byr_adr='$byr_adr',byr_com='$byr_com' where byr_id='$byr_id'");
        echo "succssfully updated";
    }
*/
?>

<div class="box box-primary">
<div class="box-header with-border">
    <h3 class="box-title">Update Product : </h3>
</div>
<form action="#" method="post" role="form">
        <div class="box-body">
            <div class="form-group">
                <label for="#">Product Name : </label>
                <input type="text" id="prd_name" name="prd_name" class="form-control" value="<?php echo $prd_name; ?>">
            </div>
            <div class="form-group">
                <label for="#">Product Price</label>
                <input type="number" id="prd_price" name="prd_price" class="form-control" value="<?php echo $prd_price; ?>">
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
                <select name="um_name" id="um_name" class="form-control" >
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
            <button  type="submit" class="btn-primary btn" name="save" value="save" id="save">Update</button>
    </div>
    </form>
    </div>