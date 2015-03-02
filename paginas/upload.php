<?php
    session_start();
    include '../scripts/login.php';
    include '../registerlogic.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Upload</title>

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
                echo "<li><a href=\"gallery.php\">Gallery <span class=\"sr-only\">(current)</span></a></li>";
                echo "<li class=\"active\"><a href=\"#\">Upload <span class=\"sr-only\">(current)</span></a></li>";
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
            <h1 class="page-header">Upload
            </h1>
    </div>
</header>

    <div id="upload">
        <div class="container">
            <div class="jumbotron">
                <form class="form-horizontal" method='POST' action='..\scripts\upload.php' enctype='multipart/form-data'>
                    <fieldset>
                        <input type='file' name='myfile'><br>
                        <input class="form-control" type='text' name='imgname' placeholder='Image name'><br>
                        <input class="form-control" type='text' name='comment' placeholder='Comment'><br>
                        <button class="btn btn-default btn-lg btn-block" type='submit'>Upload</button>
                    </fieldset>
                </form>
            </div>
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
                    <form class="form-horizontal" action="" method="post">
                        <fieldset>
                            <!--<div class="form-group">-->
                                <label class="control-label" for="username">Enter your Username:</label>
                                <input class="form-control" id="username" name="username" placeholder="Username" type="text">
                            <!--</div>
                            <div class="form-group">-->
                                <label class="control-label" for="password">Enter your Password:</label>
                                <input class="form-control" id="password" name="password" placeholder="********" type="password">
                                <br>
                          <!--  </div>-->
                                <button class="btn btn-default btn-lg btn-block" name="submit" type="submit">Log in</button> 
                        </fieldset> 
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
                    <form class="form-horizontal" method="post" action="">
                        <fieldset>
                                <label class="control-label" for="username">Enter your Username:</label>
                                <input class="form-control" id="username" name="username" placeholder="Username" type="text">

                                <label class="control-label" for="password">Enter your Password:</label>
                                <input class="form-control" id="password" name="password" placeholder="********" type="password">

                                <label class="control-label" for="password2">Repeat you Password:</label>
                                <input class="form-control" id="password2" name="password2" placeholder="********" type="password">

                                <label class="control-label" for="email">Enter your Email:</label>
                                <input class="form-control" id="email" name="email" placeholder="email" type="text">

                                <br>
                                <button class="btn btn-default btn-lg btn-block" name="submitr" type="submit">Register</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    </body>
</html>