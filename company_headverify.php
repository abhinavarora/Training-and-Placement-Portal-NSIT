<?php session_start(); ?>
<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} 

$head_name=$_POST['head_name'];
$head_mobile=$_POST['head_mobile'];
$head_landline=$_POST['head_landline'];
$head_email=$_POST['head_email'];

$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_trndpl",$con);
$name = $_SESSION['name'];


	  $sql="UPDATE companyprofile SET head_email = '$head_email', head_name = '$head_name', head_mobile = '$head_mobile', head_landline = '$head_landline' 
		
WHERE username = '$name' ";

	if (!mysql_query($sql,$con))
	  { 
	   die('Error: ' . mysql_error());
	  }

 
            		echo '<meta http-equiv="Refresh" content="0;
			URL=company_hr.php">';








 mysql_close($con);
?>

