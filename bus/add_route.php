<?php
include "../config.php";
session_start();
if(!isset($_SESSION['username'])){
    ?>
<script>location.href='index.php'</script>
    <?php
}
?>


<?php
//html starts here
 ?>

 <!DOCTYPE html>
 <html >
 <?php
include "layout/head.php"
  ?>
 <?php
 include "layout/nav.php"
  ?>

 <!-- Content -->
 <div class="main">
   <form id="form1" name="form1" method="post" action="aroute.php">
   <label for="route_name">Route Name</label><input type="text" name="route_name" id="route_name" />
   <br class="clear" />
   <label for="price">Price</label><input type="text" name="price" id="price" />
   <br class="clear" />
   <label for="discount">Discount</label><input type="text" name="discount" id="discount" />
   <br class="clear" />
   <tr>
       <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
       <span class="glyphicon glyphicon-save"></span> &nbsp; save
       </button>
       </td>
   </tr>
   </form>
 </div>
 <?php
include"layout/footer.php"
  ?>
