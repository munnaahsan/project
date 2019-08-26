<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
</head>



<body>
  <div class="container" style="width: 500px;">
        <h3 align="center">Search</h4>
        <label for="#">Enter Country Name</label>
        <input type="text" name="country" id="country" class="form-control">
        <div id="countrylist"></div>
        
    </div>







    <script>
        $(document).ready(function()){

            $("#country").keyup(function()){
                var query = $(this).val();
                alert(query);
                
              if(query != ''){
                  $.ajax({
                      url: search.php,
                      method: "POST",
                      data: {query:query},
                      success: function(data){
                          $("#countrylist").fadeIn();
                          $("#countrylist").html(data);
                      }
                  });
              }
            }
        }
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
</body>
</html>