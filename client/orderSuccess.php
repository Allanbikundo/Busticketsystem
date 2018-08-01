<?php
if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
?>
<?php
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
              <div class="container">
                  <h1>Order Status</h1>
                  <p>Your ticket order has submitted successfully.The ticket ID is #<?php echo $_GET['id']; ?></p>
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
