<?php session_start(); ?>
<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} 

$hr_name=$_POST['hr_name'];
$hr_designation=$_POST['hr_designation'];
$mobile=$_POST['mobile'];
$landline=$_POST['landline'];
$email=$_POST['email'];

$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_trndpl",$con);
$name = $_SESSION['name'];


	  $sql="UPDATE companyprofile SET hr_name = '$hr_name', hr_designation = '$hr_designation', mobile = '$mobile', landline = '$landline', 
		email = '$email'
WHERE username = '$name' ";

	if (!mysql_query($sql,$con))
	  { 
	   die('Error: ' . mysql_error());
	  }



  
       
 			echo '<meta http-equiv="Refresh" content="0;
			URL=company_job.php">';








 mysql_close($con);
?>

