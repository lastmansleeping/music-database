<?php
require("configuration.php");
    if(empty($_SESSION['user'])) {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
    else {
        if (!empty($_POST)) {

                $song = $_POST['name'];
                $rating = $_POST['rating'];
                
                require("configuration.php");
                $query = "UPDATE track set votes=votes+'$rating' where track_name='$song'";

                $row = mysqli_query($conn,$query);

                 if(!($row))
            {
                echo "Failed to rate song";
                header("Location: rate_song.php");
                die("Redirecting to rate_song.php");
            }
            else{
                echo "Song rated";
                header("Location: rate_song.php");
                die("Redirecting to rate_song.php");
            }



        }
       
    }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH</title>

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
                <h3>HELLO USER</h3>
                
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav side-nav">
                                      <li><a href="user_search.php"><i class="fa fa-bullseye"></i>Search</a></li>

                    <li class="selected"><a href="listen.php"><i class="fa fa-table"></i >PLAY SONG</a></li>

                    <li class="selected"><a href="rate_song.php"><i class="fa fa-table"></i >Rate a Song</a></li>
                    
                    <li class="selected"><a href="top_rated_user.php"><i class="fa fa-table"></i > Top Rated</a></li>

                     <li class="selected"><a href="top_sold_user.php"><i class="fa fa-table"></i > Top Sold</a></li>

                      <li class="selected"><a href="trending_user.php"><i class="fa fa-table"></i > Trending</a></li>

                     <li class="selected"><a href="complex_queries.php"><i class="fa fa-table"></i >Complex Queries</a></li>



                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    
                     <li class="dropdown user-dropdown">
                       <a href="login.php"><i class="fa fa-user"></i>Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div>
    <form name="search" method="post" action="rate_song.php">

       <div>
        <div class="row text-center">
            <h2>Rate a Song</h2>
        </div>
        <div>
            <label for="name" class="col-md-2">
                Song Name:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="name" placeholder="Song Name">
            </div>
            
        </div>   
        </div>     
        
        
        
        
         <div>
            <label for="rating" class="col-md-2">
                Rating:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="rating" name="rating" placeholder="Your Rating">
            </div>
          
        </div>
        
        
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-info">
                    RATE
                </button>
            </div>
        </div>
     
    </form> 
</div>
    </div>

</body>
</html>
