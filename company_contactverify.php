<?php session_start(); ?>
<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} 

$cname=$_POST['cname'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
$contact=$_POST['contact'];
$fax=$_POST['fax'];
$website=$_POST['website'];


$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_trndpl",$con);
$name = $_SESSION['name'];


	  $sql="UPDATE companyprofile SET cname = '$cname', address = '$address', city = '$city', state = '$state', pincode = '$pincode', contact = '$contact', fax = '$fax', 
                website = '$website'

WHERE username = '$name' ";
echo '<meta http-equiv="Refresh" content="0;
URL=company_head.php">';

	if (!mysql_query($sql,$con))
	  { 
	   die('Error: ' . mysql_error());
	  }



 mysql_close($con);
?>

