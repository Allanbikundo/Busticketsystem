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
   <div class="main">
      <div class="wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="page-header clearfix">
                          <h1 class="pull-left">View Company Managers</h1>
                      </div>
                      <?php
                      // Include config file
                      require_once 'config.php';

                      // Attempt select query execution
                      $sql = "SELECT * FROM user_login WHERE type='company manager'";
                      if($result = mysqli_query($link, $sql)){
                          if(mysqli_num_rows($result) > 0){
                              echo "<table class='table table-bordered table-striped'>";
                                  echo "<thead>";
                                      echo "<tr>";
                                          echo "<th>Full Names</th>";
                                          echo "<th>Email Address</th>";
                                          echo "<th>User Level</th>";
                                      echo "</tr>";
                                  echo "</thead>";
                                  echo "<tbody>";
                                  while($row = mysqli_fetch_array($result)){
                                      echo "<tr>";
                                          echo "<td>" . $row['fullname'] . "</td>";
                                          echo "<td>" . $row['email'] . "</td>";
                                          echo "<td>" . $row['type'] . "</td>";
                                      echo "</tr>";
                                  }
                                  echo "</tbody>";
                              echo "</table>";
                              // Free result set
                              mysqli_free_result($result);
                          } else{
                              echo "<p class='lead'><em>No records were found.</em></p>";
                          }
                      } else{
                          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                      }

                      // Close connection
                      mysqli_close($link);
                      ?>
 </div>
 <?php
include"layout/footer.php"
  ?>
