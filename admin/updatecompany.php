<?php
session_start();
	if($_SESSION['auth']!=1)
		 header("Location:index.php");
$date=$_POST[close_date];
$arr = explode(' ',$date);
$arr1 = explode('/',$arr[0]);
$arr2 = explode(':',$arr[1]);
date_default_timezone_set('Asia/Calcutta');
$date = mktime($arr2[0],$arr2[1],$arr2[2],$arr1[1],$arr1[0],$arr1[2]);

	$con=mysql_connect("localhost","nsitonli_potter","Rj9868045066");
	mysql_select_db("nsitonli_trndpl",$con);
	$q="UPDATE company SET name=\"".$_POST['name'].
			    "\", grade=\"".$_POST['grade'].
			    "\", cut_off=\"".$_POST['cut_off'].
			    "\", branches_allowed=\"".$_POST['branches_allowed'].
			    "\", backs_allowed=\"".$_POST['backs_allowed'].
			    "\", details=\"".$_POST['details'].
			    "\", close_date='".$date."' where cid=".$_GET['id'];
	echo $q;
 	$res=mysql_query($q) or die(mysql_error());		
?>
<script type="text/javascript">
window.location = "listcompany.php"
</script>
