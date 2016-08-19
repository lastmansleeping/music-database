<?php
    require("configuration.php");
    if(empty($_SESSION['user'])) {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
    else
    {   

        if(!empty($_POST))
        {  
            function display(){

            $search = $_POST['name'];
            $field = $_POST['field'];

  

            if ($field == "song") {
               


               $query = "select album_name from Album where album_id in(select album_id from track where track_name='$search')";
               require("configuration.php");

               $row = mysqli_query($conn,$query);

               $r = $result=mysqli_fetch_assoc($row);

               $aname = $r['album_name'];

               $q2 = "select artist_name from Artists where artist_id in(select artist_id from composed_by where track_id in(select track_id from track where track_name='$search'))";

               require("configuration.php");

               $row2 = mysqli_query($conn,$q2);

               $r2 = mysqli_fetch_assoc($row2);

               $arname = $r2['artist_name'];
               echo $arname;

                echo "<table>";
                echo "<thead>";
                echo "<tr>";

                echo "<th>Song</th><th>Album</th><th>Artist</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
            
                echo "<tr>";

                echo "<td>".$search."</td>";
                echo "<td>".$aname."</td>";
                echo "<td>".$arname."</td>";


                echo "</tr>";






                echo "</tbody>";
                echo "</table>";



               }

               elseif($field == "artist")
               {

                $q1 = "select t.track_name,a.album_name from (select track_name,album_id from track where track_id in (select track_id from composed_by where artist_id in (select artist_id from Artists where artist_name='tool'))) as t inner join Album a on t.album_id=a.album_id order by t.track_name";
                    require("configuration.php");
                $r = mysqli_query($conn,$q1);
                   echo "<table border='1px'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Song</th><th>Album</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                while($re = mysqli_fetch_assoc($r)){
                 
                    echo "<tr>";
                    echo "<td>".$re['track_name']."</td>";
                    echo "<td>".$re['album_name']."</td>";
                    echo "</tr>";

                }
                echo "</tbody>";
                    echo "</table>";
               }

            

           
           

        }}
    
  


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

                   


                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    
                     <li class="dropdown user-dropdown">
                       <a href="login.php"><i class="fa fa-user"></i>Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div>
    <form name="search" method="post" action="user_search.php">

       <div>
        <div class="row text-center">
            <h2>SEARCH</h2>
        </div>
        <div>
            <label for="firstname" class="col-md-2">
                Name:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="name" placeholder="Enter particulars">
            </div>
            
        </div>   
        </div>     
        
        
        
        
        <div>
            <label for="country" class="col-md-2">
                Field:
            </label>
            <div class="col-md-9">
                <select name="field" id="field" class="form-control">
                    <option>--Please Select--</option>
                    <option value="song">Song</option>
                    <option value="artist">Artist</option>
           
                   
                </select>
            </div>            
        </div>
        
        
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-info" name="search" value="search">
                    Search
                </button>
            </div>
        </div>
     
    </form> 
</div>

            <div>
                <?php 
                    display();

               
                ?>
            </div>



          <!--  <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-info" value="listen" name="blisten">
                    Listen
                </button>
            </div>
        </div>-->

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
