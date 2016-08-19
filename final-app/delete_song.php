<?php
require("configuration.php");
    if(empty($_SESSION['user'])) {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
    else {
        if (!empty($_POST)) {
        
            $name = $_POST['name'];
            $q1 = "select artist_id from composed_by where track_id in(select track_id from track where track_name='$name')";
            require("configuration.php");
              $r = mysqli_query($conn,$q1);
             $r1= mysqli_fetch_assoc($r);
             $r2 = $r1['artist_id'];
            $query = "DELETE FROM track where track_name='$name'";

            require("configuration.php");
            $row = mysqli_query($conn,$query);
            $q2 = "update Artists set no_of_songs=no_of_songs-1 where artist_id='$r2'";
            require("configuration.php");
             $r3 = mysqli_query($conn,$q2);
            if(!($row))
            {
                echo "Failed to delete";
                header("Location:delete.php");
                
            }
            else{
                echo "Song Added";
                 header("Location:delete_song.php");
               
            }

            }
 
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE SONG</title>

    <link rel="stylesheet" type="text/css" href="bootstrap2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome2/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css2/local.css" />

    <script type="text/javascript" src="js2/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap2/js/bootstrap.min.js"></script>   

      <style>
body{
        background-image: url("pic/sabbath.jpg");
    }
      
         .container{
        background-color: rgba(255,255,255,0.5);
     
    }
        div {
            padding-bottom:20px;
        }

    </style>
</head>
<body>

    <div id="wrapper">

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h3>HELLO ADMIN</h3>
                
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav side-nav">
                   <li><a href="admin.php"><i class="fa fa-bullseye"></i>Add</a></li>

                    <li class="selected"><a href="delete.php"><i class="fa fa-table"></i >Delete</a></li>

                 

                    <li class="selected"><a href="top_rated_admin.php"><i class="fa fa-table"></i > Top Rated</a></li>

                     <li class="selected"><a href="top_sold_admin.php"><i class="fa fa-table"></i > Top Sold</a></li>

                      <li class="selected"><a href="trending_admin.php"><i class="fa fa-table"></i > Trending</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    
                     <li class="dropdown user-dropdown">
                       <a href="login.php"><i class="fa fa-user"></i>Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>
<div>
    <form name="search" method="post" action="delete_song.php">

                <div class="row text-center">
            <h2>Delete Song</h2>
        </div>
        <div>
            <label for="name" class="col-md-2">
                Song Name:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
          
        </div>        
        
      
    
        
        
        
        
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-info">
                    DELETE
                </button>
            </div>
        </div>
        
        
        
        
        
        
       
    </form>  
</div>
    </div>

</body>
</html>
