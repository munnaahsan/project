<?php
    $connect = mysqli_connect("localhost","root","","my_db");
    if(isset($_POST["query"])){
        $output = '';
        $query = "select * from product where name like'%".$_POST["query"]."%'";
        $result = mysqli_query($connect,$query);
        $output = '<ul class="list-unstyled">';
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $output .= '<li>'.$row["name"].'</li>';
            }
            
        }
        else
        {
          $output .='<li>Country Not Foung</li>' ; 
        }
        $output .='</ul>';
            echo $output;
    }
?>