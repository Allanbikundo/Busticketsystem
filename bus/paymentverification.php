<!DOCTYPE html>
<html >
<?php
include "layout/head.php";
include "layout/nav.php";
include_once 'pcrud.php';
 ?>

<!-- Content -->
<div class="main">
  <h1>Payment verification</h1>
  <div>
  <form method="post">
  <table class="table">
    <thead>
      <th>Ticket Id</th>
      <th>Customer Id</th>
      <th>Total Price</th>
      <th>Created</th>
    </thead>
    <tbody>
      <td><input type="text" name="id" placeholder="Ticket ID" value="<?php if(isset($_GET['edit'])) echo $getROW['id'];  ?>" readonly/></td>
      <td><input type="text" name="customer_id" placeholder="Customer ID" value="<?php if(isset($_GET['edit'])) echo $getROW['customer_id'];  ?>" readonly/></td>
      <td><input type="text" name="total_price" placeholder="Total Price" value="<?php if(isset($_GET['edit'])) echo $getROW['total_price'];  ?>" readonly/></td>
      <td><input type="text" name="created" placeholder="Customer ID" value="<?php if(isset($_GET['edit'])) echo $getROW['created'];  ?>" readonly/></td>
      <tr>
      <td>
      <?php
      if(isset($_GET['edit']))
      {
      	?>
      	<button class="btn btn-success"type="submit" name="update" onclick="return confirm('Have you recieved the funds ?'); ">CONFIRM PAYMENT</button>
      	<?php
      }
      ?>
      </td>
      </tr>
    </tbody>
  </table>
  </form>

  <br /><br />

  <table class="table">
    <thead>
      <th>Ticket Id</th>
      <th>Customer Id</th>
      <th>Total Price</th>
      <th>When the ticket was bought</th>
      <th>Payment Status</th>
    </thead>
  <?php
  $res = $MySQLiconn->query("SELECT * FROM booking JOIN order_items ON order_items.order_id=booking.id  WHERE status LIKE '%0%' AND company_name LIKE '%".$_SESSION['username']."%'");
  while($row=$res->fetch_array())
  {
  	?>
      <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['customer_id']; ?></td>
      <td><?php echo $row['total_price']; ?></td>
  		<td><?php echo $row['created']; ?></td>
  		<td><?php echo $row['status']; ?></td>
      <td><a href="?edit=<?php echo $row['id']; ?>" onclick="return confirm('sure to confirm payment ?'); " >verify</a></td>
      </tr>
      <?php
  }
  ?>
  </table>
  </div>
  </center>

</div>
<?php
include "layout/footer.php";
 ?>
