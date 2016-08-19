<?php 

    // These variables define the connection information for the MySQL database 
    $username = "root"; 
    $password = ""; 
    $host = "localhost"; 
    $dbname = "mydb"; 
    
    // Create connection
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    header('Content-Type: text/html; charset=utf-8');  
    session_start(); 
?>
