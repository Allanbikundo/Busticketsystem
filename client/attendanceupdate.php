<?php
require_once('bgreen.php');
 
 $appender="";
 
 $Recordset2=mysqli_query($conn,"SELECT academicyear,term_default from academicyear where year_default='Yes'");
 $row_Recordset2 = mysqli_fetch_assoc($Recordset2);
 $academicyear=$row_Recordset2['academicyear'];
 $term_default=$row_Recordset2['term_default'];
 mysqli_free_result($Recordset2);
 

if(isset($_GET["attendance_clave"])){
$attendance_clave=GetSQLValueString($conn,$_GET["attendance_clave"],"int");
}
 
if(isset($_POST['bookinfo']))
{
 $size = count($_POST['bookinfo']);
   // start a loop in order to update each record
$i = 0;
while ($i < $size) {
// define each variable
$bookinfo= GetSQLValueString($conn,$_POST['bookinfo'][$i],"text");//$_POST['bookinfo'][$i];   //mark_attained
$bookinfo2= GetSQLValueString($conn,$_POST['bookinfo2'][$i],"text");//$_POST['bookinfo2'][$i];   //student_id
$bookinfo3= GetSQLValueString($conn,$_POST['bookinfo3'][$i],"int");//$_POST['bookinfo2'][$i];   //attendance_id
//$progress=$progress.$bookinfo;
$attendance_clave=$bookinfo3;

$sql="update attendancecheck set present=$bookinfo where attendance_id=$bookinfo3 and student_id=$bookinfo2";
$result=mysqli_query($conn,$sql);

 ++$i;
  
} //end while loop

if ($result)
{
//echo "Progess2:".$size."- ".$progress;
 $Recordset2=mysqli_query($conn,"SELECT academicyear,class_id,term_id from attendance where attendance_id=$attendance_clave");
 $row_Recordset2 = mysqli_fetch_assoc($Recordset2);
 $academicyearb=$row_Recordset2['academicyear'];
 $term_id=$row_Recordset2['term_id'];
 $class_id=$row_Recordset2['class_id'];
 header("location:attendancelist.php?id=0&&class_id=$class_id&&currentyear=$academicyearb&&term_id=$term_id");
}
else echo "your request has failed.";
 
}  //end GET

 
/*
$sql="SELECT @rownum:=@rownum+1 as rownum,id,amount,(select description from expenditure_items where id=expenditure.item_id) as item_id,DATE_FORMAT(date_spent, '%d/%m/%Y' ) as date_spent FROM (select @rownum:=0 ) r,expenditure where 1=1 ".$appender;
*/
//where (@rownum:=@rownum)<30

$sql="SELECT b.present, b.attendance_id,b.student_id,
(select concat_ws(' ',first_name,last_name,middle_name) from student where id=b.student_id) as student_name,
(select DATE_FORMAT(fecha, '%d/%m/%Y' ) from attendance where attendance_id=$attendance_clave ) as fecha,
(select count(*) from attendancecheck c where c.student_id=b.student_id and present='No' ) as days_absent,
(select count(*) from attendancecheck c where c.student_id=b.student_id and present='Yes' ) as days_present
 FROM attendancecheck b where b.attendance_id=$attendance_clave order by student_name ";

//and attendance_id in(select attendance_id from attendance where academicyear=$academicyear and term_id=$term_default )
//and attendance_id in(select attendance_id from attendance where academicyear=$academicyear and term_id=$term_default )  

$Recordset1=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);


 $Recordset2=mysqli_query($conn,"SELECT academicyear,term_default from academicyear where year_default='Yes'");
 $row_Recordset2 = mysqli_fetch_assoc($Recordset2);
 $academicyear=$row_Recordset2['academicyear'];
 $term_default=$row_Recordset2['term_default'];
 mysqli_free_result($Recordset2);
 

?> 
<HTML>
<HEAD> <TITLE>  Update attendance  </TITLE>
<script type="text/javascript" src="calendar3.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <LINK href="shibs.css" rel="StyleSheet" type="text/css"></LINK>
	

<?php
echo "<SCRIPT Language='JavaScript'>";

echo "function delconf() {" ;
//echo "if (document.".$formName.".FormAction.value == 'delete')" ;
echo "return confirm('WARNING: The operation you are about to undertake is serious. Are you sure you want to Alter the details? The action cannot be undone!');";
echo "}";
echo "</SCRIPT>";

 ?> 
 
 

</HEAD>

<BODY  >
<?php  include('top.php');  ?>

 <table width="947" bgcolor="#999999" align="center">
  <tr  valign="top">
    <td height="438"  > 
	
	
<?php include("menu.php");  ?>

 <br>Update attendance

<table width="918" border="1">
  <tr>
     
	<th width="153">Name</th>
	<th width="93">Days Present</th>
	<th width="93">Days Absent</th>
    <th width="123">Present?</th>
    <th width="62">Date</th>
	  
	 
     
  </tr>
 <form name='form12' action="attendanceupdate.php" method="post" > 
   
    <?php $i = 0; do { ?>
	<?php if($row_Recordset1['attendance_id']>0){?>
    <tr>
	 
    <td width="153" align="center"><?php echo $row_Recordset1['student_name']; ?></td> 
	<td width="153" align="center"><?php echo $row_Recordset1['days_present']; ?></td> 
	<td width="153" align="center"><?php echo $row_Recordset1['days_absent']; ?></td> 
    <td width="193" align="center">
	<select type="checkbox" name='bookinfo[<?php echo $i; ?>]' id='bookinfo[<?php echo $i; ?>]'>
	<option value="Yes" <?php if($row_Recordset1['present']=='Yes'){ echo 'selected="selected"'; }?> >Yes</option> 
	<option value="No"  <?php if($row_Recordset1['present']=='No') { echo 'selected="selected"'; }?> >No</option>
	</select>
	<?php // never worked /*<input type="checkbox" name='bookinfo[<?php echo $i; >]' id='bookinfo[<?php echo $i; >]' value='<?php echo $row_Recordset1['present'];  >' <?php if($row_Recordset1['present']=='No'){echo 'checked="checked"';} > ></input> */
	 ?>
	<input type='hidden' size='10' name='bookinfo2[<?php echo $i; ?>]' value='<?php echo $row_Recordset1['student_id']; ?>' ></input>
	<input type='hidden' size='10' name='bookinfo3[<?php echo $i; ?>]' value='<?php echo $row_Recordset1['attendance_id']; ?>' ></input>
	<input type='hidden'  name='edit_new' value='1' ></input>
		</td>
    <td width="62" align="center"><?php echo $row_Recordset1['fecha']; ?></td>

   
	 
  </tr> 
  
	  <?php ++$i; }?>
      <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
 	  <input type="submit" value="Save"> 
	  
	  
	    
 </form>
</table>
 
 

	</td>
</tr></table>

  
</BODY>
</HTML>
<?php include("footer.php");  ?>