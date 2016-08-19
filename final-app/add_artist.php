<?php
require("configuration.php");
    if(empty($_SESSION['user'])) {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
    else {
        if (!empty($_POST)) {
        
            $name = $_POST['name'];
            $year = $_POST['year'];
            $website = $_POST['website'];
            
         require("configuration.php");

            $query = "INSERT INTO Artists(artist_name,origin_year,website_link,no_of_albums,no_of_songs)
                     values('$name','$year','$website',0,0)";

            $row = mysqli_query($conn,$query);

            if(!($row))
            {
                echo "Failed to add";
                header("Location: add.php");
                die("Redirecting to add.php");
            }
            else{
                echo "Artist Added";
                header("Location: add_artist.php");
                die("Redirecting to add_artist.php");
            }

            }
           
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD_ARTIST</title>

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
    <form name="search" method="post" action="add_artist.php">

                <div class="row text-center">
            <h2>Add Artist</h2>
        </div>
        <div>
            <label for="name" class="col-md-2">
                Artist Name:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
          
        </div>        
        <div>
            <label for="year" class="col-md-2">
                Origin Year:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="year" name="year" placeholder="Year of origin">
            </div>
          
        </div>
      
    
        <div>
            <label for="website" class="col-md-2">
                Website:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                
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
