<?php session_start(); ?>
<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} 

$ece=$_POST['ece'];
$cse=$_POST['cse'];
$it=$_POST['it'];
$ice=$_POST['ice'];
$mpae=$_POST['mpae'];
$bt=$_POST['bt'];
$sp=$_POST['sp'];
$infos=$_POST['infos'];
$pc=$_POST['pc'];

$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_trndpl",$con);
$name = $_SESSION['name'];


	  $sql="UPDATE companyprofile SET ece = '$ece', cse = '$cse', it = '$it', ice = '$ice', mpae = '$mpae', bt = '$bt', sp = '$sp', infos = '$infos', pc = '$pc'
		
WHERE username = '$name' ";

	if (!mysql_query($sql,$con))
	  { 
	   die('Error: ' . mysql_error());
	  }
			echo '<meta http-equiv="Refresh" content="0;
			URL=company_selection.php">';


 mysql_close($con);
?>

