<?php
include 'layout/head.php';
// include database configuration file
include 'dbConfig.php';
//include stripe config files
require_once('config.php');

// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: index.php");
}

// get customer details by session  userID
$query = $db->query("SELECT * FROM user_login WHERE id = ".$_SESSION['userid']);
$custRow = $query->fetch_assoc();

//include "layout/head.php"
  ?>
<body>
      <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <?php
        include "layout/nav.php"
          ?>
            <div class="container">
              <h1>Order Preview</h1>
              <table class="table">
              <thead>
                  <tr>
                      <th>Route</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Company</th>
                      <th>E.T.D</th>
                      <th>Subtotal</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  //var_dump($_SESSION);
                  if($cart->total_items() > 0){
                      //get cart items from session
                      $cartItems = $cart->contents();
                      foreach($cartItems as $item){
                  ?>
                  <tr>
                      <td><?php echo $item["route_name"]; ?></td>
                      <td><?php echo $item["price"].' KSHS'; ?></td>
                      <td><?php echo $item["qty"]; ?></td>
                      <td><?php echo $item["company"]; ?></td>
                      <td><?php echo $item['time']; ?></td>
                      <td><?php echo $item["subtotal"].' KSHS'; ?></td>
                  </tr>
                  <?php } }else{ ?>
                  <tr><td colspan="4"><p>youve not booked any buses</p></td>
                  <?php } ?>
              </tbody>
              <tfoot>
                  <tr>
                      <td colspan="5"></td>
                      <?php if($cart->total_items() > 0){ ?>
                      <td class="text-center"><strong>Total <?php echo $cart->total().' KSHS'; ?></strong></td>
                      <?php } ?>
                  </tr>
              </tfoot>
              </table>
              <?php
              $_SESSION['chargetotal'] = $cart->total();
              $_SESSION['jinakamili'] = $custRow['fullname'];
               ?>
              <div class="shipAddr">
                  <h4>Personal Details</h4>
                  <p><?php echo $custRow['fullname']; ?></p>
                  <p><?php echo $custRow['email']; ?></p>
                  <p><?php echo $_SESSION['phonenumber'] ?></p>

              </div>

              <div class="footBtn">
                  <a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Booking</a>
                  <a href="cartAction.php?action=placeOrder" class="btn btn-success orderBtn">Pay with cash <i class="glyphicon glyphicon-menu-right"></i></a>
              </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  <script src='../assets/js/jquery.min.js'></script>
<script src='../assets/js/bootstrap.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
