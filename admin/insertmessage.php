<?php
session_start();
if($_SESSION['auth']!=1)
	 header("Location:index.php");
$con=mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die("could not connect");
mysql_select_db("nsitonli_trndpl",$con);
$content=nl2br($_POST[content]);
$q= "insert into news (`nid`,`publisher`,`title`,`content`,`date`) VALUES(NULL,'$_POST[publisher]','$_POST[title]','$content',NOW())";
mysql_query($q) or die(mysql_error());
mysql_query("UPDATE student SET message_counter = message_counter+1");
mysql_close($con);
?>
<script type="text/javascript">
window.location = "listmessage.php"
</script>
