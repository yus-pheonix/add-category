<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="Index.js"></script>
    <title>Add Category</title>
  </head>
  <body>
    <div class='container'>
        <form action="" method="post" id='categoryAdd'>
        <div class="form-group row">
        <div class="alert alert-primary d-none" role="alert" id='success'>
        </div>
        </div>
            <div class="form-group row">
                <label for="categoryList" class="col-sm-2 col-form-label">Select Category</label>
                <div class="col-sm-10">
                    <select name="categoryList" id="categoryList">
                        <option value="0" selected='selected'>Select Category</option>
                        <?php echo categoryTree(); ?>
                    </select>  
                </div>
            </div>
            <div class="form-group row">
                <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputCategory" name='inputCategory' placeholder="New Category" required>
                </div>
            </div>
            <div class="alert alert-primary d-none" role="alert" id='categoryErr'>
            </div>
            
                <button class="btn btn-primary" id='delete'>Delete</button>
                <input class="btn btn-primary" type="submit" value="Add Category">
            
        </form>
    
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
<?php 
     /*$dbHost     = "localhost";
     $dbUsername = "root";
     $dbPassword = "";
     $dbName     = "categories";

    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    if(!$conn){
        die('error connecting to database');
    }*/

    function categoryTree($parent_id = 0, $sub_mark = ''){

        $dbHost     = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName     = "categories";
   
        $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
        if(!$conn){
           die('error connecting to database');
        }
        $query = "SELECT * FROM category WHERE parent_id = '$parent_id' ORDER BY name ASC" ;
        $result = mysqli_query($conn, $query);
        $raw = mysqli_num_rows($result);
       
        if($raw > 0){
            while($row = mysqli_fetch_array($result)){
                echo '<option value="'.$row['id'].'">'.$sub_mark.$row['name'].'</option>';
                categoryTree($row['id'], $sub_mark.'---');
            }
        }
    }

?>

</html>