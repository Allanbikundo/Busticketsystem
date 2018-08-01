<?php
include "../config.php";
if (session_status()!=2) {
  session_start();
}
if(!isset($_SESSION['username'])){
    ?>
<script>location.href='index.php'</script>
    <?php
}
?>
<head>
   <meta charset="UTF-8">
   <title>Company Manager Profile</title>


   <link rel='stylesheet prefetch' href='../assets/css/bootstrap.min.css'>
   <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
   <link rel="stylesheet" href="css/cards.css">
   <link rel="stylesheet" href="css/style.css">

       <link rel="stylesheet" href="css/jquery-ui.min.css">
        <script src="js/jquery-1.12.4.min.js"></script>
         <script src="js/jquery-ui.min.js"></script>


 </head>
