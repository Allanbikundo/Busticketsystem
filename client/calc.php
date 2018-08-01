<?php
//include stripe config files
require_once('config.php');
include "layout/head.php"
  ?>
<body>
      <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <?php
        include "layout/nav.php"
          ?>
            <div class="container">
              <?php //test stuff ?>

              <?php
              //number of people
              $a = $_POST['no_people'];
              $days = $_POST['days'];
              if(is_numeric($a) )
              {
              //types of buses
              $b = 30;
              $c = 60;
              //price of buuses
              $g =2000;
              $h = 1600;
              //maths
              //calculate number of 30 pass vehicles by dividing number of people by bus capcity
              $e = $a / $b;
              $f = $a / $c;
              //get the rounded of value it rounds of if theres a decimal
              $k = ceil($e);
              $l = ceil($f);
              //get the number of people left
              if ($_POST['no_people'] < 30) {
                $left30 = 30 - $_POST['no_people'];
              }else {
                $left30 = ($_POST['no_people']%30);
              }
              if ($_POST['no_people'] < 60 ) {
                $left60 = 60 - $_POST['no_people'];
              }else {
                $left60 = ($_POST['no_people']%60);
              }
              //price to hire
              $price60 = $l * $h * $days;
              $price30 = $k * $g * $days;
              //saving data to session
              //prices
              $_SESSION['price30'] = $price30;
              $_SESSION['price60'] = $price60;
              //number of buses
              $_SESSION['number_of_buses_30'] = ceil($e);
              $_SESSION['number_of_buses_60'] = ceil($f);
              //number of seats left
              $_SESSION['number_of_seats_left_30'] = $left30;
              $_SESSION['number_of_seats_left_60'] = $left60;
              //number of days
              $_SESSION['number_of_days'] = $days;

              ?>
                <div class="container">
                  <section>
                      <h3>Price List</h3>
                      <p class="section-lead">insert promo stuff</p>
                      <div class="services-grid">
                        <div class="service service1">
                          <h3>30 passenger seats</h3>
                          <h5>Number of vehicles</h5>
                          <p><?php echo ceil($e); ?></p>
                          <h5>Number of seats left</h5>
                          <p><?php echo $left30;?></p>
                          <h5>Number of days</h5>
                          <p><?php print $days; ?></p>
                          <h5>Price</h5>
                          <p><?php print $price30; ?></p>
                          <a href="hirepreview.php?action=quotation30" class="cta">Preview Order<span class="ti-angle-right"></a>
                        </div>

                        <div class="service service2">
                          <h3>60 passenger seats</h3>
                          <h5>Number of vehicles</h5>
                          <p><?php echo ceil($f); ?></p>
                          <h5>Number of seats left</h5>
                          <p><?php echo $left60;?></p>
                          <h5>Number of days</h5>
                          <p><?php print $days; ?></p>
                          <h5>Price</h5>
                          <p><?php print $price60; ?></p>
                        <a href="hirepreview.php?action=quotation60" class="cta">Preview Order <span class="ti-angle-right"></a>
                        </div>
                      </div>
                    </section>
                </div>
        </div>
        </div>
        <?php  }else {
            echo "input numbers please things like 0-9";?>
            <a href="hire.php" class="btn btn-success btn-block"><i class="glyphicon glyphicon-menu-left"></i>Back to hire </a>
          <?php }
            ?>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  <script src='../assets/js/jquery.min.js'></script>
  <script src='../assets/js/bootstrap.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
