<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Invalid Username and Password</title>
<style type="text/css">
p{font-weight:bold;
font-size: 25px;}
body{padding: 0px;
margin: 0px; }
</style>
</head>
<?php

if ($_SERVER["REQUEST_METHOD"] <> "POST") 
 die("You can only reach this page by posting from the html form");
 
 $con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
 
 if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
 mysql_select_db("nsitonli_trndpl", $con);
 
 if($_POST['loginID']=="student")
 {
	$rollnum=$_POST['username'];
	$password=md5(trim($_POST["password"]));
	$result= mysql_query("SELECT * FROM student WHERE rollnum='$rollnum' AND password='$password'");
	if($row = mysql_fetch_array($result))
		{$_SESSION['username']=$row['rollnum'];
		$_SESSION['login']=1;
		$_SESSION['fname']=$row['fname'];
		echo '<meta http-equiv="Refresh" content="0;
URL=home.php">';
		}
	else
		{
			echo "<p>Invalid Username and Password</p>" ;
			echo '<meta http-equiv="Refresh" content="2;
			URL=http://tnp.nsitonline.in/">';
		}
		}
mysql_close($con);
 ?>
 </html>