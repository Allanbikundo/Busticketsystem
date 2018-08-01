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
   <script>
   $(function() {
     $( "#skills" ).autocomplete({
       source: 'search.php'
     });
   });
   </script>
   <div class="ui-widget">
    <label for="skills">Skills: </label>
    <input id="skills">
   </div>

 </div>
 <?php
include"layout/footer.php"
  ?>
