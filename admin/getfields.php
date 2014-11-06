<?php 
session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
if (!isset($_GET['lc']) || !isset($_GET['total']))
{echo '<meta http-equiv="Refresh" content="0;
URL=index.php">';
die();
}
$total=$_GET['total'];
if($_SESSION["fieldcount"]>$total)
die();
$str='';
$count=1;
$loop_count=$_GET['lc'];
$loop_count++;
 while($count<=10 && $_SESSION["fieldcount"]<=$total)
	{
	$str.='<p style="font-size:18px;font-weight:normal;">Student '.$_SESSION["fieldcount"].'&nbsp;&nbsp;&nbsp;';
	$str.='<input type="text" name="stud'.$_SESSION["fieldcount"].'" style="width:25%;font-size:16px;"><br />';
	$count++;
	$_SESSION["fieldcount"]++;
	}
	if($_SESSION["fieldcount"]>$total)
{
$str.='<input type="submit" name="Submit" Value="Submit"style="width:25%;font-size:14px;" ></form><div id="d'.$loop_count.'"></div>';
}
else
$str.='<div id="d'.$loop_count.'"></div>';
echo $str;
?>