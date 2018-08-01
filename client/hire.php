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
      <form id="form" action = "calc.php" method = "post">
          <input placeholder="Enter number of people" type = "number" name = "no_people" size = "10">
          <input placeholder="Number of Days" type = "number" name = "days" size = "10">
          <input type = "submit" value = "Calculate">
          <input type = "reset" value = "Clear">
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  <script src='../assets/js/jquery.min.js'></script>
<script src='../assets/js/bootstrap.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
