<?php 
    require("configuration.php");
    if(isset($_POST['username']))
        $username = $_POST['username'];
    if(isset($_POST['name']))
    $name = $_POST['name'];
 if(isset($_POST['age']))
    $age = $_POST['age'];

    if(!empty($_POST)) 
    { 
        // Ensure that the user fills out fields 
        if(empty($_POST['username'])) 
        { die("Please enter a username."); } 
        if(empty($_POST['password'])) 
        { die("Please enter a password."); } 
         
        // Check if the username is already taken

    require("configuration.php");

        $query = " 
            SELECT 
                1 
            FROM user 
            WHERE 
                username = '$username'; 
        "; 
        $result = mysqli_query($conn,$query);

        require("configuration.php");

        $row=mysqli_fetch_assoc($result);

        if($row){ die("This username is already in use"); } 

         
        // Security measures
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
        $password = $_POST['password'] ; 
        
        $query = " 
            INSERT INTO user ( 
                name,
                username, 
                password, 
                age,
                d_admin_client
            ) VALUES ( 
                '$name',
                '$username',
                '$password',
                '$age',
                0
            ) 
        "; 

         require("configuration.php");
        $row = mysqli_query($conn, $query);

        if($row){
        header("Location: user_search.php"); 
        die("Redirecting to user_search.php"); 
    } }

?>





<!DOCTYPE html>
<html>
<head>
    <style>
    body{
        background-image: url("pic/sabbath.jpg");
    }
    .container{
        background-color: rgba(255,255,255,0.5);
        padding: 0cm 4cm 4cm 4cm;
    }
    </style>
    <meta charset="utf-8" />
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div>
    <h1 align="center">MUSIC DATABASE</h1>
</div>
<div class="page-header">
    <h3>User Registration</h3>
</div>

<!-- Login - START -->
<form class="col-md-12" method="post" action="registration.php">
    <div class="form-group">
        <input name="name" type="text" class="form-control input-lg" placeholder="Name">
    </div>

    <div class="form-group" >
        <input name="username" type="text" class="form-control input-lg" placeholder="Username">
    </div>
  
    <div class="form-group">
        <input name="password" type="password" class="form-control input-lg" placeholder="Password">
    </div>
   
    <div class="form-group">
        <input name="age" type="text" class="form-control input-lg" placeholder="age">
    </div>

    

    

    <div class="form-group">
        <button class="btn btn-primary btn-lg btn-block">Sign Up</button>
        
        
    </div>
  
</form>
<!-- Login - END -->

</div>

</body>
</html>