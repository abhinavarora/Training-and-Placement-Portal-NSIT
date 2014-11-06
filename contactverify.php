<?php session_start(); ?>
<?php if (!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();}
$email=$_POST['email'];
$alt_email=$_POST['alt_email'];
$cntct=$_POST['cntct'];
$alt_cntct=$_POST['alt_cntct'];

$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_trndpl",$con);

$username = $_SESSION['username'];



$sql="UPDATE student SET email = '$email', alt_email = '$alt_email', cntct = '$cntct', alt_cntct = '$alt_cntct' WHERE rollnum = '$username' ";

	if (!mysql_query($sql,$con))
	  {
	   die('Error: ' . mysql_error());
	  }
               
echo '<script type="text/javascript">alert("Your Profile was Successfully Updated!");</script>';
			echo '<meta http-equiv="Refresh" content="0;
			URL=student.php">';

 mysql_close($con);
?>

