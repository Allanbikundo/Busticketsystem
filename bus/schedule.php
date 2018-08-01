<?php
include_once 'db.php';

/* code for data insert */
if(isset($_POST['save']))
{

     $route_name = $MySQLiconn->real_escape_string($_POST['route_name']);
     $discount = $MySQLiconn->real_escape_string($_POST['discount']);
     $travel_time = $MySQLiconn->real_escape_string($_POST['travel_time']);
     $travel_date = $MySQLiconn->real_escape_string($_POST['travel_date']);
     $price = $MySQLiconn->real_escape_string($_POST['price']);
     $company = $MySQLiconn->real_escape_string($_POST['company']);
     $no_plate = $MySQLiconn->real_escape_string($_POST['no_plate']);

	 $SQL = $MySQLiconn->query("INSERT INTO route(route_name,price,discount,travel_time,travel_date,company,no_plate) VALUES('$route_name','$price','$discount','$travel_time','$travel_date','$company','$no_plate')");

	 if(!$SQL)
	 {
		 echo $MySQLiconn->error;
	 }
}

/* code for data insert */


/* code for data delete */
if(isset($_GET['del']))
{
	$SQL = $MySQLiconn->query("DELETE FROM route WHERE id=".$_GET['del']);
	header("Location: schedule.php");
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM route WHERE id=".$_GET['edit']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
	$SQL = $MySQLiconn->query("UPDATE data SET company='".$_POST['company']."', no_plate='".$_POST['no_plate']."', travel_date='".$_POST['travel_date']."', travel_time='".$_POST['travel_time']."', discount='".$_POST['discount']."', route_name='".$_POST['route_name']."', price='".$_POST['price']."' WHERE id=".$_GET['edit']);
	header("Location: schedule.php");
}
/* code for data update */

?>
 <!DOCTYPE html>
 <html >
 <?php
include "layout/head.php"
  ?>
 <?php
 include "layout/nav.php"
  ?>

 <!-- Content -->
 <div class="main">
   <div id="form">
     <script>
     $(function() {
       $( "#no_plate" ).autocomplete({
         source: 'search.php'
       });
     });
     </script>
  <h1>Add schedule</h2>
   <form method="post">
     <table class="table">
       <thead>
         <th>Route name</th>
         <th>Travel time</th>
         <th>Travel Date</th>
         <th>Number Plate</th>
         <th>Price</th>
         <th>Discount</th>
         <th>Company</th>
         <th></th>
       </thead>
       <tbody>
         <td> <select name="route_name" value="<?php if(isset($_GET['edit'])) echo $getROW['route_name'];  ?>" required>
           <option>Nairobi-Mombasa</option>
           <option>Nairobi-Kisumu</option>
           <option>Nairobi-Busia</option>
           <option>Nairobi-Kakamega</option>
           <option>Nairobi-Kampala</option>
           <option>Nairobi-Eldoret</option>
           <option>Mombasa-Nairobi</option>
           <option>Kisumu-Nairobi</option>
           <option>Busia-Nairobi</option>
           <option>Kakamega-Nairobi</option>
           <option>Eldoret-Nairobi</option>
         </select></td>
         <td><input type="time" name="travel_time" placeholder="travel_time" value="<?php if(isset($_GET['edit'])) echo $getROW['travel_time'];  ?>" required/></td>
         <td><input type="date" name="travel_date" placeholder="travel_date" value="<?php if(isset($_GET['edit'])) echo $getROW['travel_date'];  ?>" required/></td>
         <td><input id="no_plate" type="text" name="no_plate" placeholder="no_plate" value="<?php if(isset($_GET['edit'])) echo $getROW['no_plate'];  ?>" required/></td>
         <td><input type="number" name="price" placeholder="price" value="<?php if(isset($_GET['edit'])) echo $getROW['price'];  ?>" required/></td>
         <td><input type="number" name="discount" placeholder="discount" value="<?php if(isset($_GET['edit'])) echo $getROW['discount'];  ?>" required/></td>
           <td><select name="company" value="<?php if(isset($_GET['edit'])) echo $getROW['company'];  ?>">
            <option><?php echo $_SESSION['username'] ?></option>
          </select></td>
       </tbody>
     </table>
   <?php
   if(isset($_GET['edit']))
   {
    ?>
    <button type="submit" name="update">update</button>
    <?php
   }
   else
   {
    ?>
    <button type="submit" name="save">save</button>
    <?php
   }
   ?>
   </td>
   </tr>
 </div>
   </form>

   <br /><br />

   <h1>Review Schedule</h1>

   <table class="table">
     <thead>
       <th>id</th>
       <th>Route Name</th>
       <th>Price</th>
       <th>Discount</th>
       <th>Travel Time</th>
       <th>Travel Date</th>
       <th>No. Plate</th>
       <th>Company</th>
     </thead>
   <?php
   $res = $MySQLiconn->query("SELECT * FROM route" );
   while($row=$res->fetch_array())
   {
    ?>
       <tr>
       <td><?php echo $row['id']; ?></td>
       <td><?php echo $row['route_name']; ?></td>
       <td><?php echo $row['price']; ?></td>
       <td><?php echo $row['discount']; ?></td>
       <td><?php echo $row['travel_time']; ?></td>
       <td><?php echo $row['travel_date']; ?></td>
       <td><?php echo $row['no_plate']; ?></td>
       <td><?php echo $row['company']; ?></td>
       <td><a href="?edit=<?php echo $row['id']; ?>" onclick="return confirm('sure to edit !'); " >edit</a></td>
       <td><a href="?del=<?php echo $row['id']; ?>" onclick="return confirm('sure to delete !'); " >delete</a></td>
       </tr>
       <?php
   }
   ?>
   </table>
   </div>
 </div>
 <?php
include "layout/footer.php"
  ?>
