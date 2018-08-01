<?php
include "layout/head.php";
?>
<body>
      <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <?php
        include "layout/nav.php"
          ?>
            <div class="container">
              <?php
                $query = $dbh->query("SELECT * FROM route WHERE id = ".$productID);
                //this is for stripe
                require_once('config.php');
                //sgetting data from session
                $amount = $_SESSION['chargetotal'];
                $jinakamili = $_SESSION['jinakamili'];
                $token  = $_POST['stripeToken'];


                $customer = \Stripe\Customer::create(array(
                    'email' => $jinakamili,
                    'source'  => $token
                ));

                $charge = \Stripe\Charge::create(array(
                    'customer' => $customer->id,
                    'amount'   => $amount,
                    'currency' => 'usd'
                ));

                echo '<h1>Order Status</h1>';
                echo "The transaction has been completed succesfully";

                //$query = $dbh->query("SELECT * FROM route WHERE id = ".$productID);
                $insertOrder = $dbh->query("INSERT INTO booking (customer_id, total_price, created, modified) VALUES ('".$_SESSION['userid']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");

              ?>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  <script src='../assets/js/jquery.min.js'></script>
<script src='../assets/js/bootstrap.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
