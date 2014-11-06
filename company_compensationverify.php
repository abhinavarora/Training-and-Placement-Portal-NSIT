<?php session_start(); ?>
<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} 

$hra=$_POST['hra'];
$gross=$_POST['gross'];
$othercompensation=$_POST['othercompensation'];
$takehome=$_POST['takehome'];
$cost=$_POST['cost'];
$details=$_POST['details'];
$mhra=$_POST['mhra'];
$mgross=$_POST['mgross'];
$mothercompensation=$_POST['mothercompensation'];
$mtakehome=$_POST['mtakehome'];
$mcost=$_POST['mcost'];
$mdetails=$_POST['mdetails'];

$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_trndpl",$con);
$name = $_SESSION['name'];


	  $sql="UPDATE companyprofile SET hra = '$hra', gross = '$gross', othercompensation = '$othercompensation', takehome = '$takehome', cost = '$cost', details = '$details', mhra = '$mhra', mothercompensation = '$mothercompensation',
		mgross= '$mgross', mtakehome = '$mtakehome', mcost = '$mcost', mdetails = '$mdetails'
		
WHERE username = '$name' ";

	if (!mysql_query($sql,$con))
	  { 
	   die('Error: ' . mysql_error());
	  }

			echo '<meta http-equiv="Refresh" content="0;
			URL=company_branch.php">';








 mysql_close($con);
?>

