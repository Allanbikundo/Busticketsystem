<?php
include "../config.php";
session_start();
if(!isset($_SESSION['username'])){
    ?>
<script>location.href='../blog/index.php'</script>
    <?php
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Bus reservation system</title>

  <link rel="stylesheet" href="../assets/css/normalize.css">
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
  <link rel='stylesheet prefetch' href='../assets/css/bootstrap.min.css'>


      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/style0.css">
      <link rel="stylesheet" href="hire.css">

       <script src="js/jquery-1.12.4.min.js"></script>
       <script src="js/jquery-ui.min.js"></script>

       <script src="../assets/js/bootstrap.min.js"></script>


</head>
