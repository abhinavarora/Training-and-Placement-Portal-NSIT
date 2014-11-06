<?php

$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("nsitonli_trndpl", $con);

$row = 1;
//$i=1;
//$c=1;
//$c1=2;
if (($handle = fopen("admincsv/cesc.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
        $num = count($data);
        //echo "<p> $num fields in line $row. <br /></p>\n";
        
		mysql_query("UPDATE placement SET job_3='CESC' WHERE roll_num='".$data[0]."' ");
		$row++;

		//echo $data[$c] ." ". $data[2]." ". $data[0]."<br />\n";
		
            echo $data[0] . "<br />\n";
        
    }
    fclose($handle);
	}
	else
		{echo "hohoho";}

mysql_close($con);


?>