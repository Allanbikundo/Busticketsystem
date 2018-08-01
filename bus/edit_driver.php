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

	error_reporting( ~E_NOTICE );

	require_once 'dbconfig.php';

	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT driver_name, driver_pic FROM driver_details WHERE driver_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: view_driver.php");
	}



	if(isset($_POST['btn_save_updates']))
	{
		$username = $_POST['user_name'];// user name
		$userjob = $_POST['user_job'];// user email

		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];

		if($imgFile)
		{
			$upload_dir = 'DP/'; // upload directory
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['driver_pic']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			}
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $edit_row['driver_pic']; // old image from database
		}


		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE driver_details
									     SET driver_name=:uname,
										     driver_pic=:upic
								       WHERE driver_id=:uid');
			$stmt->bindParam(':uname',$username);
			//$stmt->bindParam(':ujob',$userjob);
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);

			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='view_driver.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}

		}


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
<div class="container">


	<div class="page-header">
    	<h1>Edit <?php echo $driver_name; ?>'s Profile</h1>
    </div>

<div class="clearfix"></div>

<form method="post" enctype="multipart/form-data" class="form-horizontal">


    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>


	<table class="table table-bordered table-responsive">

    <tr>
    	<td><label class="control-label">Driver's Name.</label></td>
        <td><input class="form-control" type="text" name="user_name" value="<?php echo $driver_name; ?>" required /></td>
    </tr>

    <!--<tr>
    	<td><label class="control-label">Id Number.</label></td>
        <td><input class="form-control" type="text" name="user_job" value="<?php// echo $driver_id; ?>" required /></td>
    </tr>-->

    <tr>
    	<td><label class="control-label">Drivers Photo.</label></td>
        <td>
        	<p><img src="DP/<?php echo $driver_pic; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>

    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>

        <a class="btn btn-default" href="view_driver.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>

        </td>
    </tr>

    </table>

</form>
<?php
include"layout/footer.php"
 ?>
