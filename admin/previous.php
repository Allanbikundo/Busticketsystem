<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User Area</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap-flatly.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.css" rel="stylesheet">


  </head>
  <body>

    <nav class="navbar navbar-default navbar-static-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Users</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Dashboard <span class="sr-only">(current)</span></a></li>
            <?php
                if($_SESSION['type']=='Editor' || $_SESSION['type']=='Author' || $_SESSION['type']=='Administrator' || $_SESSION['type']=='Contributor'){
            ?>
            <li><a href="#">Posts</a></li>
            <li><a href="#">Comments</a></li>
            <?php
                }
                if($_SESSION['type']=='Editor' || $_SESSION['type']=='Author' || $_SESSION['type']=='Administrator'){
            ?>
            <li><a href="#">Categories &amp; Tags</a></li>
            <?php
                }
                if($_SESSION['type']=='Editor' || $_SESSION['type']=='Administrator'){
            ?>
            <li><a href="#">Pages</a></li>
            <li><a href="#">Statistics</a></li>
            <li><a href="#">Themes</a></li>
            <li><a href="#">Widgets</a></li>
            <?php
                }
                if($_SESSION['type']=='Administrator'){
            ?>
            <li><a href="#">Users Manager</a></li>
            <li><a href="#">Ads Control</a></li>
            <?php
                }
            ?>
            <li><a href="#">Settings</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo $_SESSION['fullname'] ?></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="../index.php">Visit Homepage</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <div class="jumbotron">
            <h2><?php echo $_SESSION['username'] ?></h2>
            <p>Welcome <?php echo $_SESSION['type'] ?></p>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
