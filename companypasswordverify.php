<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} ?>

<?php
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];

if ($password!=$confirm_password) {
echo '<script type="text/javascript">alert("Passwords do not match!");</script>';
	
echo '<meta http-equiv="Refresh" content="0;
URL=companypassword.php">';

}
else 
{
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_trndpl",$con);
$name = $_SESSION['name'];


$password=md5(trim($_POST["password"]));
$sql="UPDATE companyprofile SET password = '$password' where username = '$name' ";
	if (!mysql_query($sql,$con))
	  { 
	   die('Error: ' . mysql_error());
	  }
	  mysql_close($con);
         echo '<script type="text/javascript">alert("Your Password was successfuly changed!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=companyview.php">';
					die();
}
?>