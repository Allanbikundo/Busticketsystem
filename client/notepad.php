<?php
// include database configuration file
include 'dbConfig.php';
?>
<?
$output = '';
?>
<div class="container">
  <h1>Products</h1>
<a href="viewCart.php" class="cart-link" title="View Cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
<div id="products" class="row list-group">
<?php
//get rows query
$query = $db->query("SELECT * FROM route");
if($query->num_rows > 0){
while($row = $query->fetch_assoc()){
?>
<div class="item col-lg-4">
<div class="thumbnail">
  <div class="caption">
      <h4 class="list-group-item-heading"><?php echo $row["route_name"]; ?></h4>
      <p class="list-group-item-text"><?php echo $row["discount"]; ?></p>
      <div class="row">
          <div class="col-md-6">
              <p class="lead"><?php echo '$'.$row["price"].' USD'; ?></p>
          </div>
          <div class="col-md-6">
              <a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Add to cart</a>
          </div>
      </div>
  </div>
</div>
</div>
<?php } }else{ ?>
<p>Product(s) not found.....</p>
<?php } ?>
</div>
<!-- /#page-content-wrapper -->

</div>



<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
