<?php
    require("configuration.php"); 
    
    $submitted_username = ''; 
    if(!empty($_POST)){ 

        $username = $_POST['username'];
        $query = " 
            SELECT 
                username, 
                password,
                d_admin_client
            FROM user 
            WHERE 
                username = '$username';";
         require("configuration.php"); 
        $result = mysqli_query($conn, $query);

        $row=mysqli_fetch_assoc($result);

        $login_ok = false; 

        if($row){ 
            $check_password = $_POST['password'] ; 
           
            if($check_password === $row['password']){
                $login_ok = true;
            } 
        } 

        if($login_ok){ 
            
            unset($row['password']); 
            $_SESSION['user'] = $row;
            if($row['d_admin_client'] == 1){  
                header("Location: admin.php"); 
                die("Redirecting to: admin.php"); 
            }else{
                header("Location: user_search.php"); 
                die("Redirecting to: user_search.php");
            }
        } 
        else{ 
            print("Login Failed."); 
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
  
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
    <title>Login</title>
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
    <h3>Login</h3>
</div>

<!-- Login - START -->
<form class="col-md-12 form-horizontal" method="post" action="login.php">
    <div class="form-group" >
        <input name="username" type="text" class="form-control input-lg" placeholder="Username">
    </div>
  
    <div class="form-group">
        <input name="password" type="password" class="form-control input-lg" placeholder="Password">
    </div>
   
    <div class="form-group">
        <button class="btn btn-primary btn-lg btn-block">Sign In</button>
        
        <span class="pull-right"><a href="registration.php">New Registration</a></span>
    </div>
  
</form>
<!-- Login - END -->

</div>

</body>
</html>