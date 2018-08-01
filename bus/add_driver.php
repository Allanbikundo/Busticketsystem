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

	error_reporting( ~E_NOTICE ); // avoid notice

	require_once 'dbconfig.php';

	if(isset($_POST['btnsave']))
	{
		$driver_name = $_POST['driver_name'];// driver name
		$id_number = $_POST['driver_id'];

		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];


		if(empty($driver_name)){
			$errMSG = "Please Enter The Drivers Name.";
		}
		else if(empty($id_number)){
			$errMSG = "Please enter the drivers ID number.";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = 'DP/'; // upload directory

			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

			// rename uploading image
			$driver_pic = rand(1000,1000000).".".$imgExt;

			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$driver_pic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			}
		}


		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO driver_details(driver_id,driver_name,driver_pic) VALUES(:uid, :uname, :upic)');
			$stmt->bindParam(':uname',$driver_name);
			$stmt->bindParam(':uid',$id_number);
			$stmt->bindParam(':upic',$driver_pic);

			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:5;index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<div class="container">
	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>

<form method="post" enctype="multipart/form-data" class="form-horizontal">

	<table class="table table-bordered table-responsive">

    <tr>
    	<td><label class="control-label">Drivers Name</label></td>
        <td><input class="form-control" type="text" name="driver_name" placeholder="Drivers Name as on ID" value="<?php echo $driver_name; ?>" /></td>
    </tr>

    <tr>
    	<td><label class="control-label">ID number</label></td>
        <td><input class="form-control" type="text" name="driver_id" placeholder="ID number" value="<?php echo $id_number; ?>" /></td>
    </tr>

    <tr>
    	<td><label class="control-label">Driver's Photo</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>

    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>

    </table>

</form>
</div>
 </div>
 <?php
include"layout/footer.php"
  ?>
