<?php
    require("configuration.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
    else {
        
        function display(){
        $query = "select track_name from track order by played desc limit 10";
        require("configuration.php");
        $result = mysqli_query($conn,$query);

        echo "<table>";
        


        while($row =  mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<th>".$row['track_name']."</th>";
            echo "</tr>";

        }

        echo "</table>";
    }
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRENDING</title>

    <link rel="stylesheet" type="text/css" href="bootstrap2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome2/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css2/local.css" />

    <script type="text/javascript" src="js2/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap2/js/bootstrap.min.js"></script>        
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

       <div id="page-wrapper">

                   <div>
                <?php
                    display();
                ?>
            </div>
            <!-- /.row -->
        </div>
    </div>

</body>
</html>


