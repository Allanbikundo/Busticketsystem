<?php
// include database configuration file
include 'dbConfig.php';
?>
<?php
 include 'layout/head.php';
include 'layout/nav.php';
?>
<body>
<div class="container">
    <h1>route</h1>
    <div id="products" class="row list-group">
        <?php
        if(isset($_GET['destination']) && $_GET['date'] !== ' '){
		        $searchdestination = $_GET['destination'];
            $searchdate = $_GET['date'];
            $_SESSION['phonenumber'] = $_GET['phone'];

      //echo "$returntrip";
      //check if date is valid
      //  echo "$searchdate";
        $date = date("Y-m-d");
        //echo "$date";
        if ($_GET['date'] >= $date) {
          //echo "the date input is invalid";



        //get rows query
        $query = $db->query("SELECT * FROM route WHERE route_name LIKE '%$searchdestination%' AND travel_date LIKE '%$searchdate%' ORDER BY id DESC LIMIT 10");
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
        ?>
        <div class=container>
            <div>
                <div>
                    <h4 class="list-group-item-heading"><?php echo $row["route_name"]; ?></h4>
                    <p class="list-group-item-text">Bus Company: <?php echo $row["company"]; ?></p>
                    <?php if (isset($_GET['return'])) {?>
                      <p class="list-group-item-text">The return trip is included</p>
                      <p class="list-group-item-text">Discount : <?php echo $row["discount"]; ?>%</p>
                    <?php } ?>
                    <div class="row">
                      <?php if (isset($_GET['return'])) {
                        //if the customer wants a return ticket
                        //echo $row["price"];
                        $returnprice = ($row["price"]*2)*((100-$row["discount"])/100);
                        $_SESSION['returntrip'] = $returnprice;
                        $_SESSION['TTIME'] = $row["travel_time"];
                        ?>
                        <div class="col-md-6">
                            <p class="lead"><?php echo $returnprice.' KSHS'; ?></p>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-success" href="cartAction.php?action=addreturntocart&id=<?php echo $row["id"]; ?>">Add to cart</a>
                        </div>
                    <?PHP //end of return
                  }?>
                    <?php if (!isset($_GET['return'])) {?>
                      <div class="col-md-6">
                          <p class="lead"><?php echo $row["price"].' KSHS';?></p>
                      </div>
                      <div class="col-md-6">
                          <a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Add to cart</a>
                      </div>
                    <?php } ?>

                    </div>
                </div>
            </div>
        </div>

        <?php } } else{ ?>
        <p>Our Christopher Colombus has not yet discovered that area</p>
        <?php }
      }
      else {
        echo "Hey there! im sorry but the date you have choosen is invalid please choose a day in the future or present. We cant go back in time YET bummer right ?:/";
        ?>
          <a class="btn btn-success" href="index.php">home</a>
        <?php
      }
      }
      ?>
    </div>
</div>
<?php include 'layout/footer.php'; ?>
</body>
</html>
