<?php session_start();

		if($_SESSION['auth']!=1)
{
			header("Location:index.php");		
			die();
}			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
if (!isset($_GET['c']))
{echo '<meta http-equiv="Refresh" content="0;
URL=index.php">';
die();
}?>
<?php
$company=$_GET['c'];
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("nsitonli_trndpl", $con);
$result= mysql_query("SELECT * FROM company WHERE name='$company'");
$row = mysql_fetch_array($result);
$str = "Name: <i>".$row[name]."</i><br />Grade: <i>".$row[grade]."</i><br />";
$csv = "Company:,".$row['name'].",Grade:,".$row['grade']."\n";
switch($row[grade])
{
case 'Dream':
$field= 'job_1';
break;
case 'A++':
$field= 'job_2';
break;
case 'A+':
$field= 'job_3';
break;
case 'A':
$field= 'job_4';
break;
}
$sql= "SELECT roll_num FROM placement WHERE ".$field." = '".$company."'";
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result);
$str.= "Number of Students Placed in <strong>".$company."</strong>: <i>".$num_rows."</i></br /><br /></br /><br />";
if($num_rows!=0)
$str.= '<table cellspacing="0" cellpadding="0">

					<tbody>

						<tr class="header">

							<td>Name</td>

							<td>Roll No.</td>

							<td>Branch</td>

							<td>Contact</td>

							<td>Email-Id</td>

						</tr>';
$i=1;
$csv = $csv."Name,Roll No,Contact,E-mail\n";
while($row = mysql_fetch_array($result))
{
if($i%2==1)
$str.= "<tr class= 'alternate'>"; 
else	
$str.="<tr>";
$result2= mysql_query("SELECT * FROM student WHERE rollnum='$row[roll_num]'");
$row=mysql_fetch_array($result2);
$str.="<td>".$row['fname']." ".$row["lname"]."</td>";
$str.="<td>".$row['rollnum']."</td>";
$str.="<td>".$row['branch']."</td>";
$str.="<td>".$row['cntct']."</td>";
$str.="<td>".$row['email']."</td></tr>";
$csv=$csv.$row['fname']." ".$row['lname'].",".$row['rollnum'].",".$row['cntct'].",".$row['email']."\n";
$i+=1;
}
$str.="</tbody></table><br/><h3><a href='./Files/".$company."placement.csv'>Export List of Placements</a></h3>";
$fp = fopen("./Files/".$company."placement.csv","w");
fwrite($fp,$csv);
fclose($fp);
$str.="<input type='button' value='Export Resumes' style='width:100px;' onclick='window.open(\"<?php echo $url;?>\")' >";
echo $str;
?>
