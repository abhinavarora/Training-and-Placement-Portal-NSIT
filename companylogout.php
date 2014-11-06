<?php session_start(); ?>
<?php if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title>Logout</title>
<style type="text/css">
.text
{font-weight:bold;
font-size: 35px;
text-align:center;}
</style>
<link rel="stylesheet" type="text/css" href="css/template.css" />

</head>
<body>
<?php 
unset($_SESSION['username']);
unset($_SESSION['name']);
unset($_SESSION['login']);
session_destroy();
echo "<br/><br/><br/><br/><br/>";
echo "<p class='text'>You have succesfully Logged Out</p>";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();
?>
</body></html>