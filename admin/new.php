<?php
  $con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				if (!$con)
					{
					die('Could not connect: ' . mysql_error());
						}
				mysql_select_db("nsitonli_trndpl", $con);
				mysql_query("UPDATE student SET upload_counter = 0");
								mysql_query("UPDATE student SET message_counter = 0");
  mysql_close($con);
?>
