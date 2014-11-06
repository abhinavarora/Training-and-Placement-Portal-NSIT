<?php session_start(); ?>
<?php if (!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} 
setcookie("TnPusername","",time()-1209600);
setcookie("TnPpassword","",time()-1209600);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title>Logout</title>
<style type="text/css">
p{font-weight:bold;
font-size: 25px;}
body{padding: 0px;
margin: 0px;}
</style>
</head>
<body>
<?php 
unset($_SESSION['username']);
unset($_SESSION['fname']);
unset($_SESSION['login']);
session_destroy();
echo '<script type="text/javascript">alert("you have successfully logged out!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=index.php">';
					die();
?>
</body></html>