<?php
include_once 'crud.php';
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
   <h1>Add Bus</h1>
   <div id="form">
   <form method="post">
    <table class="table">
      <thead>
        <th>Number Plate</th>
        <th>Bus Capacity</th>
        <th>route</th>
        <th>Company</th>
        <th>Id number</th>
      </thead>
      <tbody>
        <td><input type="text" name="no_plate" placeholder="Number Plate" value="<?php if(isset($_GET['edit'])) echo $getROW['no_plate'];  ?>" required/></td>
          <td>
            <select name="no_of_seats" value="<?php if(isset($_GET['edit'])) echo $getROW['no_of_seats'];  ?>" required>
            <option>30</option>
            <option>60</option>
          </select>
        </td>
          <td><select name="route" value="<?php if(isset($_GET['edit'])) echo $getROW['route'];  ?>" required>
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
          <td><select name="company" value="<?php if(isset($_GET['edit'])) echo $getROW['company'];  ?>">
           <option><?php echo $_SESSION['username'] ?></option>
         </select></td>
        <script>
         $(function() {
           $( "#drivers" ).autocomplete({
             source: 'search/search_driver.php'
           });
         });
         </script>
           <td>
            <input name="driver_id" value="<?php if(isset($_GET['edit'])) echo $getROW['driver_id'];  ?>"id="drivers" placeholder="INPUT DRIVER ID No.">
          </td>
      </tbody>
    </table>
   <tr>
   <td>
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
   </form>

   <br /><br />

   <h1>Review Buses</h1>
   <table class="table">
     <thead>
       <th>Driver Id</th>
       <th>Number plate</th>
       <th>Number of seats</th>
       <th>Route</th>
       <th>Company</th>
     </thead>
   <?php
   $res = $MySQLiconn->query("SELECT * FROM bus_details" );
   while($row=$res->fetch_array())
   {
   	?>
        <tbody>
          <tr>
          <td><?php echo $row['driver_id']; ?></td>
          <td><?php echo $row['no_plate']; ?></td>
          <td><?php echo $row['no_of_seats']; ?></td>
          <td><?php echo $row['route']; ?></td>
          <td><?php echo $row['company']; ?></td>
          <td><a href="?edit=<?php echo $row['driver_id']; ?>" onclick="return confirm('sure to edit !'); " >edit</a></td>
          <td><a href="?del=<?php echo $row['driver_id']; ?>" onclick="return confirm('sure to delete !'); " >delete</a></td>
          </tr>
        </tbody>
       <?php
   }
   ?>
   </table>
   </div>
   </center>
 </div>
 <?php
include "layout/footer.php"
  ?>
