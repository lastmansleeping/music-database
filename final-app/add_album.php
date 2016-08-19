<?php
require("configuration.php");
    if(empty($_SESSION['user'])) {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
    else {
        if (!empty($_POST)) {
        
            $name = $_POST['name'];
           $artist = $_POST['artist'];
            $year = $_POST['year'];
            $rl = $_POST['rl'];
            $buy = $_POST['buy'];

            $q = "select label_id from record_label where name='$rl'";
           
            require("configuration.php");

            $lab = mysqli_query($conn,$q);

            $label = mysqli_fetch_assoc($lab);

            
            $id = $label['label_id'];


            $query = "INSERT INTO Album(album_name,no_of_tracks,year,label_id,link)
            values('$name',0,'$year','$id','$buy')";

          

            $row = mysqli_query($conn,$query);

            $q1 = "update Artists set no_of_albums=no_of_albums+1 where artist_name='$artist'"; 


            require("configuration.php");

            $row1 =  mysqli_query($conn,$q1);

            if(!($row))
            {
                echo "Failed to add";
                header("Location: add.php");
                die("Redirecting to add.php");
            }
            else{
                echo "Album Added";
                header("Location: add_album.php");
                die("Redirecting to add_album.php");
            }

            }
           
            }
        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD ALBUM</title>

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

    <div id="wrapper" name="container">

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
    <form name="search" method="post" action="add_album.php">

                <div class="row text-center">
            <h2>Add Album</h2>
        </div>
        <div>
            <label for="name" class="col-md-2">
                Album Name:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
          
        </div>        

         

        <div>
            <label for="year" class="col-md-2">
                Year of Release:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="year" name="year" placeholder="Year of Release">
            </div>
          
        </div> 
                </div> 
        
           <div>
            <label for="name" class="col-md-2">
                Artist Name:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="artist" name="artist" placeholder="Artist">
            </div>
          
        </div>

        <div>
            <label for="name" class="col-md-2">
                Record Label Name:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="rl" name="rl" placeholder="Record Label">
            </div>
          
        </div>  

        <div>
            <label for="link" class="col-md-2">
                Buy Link:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="link" name="link" placeholder="Buy Link">
            </div>
          

        
        
        
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-info">
                    ADD
                </button>
            </div>
        </div>
        
        
        
        
        
        
       
    </form>  
</div>
    </div>

</body>
</html>
