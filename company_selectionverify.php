<?php session_start(); ?>
<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} 

$ppt=$_POST['ppt'];
$percent=$_POST['percent'];
$resume_short=$_POST['resume_short'];
$test=$_POST['test'];
$testtype=$_POST['testtype'];
$gd=$_POST['gd'];
$ti=$_POST['ti'];
$hri=$_POST['hri'];
$others=$_POST['others'];
$bond=$_POST['bond'];
$bonddetails=$_POST['bonddetails'];
$result=$_POST['result'];

$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_trndpl",$con);
$name = $_SESSION['name'];


	  $sql="UPDATE companyprofile SET ppt = '$ppt',	percent = '$percent', resume_short = '$resume_short', test = '$test', testtype = '$testtype',
		gd = '$gd', ti = '$ti', hri = '$hri', others = '$others', 
		bond = '$bond', bonddetails = '$bonddetails', result = '$result'
WHERE username = '$name' ";

	if (!mysql_query($sql,$con))
	  { 
	   die('Error: ' . mysql_error());
	  }
			echo '<meta http-equiv="Refresh" content="0;
			URL=company_infra.php">';








 mysql_close($con);
?>

