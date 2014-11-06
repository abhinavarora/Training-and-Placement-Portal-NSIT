<?php session_start(); ?>
<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} 

$job_desig=$_POST['job_desig'];
$job_describe=$_POST['job_describe'];
$place=$_POST['place'];
$date=$_POST['day'] . "/" . $_POST['month'] . "/" . $_POST['year'];

$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_trndpl",$con);
$name = $_SESSION['name'];


	  $sql="UPDATE companyprofile SET job_desig = '$job_desig', job_describe = '$job_describe', place = '$place', date = '$date'
	


WHERE username = '$name' ";

	if (!mysql_query($sql,$con))
	  { 
	   die('Error: ' . mysql_error());
	  }

     
	echo '<meta http-equiv="Refresh" content="0;
			URL=company_compensation.php">';








 mysql_close($con);
?>

