<!DOCTYPE html>
<html >
<?php
include "layout/head.php";
 include "layout/nav.php";
  ?>
  <div class="main">
    <h1>View Bookings</h1>
    <table class="table">
      <thead>
        <th>Customer_id</th>
        <th>Email</th>
        <th>Bus Company</th>
        <th>Number Plate</th>
        <th>Amount Paid</th>
        <th>When Booked</th>
        <th>When Paid</th>
      </thead>
    <?php
    include_once 'db.php';
    $res = $MySQLiconn->query("SELECT * FROM booking JOIN order_items ON order_items.order_id=booking.id JOIN user_login ON booking.customer_id=user_login.id JOIN route ON order_items.route_id=route.id WHERE company LIKE '%".$_SESSION['username']."%'" );
    while($row=$res->fetch_array())
    {?>
        <tbody>
          <td><?php echo $row['customer_id']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['company']; ?></td>
          <td><?php echo $row['no_plate']; ?></td>
          <td><?php echo $row['total_price']; ?></td>
          <td><?php echo $row['created']; ?></td>
          <td><?php echo $row['modified']; ?></td>
        </tbody>

  <?php }?>
  </table>
 </div>
 <?php
include "layout/footer.php"
  ?>
