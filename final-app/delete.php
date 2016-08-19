<?php
require("configuration.php");
    if(empty($_SESSION['user'])) {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
    else {
            if(!empty($_POST))
            {
                $table = $_POST['field'];

                if($table == "song"){
                     header("Location: delete_song.php");
                    die("Redirecting to delete_song.php");

                }
                elseif($table == "artist"){
                    header("Location: delete_artist.php");
                    die("Redirecting to delete_artist.php");
            }
            elseif($table == "album"){
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
    <title>DELETE</title>

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
<br>
<div>
    <form name="search" method="post" action="delete.php">

               
        
        
        
        
        <div>
            <div class="row text-center">
            <h2>DELETE</h2>
        </div>
            <label for="delete" class="col-md-2">
                Delete:
            </label>
            <div class="col-md-9">
                <select name="field" id="field" class="form-control">
                    <option>--Please Select--</option>
                    <option value="song">Song</option>
                    <option value="artist">Artist</option>
                    
                   
                    <option value="album">Album</option>
                   
                </select>
            </div>            
        </div>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-info">
                    Go
                </button>
            </div>
        </div>
        
        
       
    </form>  
    </div>
</div>

</body>
</html>
