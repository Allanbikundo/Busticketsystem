<?php
include "layout/head.php";
  ?>
<body>
      <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <?php
        include "layout/nav.php";
          ?>
            <div class="container">
              <h1>Preview Order</h1>
              <?php
              if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
                if ($_REQUEST['action'] == 'quotation30' && !empty($_SESSION['userid'])) { ?>
              <h2>30 seater Bus</h2>
              <table class="table">
                <thead>
                  <th>Number of vehicles</th>
                  <th>Number of seats left</th>
                  <th>Number of days</th>
                  <th>Price</th>
                </thead>
                <tbody>
                  <td><?php echo $_SESSION['number_of_buses_30']; ?></td>
                  <td><?php echo $_SESSION['number_of_seats_left_30']; ?></td>
                  <td><?php echo $_SESSION['number_of_days']; ?></td>
                  <td><?php echo $_SESSION['price30']; ?></td>
                </tbody>
              </table>
              <a href="hireaction.php?action=quotation30" class="btn btn-success btn-block"></i>Hire vehicle(s)</a>
            <?php }
                if ($_REQUEST['action'] == 'quotation60' && !empty($_SESSION['userid'])) { ?>
              <h2>60 seater Bus</h2>
              <table class="table">
                <thead>
                  <th>Number of vehicles</th>
                  <th>Number of seats left</th>
                  <th>Number of days</th>
                  <th>Price</th>
                </thead>
                <tbody>
                  <td><?php echo $_SESSION['number_of_buses_60']; ?></td>
                  <td><?php echo $_SESSION['number_of_seats_left_60']; ?></td>
                  <td><?php echo $_SESSION['number_of_days']; ?></td>
                  <td><?php echo $_SESSION['price60']; ?></td>
                </tbody>
              </table>
              <a href="hireaction.php?action=quotation60" class="btn btn-success btn-block"></i>Hire vehicle(s)</a>
            <?php }
          }?>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  <script src='../assets/js/jquery.min.js'></script>
<script src='../assets/js/bootstrap.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
