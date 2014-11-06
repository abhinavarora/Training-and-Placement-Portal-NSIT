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
<title>Home</title>

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
<br/>
						<li class="current"><a href="home.php">Home</a>
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
						<?php
						if($row[upload_counter]!=0)
						echo "<li ><a href='adminuploads.php'><b>Admin Uploads(".$row[upload_counter].")</b></a>";
						else
						echo "<li ><a href='adminuploads.php'>Admin Uploads</a>"; 
						?>
						<li><a href="Placement Policies 11.pdf" target="_blank">Placement Policies</a></li>
						<li><a href="password.php">Change Password</a></li>
						<li><a href="#" onClick="logout()">Logout</a></li>		
						</ul>
				</div>
		<center>
	<h1 style="font-size: 25px;"><b>Portal Policies</b><h1></center>
	<hr />
	<div id="form-block">
		<p style="font-size:17px;font-weight:normal" >
	<br /><br />
<h4>	
It is expected of you to follow the below mentioned rules. If anyone is found to be violating any rule, his/her account will be immediately deleted and he/she won't be able to sit for any company. 
<br/><br/>

<strong>The following points pertain to the Portal:</strong>

<br/>
   1.

      Nobody is allowed to share his portal password to any other student. 
<br/><br/>


   2.

      Resumes that are to be uploaded on the portal should only be in the standard format that has been uploaded on the group by PlaceComm-2011.
<br/><br/><br/>

<strong>The following points should also be noted:</strong>
<br/><br/>


   1.

      The academic details have been verified by the Placecomm-2011 at the time of CoC submission. These details are final and will not be changed. These should be mentioned by everyone on their resume.
<br/>
<br/>

   2.

      Please be punctual in registering yourself for a company. We won't accept your request after the deadline of registration is over.
<br/>
<br/>

   3.

      For applying for a company, you need to:

<br/>
<br/>

    <ul style="padding-left: 30px;">
<li>

      First, <strong>upload your Resume</strong> from <strong>"Resume Manager"</strong> only in <strong>.pdf</strong> format. Any other format will not be accepted.
</li><br/>
<li>   

      Second, click on <strong>"Apply for Company"</strong> and follow the procedure. If you fulfill the criteria, your application will be accepted.
</li></ul>

<br/>
   4.

      Be regular in checking the <strong>Inbox</strong> of the portal.
<br/>
<br/>
<br/>


Regards,
<br/>

PlaceComm-2011
</h4>
</div>
		</div>
		</div>
		</div>
		</div>
	<br /><br />
	</body>
	</html>