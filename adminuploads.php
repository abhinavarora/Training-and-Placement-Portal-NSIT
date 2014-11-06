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
<title>Admin Uploads</title>
<style type="text/css">
tr
{
font-size: 15px;
width=10%;}
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to the Homepage of the Training and Placements Cell, Netaji Subhas Institute of Technology.</h2>	
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
						<li><a href="myregistrations.php">My Registrations</a></li>
						<li class="current"><a href="adminuploads.php">Admin Uploads</a></li>
						<li><a href="password.php">Change Password</a></li>
						<li><a href="#" onClick="logout()">Logout</a></li>		
						</ul>
				</div>
		<center>
	<h1 style="font-size: 30px; font-family:'Times New Roman', Times, serif;" >Admin Uploads<h1></center>
	<hr />
		<div id="table-block"><br />
		<p style="font-size:17px;font-weight:normal" >
			<table cellspacing="0" style="width:100%;" cellpadding="0">

					<tbody>

						<tr class="header">

							<td>S.No.</td>

							<td>Content Name</td>

							<td>Download </td>

							<td>Upload Date</td>

							<td>Upload Size</td>
						</tr>
		<?php
		mysql_query("UPDATE student SET upload_counter = '0' WHERE rollnum = '$_SESSION[username]'");
		$result= mysql_query("SELECT * FROM uploads ORDER BY date DESC");
		$i=1;
		while($row = mysql_fetch_array($result))
		{
		if($i%2==1)
echo "<tr class= 'alternate'>"; 
else	
echo"<tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['name']."</td>";
echo "<td><a target='_blank' href='download.php?cont=".$row[address]."'>Click Here</a></td>";
$date=getdate($row[date]);
echo "<td>".$date[mday]."-".$date[mon]."-".$date[year]."</td>";
echo "<td>".$row['size']."</td>";
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
