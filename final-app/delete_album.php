<?php
require("configuration.php");
    if(empty($_SESSION['user'])) {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
    else {
        if (!empty($_POST)) {
        
            $name = $_POST['name'];

            $q = "select artist_id from composed_by where track_id in(select track_id from track where album_id in(select album_id from Album where album_name='$name'))";

            require("configuration.php");

            $row1 = mysqli_query($conn,$q);

            $r2 = mysqli_fetch_assoc($row1);

            $r3 = $r2['artist_id'];

            require("configuration.php");


            $q2 = "update Artists set no_of_albums=no_of_albums-1 where artist_id='$r3'";

            $row2 = mysqli_query($conn,$q2);

            
            require("configuration.php");

            $query = "DELETE FROM Album where album_name='$name'";

            $row = mysqli_query($conn,$query);


            if(!($row))
            {
                echo "Failed to delete";
                header("Location: delete.php");
                die("Redirecting to delete.php");
            }
            else{
                echo "Album Deleted";
                header("Location: delete_album.php");
                die("Redirecting to delete_album.php");
            }

      

        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE ALBUM</title>

    <link rel="stylesheet" type="text/css" href="bootstrap2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome2/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css2/local.css" />

    <script type="text/javascript" src="js2/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap2/js/bootstrap.min.js"></script>   

      <style>

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
    <form name="search" method="post" action="delete_album.php">

                <div class="row text-center">
            <h2>Delete Album</h2>
        </div>
        <div>
            <label for="name" class="col-md-2">
                Album Name:
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
