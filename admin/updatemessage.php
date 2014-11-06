<?php
session_start();
	if($_SESSION['auth']!=1)
		 header("Location:index.php");
	echo $_GET['id'];
	$con=mysql_connect("localhost","root","");
	mysql_select_db("nsitonli_trndpl",$con);
	$q="UPDATE company SET publisher=\"".$_POST['publisher'].
			    "\", message=\"".$_POST['message'].
			    "\", date=\"".$_POST['date']."' where sid=".$_GET['id'];
	echo $q;
 	$res=mysql_query($q);	
?>
<script type="text/javascript">
window.location = "index.php"
</script>
