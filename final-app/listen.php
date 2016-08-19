<?php
    require("configuration.php");
    if(empty($_SESSION['user'])) {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
    else
    {   
        if(isset($_POST))
        {
            $name = $_POST['name'];

            $query = "UPDATE track set played=played+1 where track_name='$name'";
             require("configuration.php");
            $row = mysqli_query($conn,$query);
            if($row)
            {
            echo "<h1>PLAYING</h1>";
        }
        else
        {
            echo "TRY AGAIN";
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
    <form name="search" method="post" action="listen.php">

       <div>
        <div class="row text-center">
            <h2>PLAY</h2>
        </div>
        <div>
            <label for="firstname" class="col-md-2">
                Song Name:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            
        </div>   
        </div>     
        
        
        
        
  
        
        
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-info" name="search" value="search">
                    PLAY
                </button>
            </div>
        </div>
     
    </form> 
</div>




<footer id="footer" class="foo2">
                <div class="container">
                    <hr>
                    <div class="row">
                        <div class="col-xs-12">
                            <p>HELL YEAH \m/</p>
                        </div>
                    </div>
                </div>
            </footer>
    </div>

</body>
</html>
