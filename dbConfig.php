<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "categories";

// Create database connection
//$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
$db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName) or die('Error connecting to database');

// Check connection
?>