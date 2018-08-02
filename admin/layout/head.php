<?php
include "../config.php";
session_start();
//check if the user has beem logged in
if(!isset($_SESSION['username'])){
    ?>
<script>location.href='../blog/index.php'</script>
    <?php
}
//check if the user has admin privilages
 if ($_SESSION['type'] != "Administrator") { ?>
     <script>location.href='../blog/index.php'</script>
 <?php } ?>
<head>
   <meta charset="UTF-8">
   <title>Bus Reservation- Admin Panel- <!--Add file name --></title>


   <link rel='stylesheet prefetch' href='../assets/css/bootstrap.min.css'>


       <link rel="stylesheet" href="css/style.css">

       <!-- Add if statement to only load this css on the dashboard -->
       <link rel="stylesheet" href="css/cards.css">
       <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

 </head>

 <!-- the administrator privilage check will be added to head -->

 
