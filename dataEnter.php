<?php
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $dbHost     = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName     = "categories";
        $option = $_POST['categoryList'];
        $value = $_POST['inputCategory'];

        if(!empty($value)){
            $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
            if($conn){
                $query = "INSERT INTO category(parent_id, name) VALUES ('$option', '$value')";
                $data = mysqli_query($conn, $query);
                if(!$data){
                    mysqli_close($conn);
                    die('Error inserting data into table');
                }else{
                    mysqli_close($conn);
                    echo true;
                }
            }else{
                die('Error Connecting to Database');
            }
        }else{
            echo 'Please enter valid Category';
        }
    }
?>