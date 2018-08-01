<?php
include_once 'crud.php';

include_once "layout/head.php";

include 'layout/nav.php';
?>
<body>
<div class="main">
<div>
<form method="post">
<table width="100%" border="1" cellpadding="15">
<tr>
<td><input type="text" name="type_of_bus" placeholder="First Name" value="<?php if(isset($_GET['edit'])) echo $getROW['type_of_bus'];  ?>" /></td>
</tr>
<tr>
<td><input type="text" name="price" placeholder="Last Name" value="<?php if(isset($_GET['edit'])) echo $getROW['price'];  ?>" /></td>
</tr>
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
</table>
</form>

<br /><br />

<table width="100%" border="1" cellpadding="15" align="center">
<?php
$res = $link->query("SELECT * FROM hire");
while($row=$res->fetch_array())
{
	?>
    <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['type_of_bus']; ?></td>
    <td><?php echo $row['price']; ?></td>
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
