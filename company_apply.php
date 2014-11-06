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
<title>Apply for a Company</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Training & Placement, NSIT" />
<link rel="stylesheet" type="text/css" href="css/template.css" />
<div style="background-image:url('images/bigLoader.gif');"></div>
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

function showinfo()
{
var company = document.getElementById('comp').value;
if (company=="NULL")
  { 
  document.getElementById("information").innerHTML="";
  return;
  }
 document.getElementById("information").innerHTML="<img src='images/bigLoader.gif' alt='Loading'/>"
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("information").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","showinfo.php?c="+company,true);
xmlhttp.send();
}
</script>
<style type="text/css">
#inbox
{
position: relative;
	width:75%;
	float: right;
	margin-right: -20px;
}
</style>
</head>
<body>

<div id="page-container">
	<div id="branding">
	
<img src="banner/tnp2.jpg" width="100%" height="150"/>	
</div><!-- end branding -->
		
<div id="page-content" class="clearfix">
<h2 style="text-align:left;">Hello <?php echo $_SESSION['fname']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Welcome to the Homepage of the Training and Placement Cell, Netaji Subhas Institute of Technology.</h2>	
<div class="inner-box clearfix">
	
				<div id="sidebar">
				
					<ul id='sidebar' class="main">
						<li ><a href="home.php">Home</a>
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
						<li class="current" ><a href="company_apply.php">Apply For Company</a></li>
						<li><a href="cancel_application.php">Deregister for Company</a></li>
						<li><a href="myregistrations.php">My Registrations</a></li>
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
	<h1 style="font-size: 30px; font-family:'Times New Roman', Times, serif;" >Apply for a Company<h1></center>
	<hr /><br /><br />
		<div id="form-block">
	<form action="register.php" method="post">
	<p style="font-size:17px;font-weight:normal;">Select a Company to Apply for:
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<select name="company" id="comp" onChange='showinfo();' style="width:25%;font-size:14px;">
<option value="NULL" selected="selected">Select Company</option>
<option value="NULL">-----------</option>
<?php
date_default_timezone_set('Asia/Calcutta');
$username=$_SESSION['username'];
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die('Could not connect: ' . mysql_error());
mysql_select_db("nsitonli_tnp12", $con);
$result = mysql_query("SELECT * FROM company ORDER BY name");
$present = mktime();
while($row = mysql_fetch_array($result))
{	
	if($present < $row['close_date'])
	echo '<option value="'.$row[name].'">'.$row[name].'</option>'; 
	}
	?>
	</select></p><br />
<p style="font-size:17px;font-weight:normal;">	Select a Resume:
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;
	<select name="resume" style="width:25%;font-size:14px;">
<option value="NULL" selected="selected">Select Resume</option>
<option value="NULL">-----------</option>
	<?php
$result = mysql_query("SELECT * FROM resume WHERE rollnum='$username'");
				$row = mysql_fetch_array($result);
		if($row[res1]==1)
echo "<option value='res1'>Resume 1</option>"; 
if($row[res2]==1)
echo "<option value='res2'>Resume 2</option>"; 
if($row[res3]==1)
echo "<option value='res3'>Resume 3</option>";
mysql_close($con);
?>
</select>
<br /></p><br />
<input type="submit" name="submit" value="Apply for Company" style="width:25%;font-size:15px;font-weight:normal;"  />
</form><br />
<p style="font-size:16px;font-weight:normal;"><span id='information'></span></p>
<br />
</div>
</div>
</div>
</div><br />
</body>
</html>
		