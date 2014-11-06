<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
if(!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;URL=index.php">';
die();}?>
<?php
if (!isset($_GET['c']))
{
echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
die();
}
$company=$_GET['c'];
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
if (!$con)
{	die('Could not connect: ' . mysql_error());
}
mysql_select_db("nsitonli_trndpl", $con);
$result= mysql_query("SELECT * FROM company WHERE name='$company'");
$row = mysql_fetch_array($result);
date_default_timezone_set('Asia/Calcutta');
$date=getdate($row[close_date]);
$str = "Name: <i>".$row[name]."</i><br /><br /><span></span>Grade: <i>".$row[grade]."</i><br /><br /><span></span>Branches Allowed: <i>".$row[branches_allowed]."</i><br /><br /><span></span>Cut Off: <i>".$row[cut_off]."</i><br /><br /><span></span>Backlogs Allowed: <i>".$row[backs_allowed]."</i><br /><br /><span></span>Closing Date: <i>".$date[weekday].", ".$date[mday]." ".$date[month]." ".$date[year]."</i><br /><br /><span></span>Closing Time: <i>".$date[hours].":".$date[minutes]."</i><br /><br /><span></span>Details: <i>".$row[details]."</i>";echo $str;