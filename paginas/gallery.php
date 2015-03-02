<?php
    session_start();
    include '../scripts/login.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gallery</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!--<link href="../assets/css/4-col-portfolio.css" rel="stylesheet">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id-"inicio" class="index">

    <!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php">photo<small>Up</small></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="explore.php">Explore</a></li>
        <?php
            if (isset($_SESSION["CurrentUser"])){
                echo "<li class=\"active\"><a href=\"#\">Gallery <span class=\"sr-only\">(current)</span></a></li>";
                echo "<li><a href=\"upload.php\">Upload <span class=\"sr-only\">(current)</span></a></li>";
            }
        ?>

      </ul>
      
      <form class="navbar-form navbar-left" method="post" action="../scripts/search.php">
        <div class="form-group">
          <input name="search" type="text" class="form-control" placeholder="Search">
        </div>
        <button name="submits" type="submit" class="btn btn-default">Submit</button>
      </form>
  
      <ul class="nav navbar-nav navbar-right">
    
        <?php
            if (isset($_SESSION["CurrentUser"])){

                echo "<li><a href=\"../scripts/login.php?logout=true\">Log out</a></li>";

            }
            else{

                echo "<li><a href=\"#login\" data-toggle=\"modal\">Log in</a></li>";
                echo "<li><a href=\"#register\" data-toggle=\"modal\">Register</a></li>";
            } 
         ?>
      </ul>
    </div>
  </div>
</nav>


<header>
    <!-- Page Content -->
    <div class="container">
        <div class="container">
            <br>
            <br>
            <br>
        </div>
            <h1 class="page-header">Gallery
            </h1>
    </div>
</header>

    <div id="profile">
        <div class="container">
            <?php
                session_start();

                if(isset($_SESSION['CurrentUser'])){
                    echo "<h1 class=\"page-header\"><small>";
                    echo "Welcome        ";
                    echo "</small>" ;
                    echo $_SESSION['CurrentUser'];
                    echo "</h1>";
                    echo "<h2><small>";
                    echo "This are the pictures you have uploaded:";
                    echo "</small></h2>";
                    include '../scripts/profileimgshow.php';
                }else{
                    echo "Not logged in";
                }
            ?>
        </div>
    </div>

               <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="text-muted">Copyright &copy; paginaTelematica - 2015</p>
        </div>
    </footer>

    <div class="modal fade" id="login" role="dialog" method="post">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Log In</h1>
            </div>
            <div class="modal-body">

                <form action="" method="post" class="form-horizontal">
                    <div class "form-group">
                        <label>Enter your Username:</label><br>
                        <input id="username" name="username" placeholder="Username" type="text">
                        <br>
                        <label>Enter your Password:</label><br>
                        <input id="password" name="password" placeholder="********" type="password">
                        <br>
                        <input name="submit" type="submit" value="login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Register</h1>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label" for="disabledInput">Username</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="Username">
                </div>
                <div class="form-group">
                    <label class="control-label" for="disabledInput">Email</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="Username">
                </div>
                <div class="form-group">
                    <label class="control-label" for="disabledInput">Password</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="Password">
                </div>
                <div class="form-group">
                    <label class="control-label" for="disabledInput">Confirm Password</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="Password">
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default" data-dismiss="modal">Register</a>
                <a class="btn btn-default" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>


    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    </body>
</html>