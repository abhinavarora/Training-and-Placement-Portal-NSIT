<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
if (!isset($_GET['lc']) || !isset($_GET['tm']))
{echo '<meta http-equiv="Refresh" content="0;
URL=home.php">';
die();
} 
if($_SESSION["count"]>=$_GET['tm'])
{
echo '<a href="#top" style="font-size:16px;">Top</a>';
die();
}?>
<?php if (!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();}
?>
<?php
$loop_count=$_GET['lc'];
$loop_count++;
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("nsitonli_trndpl", $con);
$result = mysql_query("SELECT * FROM news ORDER BY date DESC LIMIT ".$_SESSION["count"].",10");
$str='';
while($row = mysql_fetch_array($result))
{
$str.='<p style="float:right"><b>'.$row['date'].'</b></p><p style="font-size: 20px;font-style:italic"><b>'. $row['title'].'</b></p>';
$str.='<div style="background-color:#f2f2e8;"><div id="message" class="message" style="padding-bottom:7px;padding-top:7px;padding-right:7px;padding-left:20px;">'.$row['content'].'</div></div>';
$str.="<hr><br /><br /><br />";
}
$str.='<div id="mesg'.$loop_count.'"><a href="#top" style="font-size:16px;">Top</a></div>';
$_SESSION["count"]=$_SESSION["count"]+10;
echo $str;
?>