<?php
session_start();
if($_SESSION['auth']!=1)
	 header("Location:index.php");
$con=mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die("could not connect");
mysql_select_db("nsitonli_trndpl",$con);
if(isset($_POST['coe']))
 $str = "COE";
if(isset($_POST['ece']))
 {
if(isset($str))
	$str = $str.", ECE";
else
		$str = "ECE";
}
if(isset($_POST['ice']))
  {
if(isset($str))
	$str = $str.", ICE";
else
		$str = "ICE";
}
if(isset($_POST['mpa']))
 {
if(isset($str))
	$str = $str.", MPA";
else
		$str = "MPA";
}
if(isset($_POST['it']))
 {
if(isset($str))
	$str = $str.", IT";
else
		$str = "IT";
}
if(isset($_POST['bt']))
 {
if(isset($str))
	$str = $str.", BT";
else
		$str = "BT";
}
if(isset($_POST['SP']))
 {
if(isset($str))
	$str = $str.", M.Tech(SP)";
else
		$str = "M.Tech(SP)";
}
if(isset($_POST['IS']))
 {
if(isset($str))
	$str = $str.", M.Tech(IS)";
else
		$str = "M.Tech(IS)";
}
if(isset($_POST['PC']))
 {
if(isset($str))
	$str = $str.", M.Tech(PC)";
else
		$str = "M.Tech(PC)";
}
$date=$_POST[close_date];
$arr = explode(' ',$date);
$arr1 = explode('/',$arr[0]);
$arr2 = explode(':',$arr[1]);
date_default_timezone_set('Asia/Calcutta');
$date = mktime($arr2[0],$arr2[1],$arr2[2],$arr1[1],$arr1[0],$arr1[2]);
$q="insert into company (`cid`,`name`,`grade`,`cut_off`,`branches_allowed`,`backs_allowed`,`details`,`close_date`) VALUES(";
$q = $q."NULL,'$_POST[name]','$_POST[grade]','$_POST[cut_off]','$str','$_POST[backs_allowed]','$_POST[details]','$date')";		
echo "Redirecting.....";
mysql_query($q) or die(mysql_error());
mysql_close($con);mkdir("../company_applications/".$_POST[name], 0777);
?>
<script type="text/javascript">
window.location = "listcompany.php"
</script>
