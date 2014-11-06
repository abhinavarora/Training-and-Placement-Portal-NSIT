<?php session_start();
		if($_SESSION['auth']!=1)
			header("Location:index.php");		
?>
<?php
if ($_SERVER["REQUEST_METHOD"] <> "POST")
header("Location:index.php");?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Add User Placements</title>
	</head>
<?php
$company = $_POST['company'];
$num= $_POST['placements'];
$grade=$_POST['grade'];
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("nsitonli_trndpl", $con);
switch($grade)
{
case 'Dream':
$field= 'job_1';
break;
case 'A++':
$field= 'job_2';
break;
case 'A+':
$field= 'job_3';
break;
case 'A':
$field= 'job_4';
break;
}
$count=0;
for($i=1;$i<=$num;$i++)
{$name="stud".$i;
$sql= "UPDATE placement SET ".$field. "='".$company."' WHERE roll_num = '".$_POST[$name]."'";
if (!mysql_query($sql,$con))
						{
						echo 'Error: ' . mysql_error();
						$count++;
						}
}
mysql_close($con);
			echo '<script type="text/javascript">alert("Placements successfully added!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=adduserplacement.php">';
					die();?>