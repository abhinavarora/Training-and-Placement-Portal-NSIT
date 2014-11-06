<?php session_start();
	if($_SESSION['auth']!=1)
	header("Location:index.php");
if (!isset($_GET['cont']))
header("Location:index.php");
	?>
	<?php
	$path=$_GET['cont'];
	$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
						if (!$con)
						{
							die('Could not connect: ' . mysql_error());
							}
						mysql_select_db("nsitonli_trndpl", $con);
	if(unlink($path))
				{
				$sql= "DELETE from uploads WHERE address = '".$path."'";
					if (!mysql_query($sql,$con))
						{
							die('Error: ' . mysql_error());
						}
					mysql_close($con);
				echo '<script type="text/javascript">alert("Uploaded File successfully deleted!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=viewuploads.php">';
					die();
				}