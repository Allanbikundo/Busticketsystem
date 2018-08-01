<?php

include_once 'db.php';


/* code for data insert */
if(isset($_POST['save']))
{

     $no_plate = $MySQLiconn->real_escape_string($_POST['no_plate']);
     $route = $MySQLiconn->real_escape_string($_POST['route']);
     $no_of_seats = $MySQLiconn->real_escape_string($_POST['no_of_seats']);
     $company = $MySQLiconn->real_escape_string($_POST['company']);
     $driver_id = $MySQLiconn->real_escape_string($_POST['driver_id']);

	 $SQL = $MySQLiconn->query("INSERT INTO bus_details(no_plate,no_of_seats,route,company,driver_id) VALUES('$no_plate','$no_of_seats','$route','$company','$driver_id')");

	 if(!$SQL)
	 {
		 echo $MySQLiconn->error;
	 }
   //code for inserting seats
   $a = 1;
   $column = 1;
   if ($_POST['no_of_seats'] == 30) {
     do {
       if ($a <= 5) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','1_$column')");
         $a++;
         $column++;
           if ($column > 5) {
             $column = 1;
           }
       }
       elseif ($a <= 10) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','2_$column')");
         $a++;
         $column++;
         if ($column > 5) {
           $column = 1;
         }
       }
       elseif ($a <= 15) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','3_$column')");
         $a++;
         $column++;
         if ($column > 5) {
           $column = 1;
         }
       }
       elseif ($a <= 20) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','4_$column')");
         $a++;
         $column++;
         if ($column > 5) {
           $column = 1;
         }
       }
       elseif ($a <= 25) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','5_$column')");
         $a++;
         $column++;
         if ($column > 5) {
           $column = 1;
         }
       }
       elseif ($a <= 30) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','6_$column')");
         $a++;
         $column++;
         if ($column > 5) {
           $column = 1;
         }
       }
       elseif ($a <= 35) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','7_$column')");
         $a++;
         $column++;
         if ($column > 5) {
           $column = 1;
         }
       }
       else {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','8_$column')");
         $a++;
         $column++;
         if ($column > 5) {
           $column = 1;
         }
       }
       //$column = 1;
       //$a++;
       //$SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','$a')");
     } while ($a <= 40);
   }
   if ($_POST['no_of_seats'] == 60) {
     do {
       if ($a <= 6) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','1_$column')");
         $a++;
         $column++;
           if ($column > 6) {
             $column = 1;
           }
       }
       elseif ($a <= 12) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','2_$column')");
         $a++;
         $column++;
         if ($column > 6) {
           $column = 1;
         }
       }
       elseif ($a <= 18) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','3_$column')");
         $a++;
         $column++;
         if ($column > 6) {
           $column = 1;
         }
       }
       elseif ($a <= 24) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','4_$column')");
         $a++;
         $column++;
         if ($column > 6) {
           $column = 1;
         }
       }
       elseif ($a <= 30) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','5_$column')");
         $a++;
         $column++;
         if ($column > 6) {
           $column = 1;
         }
       }
       elseif ($a <= 36) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','6_$column')");
         $a++;
         $column++;
         if ($column > 6) {
           $column = 1;
         }
       }
       elseif ($a <= 42) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','7_$column')");
         $a++;
         $column++;
         if ($column > 6) {
           $column = 1;
         }
       }
       elseif ($a <= 48) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','8_$column')");
         $a++;
         $column++;
         if ($column > 6) {
           $column = 1;
         }
       }
       elseif ($a <= 54) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','9_$column')");
         $a++;
         $column++;
         if ($column > 6) {
           $column = 1;
         }
       }
       elseif ($a <= 60) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','10_$column')");
         $a++;
         $column++;
         if ($column > 6) {
           $column = 1;
         }
       }
       elseif ($a <= 66) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','11_$column')");
         $a++;
         $column++;
         if ($column > 6) {
           $column = 1;
         }
       }
       elseif ($a <= 72) {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','12_$column')");
         $a++;
         $column++;
         if ($column > 6) {
           $column = 1;
         }
       }
       else {
         $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','13_$column')");
         $a++;
         $column++;
         if ($column > 6) {
           $column = 1;
         }
       }
       //$column = 1;
       //$a++;
       //$SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','$a')");
     } while ($a <= 78);
   }
   }

/* code for data insert */


/* code for data delete */
if(isset($_GET['del']))
{
	$SQL = $MySQLiconn->query("DELETE FROM bus_details WHERE driver_id=".$_GET['del']);
//  $SQL = $MySQLiconn->query("DELETE FROM seat WHERE no_plate=".$_GET['del']);

	header("Location: add_bus.php");
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM bus_details WHERE driver_id=".$_GET['edit']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
	$SQL = $MySQLiconn->query("UPDATE bus_details SET route='".$_POST['route']."', no_plate='".$_POST['no_plate']."', no_of_seats='".$_POST['no_of_seats']."' WHERE driver_id=".$_GET['edit']);
	header("Location: add_bus.php");
}
/* code for data update */

?>
