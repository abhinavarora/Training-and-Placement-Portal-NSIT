<?php session_start(); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] <> "POST") 
 die("You can only reach this page by posting from the html form");
if (!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=http://tnp11.nsitonline.in">';
die();} 

require_once('recaptchalib.php');
$privatekey = "6Ld02boSAAAAAD7JpMAhD-VPDlHoGv3r7_BBLtqU";
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
	$_SESSION['error']=$resp->error;
	echo '<meta http-equiv="Refresh" content="0;
URL=password.php">';
die();
}
else 
{
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_trndpl",$con);
$username = $_SESSION['username'];

$password=md5(trim($_POST["password"]));
$sql="UPDATE student SET password = '$password' where rollnum = '$username'";

	if (!mysql_query($sql,$con))
	  { 
	   die('Error: ' . mysql_error());
	  }
	  mysql_close($con);
         echo '<script type="text/javascript">alert("Your Password was successfuly changed!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=home.php">';
					die();
}
?>