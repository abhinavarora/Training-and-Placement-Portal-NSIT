<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php if (!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} 
$_SESSION['count']=0;
?>
<head>
<div style="background-image:url('images/bigLoader.gif');"></div>
<title>My Messages</title>
<script type="text/javascript" src="js/jquery-1.2.6.js"></script>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Training & Placement, NSIT" />
<link rel="stylesheet" type="text/css" href="css/template.css" />
<style type="text/css">
#message
{
font-family:"Times New Roman", Times, serif;
font-size:14px;
font-style:normal;
color:#000000;
}
p.message
{
color:#000000;
font-style:normal;
font-weight:normal;
}

#inbox
{
position: relative;
	
	width:75%;
	float: right;
	margin-right: -15px;
}
</style>
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
<script type="text/javascript">
var num=1;
function showmessage(lc,tm)
{

 document.getElementById("mesg"+lc).innerHTML="<img src='images/bigLoader.gif' alt='Loading'/>"
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
    document.getElementById("mesg"+lc).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","showmessage.php?lc="+lc+"&tm="+tm,true);
xmlhttp.send();
num++;
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
						<li class="current"><a href="my_messages.php">Inbox</a>
						<li><a href="student.php">Profile</a></li>
						<li><a href="resume.php">Resume Manager</a></li>
						<li><a href="company_apply.php">Apply For Company</a></li>
						<li><a href="cancel_application.php">Deregister for Company</a></li>
						<li><a href="myregistrations.php">My Registrations</a></li>
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
	
	<center>	<a name="top"></a>
	<h1 style="font-size: 30px; font-family:'Times New Roman', Times, serif;" >My Inbox<h1></center>
	<hr />
	<div id="inbox">
	<br /><br />
	<?php
         
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
if(!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("nsitonli_tnp12",$con);
$result = mysql_query("SELECT * FROM news ORDER BY date DESC");
$num_rows = mysql_num_rows($result);
$result= mysql_query("SELECT * FROM student WHERE rollnum='$_SESSION[username]'");
$row = mysql_fetch_array($result);
$newmessage=$row[message_counter];
mysql_query("UPDATE student SET message_counter = '0' WHERE rollnum = '$_SESSION[username]'");
if($newmessage<=10)
{
$result = mysql_query("SELECT * FROM news ORDER BY date DESC LIMIT 0,10");
while($row = mysql_fetch_array($result))
	{	
		$_SESSION['count']++;
		if($_SESSION['count']<=$newmessage)
		echo  '<p style="float:right"><b>'.$row['date'].'</b></p><p style="font-size: 20px;font-style:italic"><b>'. $row['title'].'&nbsp;&nbsp;&nbsp;<span style="color:blue;">(New)</span></b></p>';
		else
		echo  '<p style="float:right"><b>'.$row['date'].'</b></p><p style="font-size: 20px;font-style:italic"><b>'. $row['title'].'</b></p>';
		echo '<div style="background-color:#f2f2e8;"><div id="message" class="message" style="padding-bottom:7px;padding-top:7px;padding-right:7px;padding-left:20px;">'.$row['content'].'</div></div>';
		echo "<hr><br /><br /><br />";
		}
}
else
{
$_SESSION['count']=$newmessage;
$result = mysql_query("SELECT * FROM news ORDER BY date DESC LIMIT 0,".$_SESSION['count']);
while($row = mysql_fetch_array($result))
	{
	echo  '<p style="float:right"><b>'.$row['date'].'</b></p><p style="font-size: 20px;font-style:italic"><b>'. $row['title'].'&nbsp;&nbsp;&nbsp;<span style="color:blue;">(New)</span></b></p>';
	echo '<div style="background-color:#f2f2e8;"><div id="message" class="message" style="padding-bottom:7px;padding-top:7px;padding-right:7px;padding-left:20px;">'.$row['content'].'</div></div>';
		echo "<hr><br /><br /><br />";
	}
}
?>
	<script type="text/javascript">
	$(document).ready(function(){
		$(window).scroll(function(){
			if  ($(window).scrollTop() == $(document).height() - $(window).height()){
			showmessage(num,'<?php echo $num_rows;?>');
			}
		}); 
		
	});
	</script>

<div id="mesg1"> <a href="#top" style="font-size:16px;">Top</a></div>		<br /><br /><br />
</div></div></div></div>
<br /><br /></body></html>