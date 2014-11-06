<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php if (!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();}
?>
<head>
<div style="background-image:url('images/tick.png');"></div>
<title>My Registrations</title>
<style type="text/css">
tr
{
font-size: 15px;}
</style>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Training & Placement, NSIT" />
<link rel="stylesheet" type="text/css" href="css/template.css" />
<script type="text/javascript">
function logout() {

var confirmmessage = "Are you sure you want to logout?";
var goifokay = "logout.php";
var cancelmessage = "Action Cancelled";

if (confirm(confirmmessage)) {

window.location = goifokay;

} else {

alert(cancelmessage);

}

}
</script>
</head>
<body>

<div id="page-container">
	<div id="branding">
	
<img src="banner/tnp2.jpg" width="100%" height="150"/>	
</div><!-- end branding -->
		
<div id="page-content" class="clearfix">
<h2 style="text-align:left;">Hello <?php echo $_SESSION['fname']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to the Homepage of the Training and Placement Cell, Netaji Subhas Institute of Technology.</h2>	
<div class="inner-box clearfix">
	
				<div id="sidebar">
				
					<ul id='sidebar' class="main">
						<li><a href="home.php">Home</a>
						<?php
						$username=$_SESSION['username'];
						$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
						if (!$con)
						{
							die('Could not connect: ' . mysql_error());
							}
						mysql_select_db("nsitonli_trndpl", $con);
						$result= mysql_query("SELECT * FROM student WHERE rollnum='$username'");
						$row = mysql_fetch_array($result);
						if($row[message_counter]!=0)
						echo "<li ><a href='my_messages.php'><b>Inbox(".$row[message_counter].")</b></a>";
						else
						echo "<li ><a href='my_messages.php'>Inbox</a>"; 
						?>
						<li><a href="student.php">Profile</a></li>
						<li><a href="resume.php">Resume Manager</a></li>
						<li><a href="company_apply.php">Apply For Company</a></li>
						<li><a href="cancel_application.php">Deregister for Company</a></li>
						<li class="current"><a href="myregistrations.php">My Registrations</a></li>
						<?php
						if($row[upload_counter]!=0)
						echo "<li ><a href='adminuploads.php'><b>Admin Uploads(".$row[upload_counter].")</b></a>";
						else
						echo "<li ><a href='adminuploads.php'>Admin Uploads</a>"; 
						?><li><a href="Placement Policies 11.pdf" target="_blank">Placement Policies</a></li>
						<li><a href="password.php">Change Password</a></li>
						<li><a href="#" onClick="logout()">Logout</a></li>		
						</ul>
				</div>
		<center>
	<h1 style="font-size: 30px; font-family:'Times New Roman', Times, serif;" >My Registrations<h1></center>
	<hr />
		<div id="table-block"><br />
		<p style="font-size:17px;font-weight:normal" >
	<?php
		function getgrade($comp)
	{
	$graderes= mysql_query("SELECT * FROM company WHERE name='$comp'");
	$grade=mysql_fetch_array($graderes);
	echo $grade['grade'];
	}
	$result= mysql_query("SELECT * FROM placement WHERE roll_num='$username'");
						$prow = mysql_fetch_array($result);
						$str=$prow[job_1].$prow[job_2].$prow[job_3];
	?>
	<table cellspacing="0" cellpadding="0">

					<tbody>

						<tr class="header">

							<td>S.No.</td>

							<td>Company</td>

							<td>Grade</td>

							<td>Placement</td>

						</tr>
<?php 
$result= mysql_query("SELECT * FROM companyapply WHERE student_rollnum='$username' ORDER BY company_name ");
$i=1;
while($row = mysql_fetch_array($result))
{
if($i%2==1)
echo "<tr class= 'alternate'>"; 
else	
echo"<tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['company_name']."</td>";
echo "<td>";getgrade($row['company_name']);echo"</td>";
if (is_int(stripos($str,trim($row['company_name']))))
echo "<td>&nbsp;&nbsp;&nbsp;<img src='images/tick.png' /></td>";
else
echo"<td></td>";
echo "</tr>";
$i++;
}
 ?>
 </tbody></table>
	</p>
	</div>
		</div>
		</div>
		</div>
		</div>
	<br /><br />
	</body>
	</html>