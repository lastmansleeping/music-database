<?php
require("configuration.php");
    if(empty($_SESSION['user'])) {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
    else {
        if (!empty($_POST)) {
        
            $name = $_POST['name'];
            $album = $_POST['album'];
            $genre = $_POST['genre'];
            $duration = $_POST['duration'];
            $buy = $_POST['buy'];
            $artist = $_POST['artist'];

            require("configuration.php");

            $x = "select artist_id from Artists where artist_name='$artist'";

            $y = mysqli_query($conn,$x);

            $ar = mysqli_fetch_assoc($y);

            $arid = $ar['artist_id'];

            $q = "select album_id from Album where album_name='$album'";

            require("configuration.php");

            $album = mysqli_query($conn,$q);

            $al = mysqli_fetch_assoc($album);

            $id= $al['album_id'];


            $query = "INSERT INTO track(track_name,album_id,duration,buy_link,genre_name,votes,played,copies_sold)
                      values('$name','$id','$duration','$buy','$genre',0,0,0)";

             require("configuration.php");
             
            $row = mysqli_query($conn,$query);

            $q2 = "select track_id from track where track_name='$name'";

            require("configuration.php");

            $row2 = mysqli_query($conn,$q2);

            $res = mysqli_fetch_assoc($row2);

            $tid = $res['track_id'];

            $q3 = "INSERT INTO composed_by(track_id,artist_id) values('$tid','$arid')";

            require("configuration.php");

            $r = mysqli_query($conn,$q3);

            if(!($row) || !($r))
            {
                echo "Failed to add";
                header("Location: add.php");
                die("Redirecting to add.php");
            }
            else{
                echo "Song Added";
                header("Location: add_song.php");
                die("Redirecting to add_song.php");
            }

            }

            }
        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD SONG</title>

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
    <form name="search" method="post" action="add_song.php">

                <div class="row text-center">
            <h2>Add Song</h2>
        </div>
        <div>
            <label for="name" class="col-md-2">
                Song Name:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="name" name="name" placeholder="Song">
            </div>
          
        </div>        
        <div>
            <label for="album" class="col-md-2">
                Album:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="album" name="album" placeholder="Album">
            </div>
          
        </div>
        <div>
            <label for="album" class="col-md-2">
                Artist:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="artist" name="artist" placeholder="Artist">
            </div>
          
        </div>
       <div>
            <label for="genere" class="col-md-2">
                Genre:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="genre" name="genre" placeholder="Genre">
            </div>
          
        </div>
        <div>
            <label for="duration" class="col-md-2">
                Duration:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="duration" name="duration" placeholder="Duration">
                
            </div>
       
        </div>
        <div>
            <label for="buy" class="col-md-2">
                Buy Link:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="buy" name="buy" placeholder="Buy Link">
                
            </div>
     
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
