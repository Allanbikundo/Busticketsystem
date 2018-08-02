<!DOCTYPE html>
 <html >
 <?php
  include "layout/head.php";
  include "layout/nav.php";
  ?>
 <!-- Content -->
 <div class="main">
   <div class="jumbotron">
  <h1>Hello, <?php echo $_SESSION['username'] ?></h1>
  <p>This dashboard will give you a statistical summary of the company</p>
</div>
<div>
  <?php
  $mysqli = new mysqli("localhost", "root", "", "bus");

  /* check connection */
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }

  if ($result = $mysqli->query("SELECT id FROM user_login ORDER BY id")) {

      /* determine number of rows result set */
      $no_users = $result->num_rows;

      /* close result set */
      $result->close();
  }

  if ($result = $mysqli->query("SELECT driver_id FROM driver_details ORDER BY driver_id")) {

      /* determine number of rows result set */
      $drv_cnt = $result->num_rows;

      /* close result set */
      $result->close();
  }

  if ($result = $mysqli->query("SELECT id FROM route ORDER BY id")) {

      /* determine number of rows result set */
      $route_cnt = $result->num_rows;

      /* close result set */
      $result->close();
  }
  if ($result = $mysqli->query("SELECT no_plate FROM bus_details")) {

      /* determine number of rows result set */
      $bus_cnt = $result->num_rows;

      /* close result set */
      $result->close();
    }
  if ($result = $mysqli->query("SELECT id FROM booking")) {

      /* determine number of rows result set */
      $book_cnt = $result->num_rows;

      /* close result set */
      $result->close();
      }
  if ($result = $mysqli->query("SELECT id FROM hires")) {

      /* determine number of rows result set */
      $hire_cnt = $result->num_rows;

      /* close result set */
      $result->close();
      }
  ?>
</div>
<div>
  <ul>
  <li class="card">
    <div class="card__flipper">
      <div class="card__front">
        <p class="card__name"><span>Number of</span><br>Buses</p>
        <p class="card__num"><?php   printf($bus_cnt); ?></p>
      </div>
    </div>
  </li>
  <li class="card">
    <div class="card__flipper">
       <div class="card__front">
         <p class="card__name"><span>Number of</span><br>Routes</p>
        <p class="card__num"><?php printf($route_cnt); ?></p>
      </div>
    </div>
  </li>
  <li class="card">
    <div class="card__flipper">
       <div class="card__front">
        <p class="card__name"><span>Number of</span><br>Drivers</p>
        <p class="card__num"><?php   printf($drv_cnt); ?></p>
      </div>
    </div>
  </li>
  <li class="card">
    <div class="card__flipper">
       <div class="card__front">
        <p class="card__name"><span>Number of</span><br>Customers</p>
        <p class="card__num"><?php printf($no_users); ?></p>
      </div>
    </div>
  </li>
  <li class="card">
    <div class="card__flipper">
       <div class="card__front">
        <p class="card__name"><span>Number of</span><br>Bookings</p>
        <p class="card__num"><?php   printf($book_cnt); ?></p>
      </div>
    </div>
  </li>
  <li class="card">
    <div class="card__flipper">
       <div class="card__front">
        <p class="card__name"><span>Number of</span><br>Hires</p>
        <p class="card__num"><?php   printf($hire_cnt); ?></p>
      </div>
    </div>
  </li>
</ul>
</div>
 </div>
 <?php
include "layout/footer.php"
  ?>
