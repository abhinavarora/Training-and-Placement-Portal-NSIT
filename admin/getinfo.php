<?php session_start();

		if($_SESSION['auth']!=1)
{
			header("Location:index.php");		
			die();
}			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
if (!isset($_GET['c']))
{echo '<meta http-equiv="Refresh" content="0;
URL=index.php">';
die();
}
$company=$_GET['c'];
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("nsitonli_trndpl", $con);
$result= mysql_query("SELECT * FROM company WHERE name='$company'");
$row = mysql_fetch_array($result);
$str = "Name: <i>".$row[name]."</i><br />Grade: <i>".$row[grade].
"</i><br />Placement Type: <i>";
switch($row[grade])
{
case 'Dream':
$str.= 'Placement 1';
break;
case 'A++':
$str.= 'Placement 2';
break;
case 'A+':
$str.= 'Placement 3';
break;
case 'A':
$str.= 'Placement 4';
break;
}
$str.='<br /><br />';
$str.='<p style="font-size:18px;font-weight:normal;">Enter number of Placed Students:</p>';
$str.='<input type="hidden" name="grade" value="'.$row[grade].'" />';
$str.='<input type="text" id="total" style="width:25%;font-size:16px;" name="placements">';
$str.='<input type="button" name="add" Value="Add Student Roll Numbers" onClick="firstcall();" style="width:30%;font-size:14px;" >';
$str.='<br /><div id="messg"></div><br /><div id="d1"></div>';
echo $str;
?>