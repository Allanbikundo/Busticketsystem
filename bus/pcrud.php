<?php

include_once 'db.php';

/* code for data update */
if(isset($_GET['edit']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM booking WHERE id=".$_GET['edit']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
	$SQL = $MySQLiconn->query("UPDATE booking SET id='".$_POST['id']."', customer_id='".$_POST['customer_id']."',total_price='".$_POST['total_price']."' ,modified='".date("Y-m-d H:i:s")."',status='1' WHERE id=".$_GET['edit']);
	header("Location: index.php");
}
/* code for data update */

?>
