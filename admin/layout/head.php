<?php
include "../config.php";
session_start();
if(!isset($_SESSION['username'])){
    ?>
<script>location.href='../blog/index.php'</script>
    <?php
}
?>
<head>
   <meta charset="UTF-8">
   <title>Bus Reservation- Admin Panel</title>


   <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>


       <link rel="stylesheet" href="css/style.css">
       <link rel="stylesheet" href="css/cards.css">
       <link rel="stylesheet" href="../assets/css/font-awesome.min.css">


 </head>
