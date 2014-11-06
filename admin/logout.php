<?php
	session_start();
	if($_SESSION['auth']==1)
	{
		echo "<h1>Session over. Thank you for using placecomm<h1>";
		session_destroy();
	}
	else
		echo "You are already logged out";
?>
<script type="text/javascript">
window.location = "index.php"
</script>

