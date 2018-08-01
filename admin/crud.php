<?php

include_once 'config.php';

/* code for data insert */
if(isset($_POST['save']))
{

     $type_of_bus = $link->real_escape_string($_POST['type_of_bus']);
     $price = $link->real_escape_string($_POST['price']);

	 $SQL = $link->query("INSERT INTO hire(type_of_bus,price) VALUES('$type_of_bus','$price')");

	 if(!$SQL)
	 {
		 echo $link->error;
	 }
}
/* code for data insert */


/* code for data delete */
if(isset($_GET['del']))
{
	$SQL = $link->query("DELETE FROM hire WHERE id=".$_GET['del']);
	header("Location: hire.php");
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
	$SQL = $link->query("SELECT * FROM hire WHERE id=".$_GET['edit']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
	$SQL = $link->query("UPDATE hire SET type_of_bus='".$_POST['type_of_bus']."', price='".$_POST['price']."' WHERE id=".$_GET['edit']);
	header("Location: index.php");
}
/* code for data update */

?>
