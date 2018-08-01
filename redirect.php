<?php
include "config.php";
session_start();
if(!isset($_SESSION['username'])){
    ?>
<script>location.href='index.php'</script>
    <?php
}
if($_SESSION['type']=='Client'){
  //echo "tuko hapa sasa";
  header('location: client/index.php');
}
if($_SESSION['type']=='Administrator'){
  //echo "tuko hapa sasa";
  header('location: admin/index.php');
}
if($_SESSION['type']=='Company Manager'){
  //echo "im a bus company";
  header('location: bus/index.php');
}
?>
