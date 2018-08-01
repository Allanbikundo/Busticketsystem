<!DOCTYPE html>
<html >
<?php
include "layout/head.php";
include "layout/nav.php";
if ($_SESSION['type'] != "Administrator") {
 ?>
 <div class="main">
   <div class="jumbotron">
  <h1>Hello, <?php echo $_SESSION['username'] ?></h1>
  <p>You dont have sufficient privilages to view this page</p>
</div>
 <?php
}else{
 ?>

<!-- Content -->
<div class="main">
  <div class="jumbotron">
 <h1>Hello, <?php echo $_SESSION['username'] ?></h1>
 <p>Generate Reports down below</p>
</div>
  <a href="reports/buses.php" class="btn btn-info" role="button" style="margin: 100px;">Our Buses</a>
  <a href="reports/drivers.php" class="btn btn-info" role="button" style="margin: 100px;"> Our Drivers</a>
  <a href="reports/routes.php" class="btn btn-info" role="button" style="margin: 100px;">Routes</a>
<?php
include "layout/footer.php";
}
 ?>
