<?php
include "../config.php";
session_start();
if(!isset($_SESSION['username'])){
    ?>
<script>location.href='view_driver.php'</script>
    <?php
}
?>


<?php
//html starts here
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
	 <?php

	 	require_once 'dbconfig.php';

	 	if(isset($_GET['delete_id']))
	 	{
	 		// select image from db to delete
	 		$stmt_select = $DB_con->prepare('SELECT driver_pic FROM driver_details WHERE driver_id =:uid');
	 		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
	 		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
	 		unlink("DP/".$imgRow['driver_pic']);

	 		// it will delete an actual record from db
	 		$stmt_delete = $DB_con->prepare('DELETE FROM driver_details WHERE driver_id =:uid');
	 		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
	 		$stmt_delete->execute();

	 		header("Location: view_driver.php");
	 	}

	 ?>
	 <div class="container">
	 <div class="row">
	 <?php

	 	$stmt = $DB_con->prepare('SELECT driver_id, driver_name, driver_pic FROM driver_details ORDER BY driver_id DESC');
	 	$stmt->execute();

	 	if($stmt->rowCount() > 0)
	 	{
	 		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	 		{
	 			extract($row);
	 			?>
	 			<div class="col-xs-3">
	 				<p>Driver's Name  :</br><?php echo $driver_name; ?></p>
          <p>Drivers ID Number :</br><?php echo $driver_id; ?></p>
	 				<img src="DP/<?php echo $row['driver_pic']; ?>" class="img-rounded" width="250px" height="250px" />
	 				<p class="page-header">
	 				<span>
	 				<a class="btn btn-info" href="edit_driver.php?edit_id=<?php echo $row['driver_id']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a>
	 				<a class="btn btn-danger" href="?delete_id=<?php echo $row['driver_id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
	 				</span>
	 				</p>
	 			</div>
	 			<?php
	 		}
	 	}
	 	else
	 	{
	 		?>
	         <div class="col-xs-12">
	         	<div class="alert alert-warning">
	             	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
	             </div>
	         </div>
	         <?php
	 	}

	 ?>
	 </div>


	 </div>
 </div>
 <?php
include "layout/footer.php";
  ?>
