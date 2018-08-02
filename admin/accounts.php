 <!DOCTYPE html>
 <html >
 <?php
	include "layout/head.php";
	include "layout/nav.php";
	?>
 <!-- Content -->
 <div class="main">
   <?php include('../bus/db.php');?>
   	<h1>Accounts</h1>
   	<?php
   		$total_qty=0;
   		//MySQLi OOP
   		$query=$MySQLiconn->query("SELECT * FROM booking order by id asc");
   		while($row=$query->fetch_array()) {
   			?>
   			<?php
   			$total_qty += $row['total_price'];
   		}
   	 		$card_sales=0;

     		$query=$MySQLiconn->query("SELECT * FROM booking WHERE status LIKE 0 order by id asc");
     		while($row=$query->fetch_array()) {
     			?>
     			<?php
     			$card_sales += $row['total_price'];
     		}
     	?>
      <?php
     		$cash_sales=0;

     		$query=$MySQLiconn->query("SELECT * FROM booking WHERE status LIKE 1 order by id asc");
     		while($row=$query->fetch_array()) {
     			?>
     			<?php
     			$cash_sales += $row['total_price'];
     		}
     	?>
      <table class="table">
        <thead>
          <th>Tickets not paid</th>
          <th>Tickets Paid</th>
          <th>Total sales</th>
        </thead>
        <tbody>
          <td><?php echo $card_sales; ?></td>
          <td><?php echo $cash_sales; ?></td>
          <td><?php echo $total_qty; ?></td>
        </tbody>
      </table>
 </div>
 <?php
  include "layout/footer.php"
  ?>
