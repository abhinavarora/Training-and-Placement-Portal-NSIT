<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php if (!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=http://tnp11.nsitonline.in">';
die();} ?>

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
<head>
<title>Training & Placement, NSIT</title>

<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Training & Placement, NSIT" />
<meta name="keywords" content="training, placement, NSIT, NSIT Delhi, netaji subhas institute of technology, DIT" />

<link rel="stylesheet" type="text/css" href="css/template.css" />
<script type="text/javascript">

function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {
    alert(alerttxt);return false;
    }
  else
    {
    return true;
    }
  }
}

function checkpassword(thisform) {
password = thisform.password.value;
confirm_password = thisform.confirm_password.value;

if (password != confirm_password) {
alert ("\nYou did not enter the same password twice. Please re-enter your password!");
return false;
}
else return true;
}

function passwordlength(thisform) 
{
passlength = thisform.password.value.length;

if (passlength<6) {
alert ("\nPassword must be atleast 6 characters long!");
return false;
}
else return true;
}

function validate_form(thisform)
{
with (thisform)
  {
 if (validate_required(password,"Password must be filled out!")==false)
  {password.focus();return false;}
  if (passwordlength(thisform)==false)
  {password.focus();return false;}
  if (validate_required(confirm_password,"Password must be confirmed!")==false)
  {confirm_password.focus();return false;}
  if (checkpassword(thisform)==false)
  {password.focus();confirm_password.focus();return false;}
  if (validate_required(recaptcha_response_field,"Characters in the image must be inserted!")==false)
  {recaptcha_response_field.focus();return false;}
    }
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspWelcome to the Homepage of the Training and Placements Cell, Netaji Subhas Institute of Technology.</h2>	
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
						<?php
						if($row[upload_counter]!=0)
						echo "<li ><a href='adminuploads.php'><b>Admin Uploads(".$row[upload_counter].")</b></a>";
						else
						echo "<li ><a href='adminuploads.php'>Admin Uploads</a>"; 
						?>
						<li class="current"><a href="password.php">Change Password</a></li>
						<li><a href="#" onClick="logout()">Logout</a></li>	
					</ul>
			
				
				</div>
			
<div id="form-block">
<form id="values" action="passwordverify.php" onsubmit="return validate_form(this)" method="post" enctype="multipart/form-data">
	 
<p>New Password: </p></br><input name="password" type="password" size="70" />

<p>Confirm Password: </p></br><input name="confirm_password" type="password"size="70" />

<?php

require_once('recaptchalib.php');
$publickey = "6Ld02boSAAAAAKfiNo2PNzSuOgU98bHZs0UI-d2f";
echo recaptcha_get_html($publickey, $_SESSION['error']);
unset($_SESSION['error']);
?>
<table cellspacing="20">
<tr><td>
<input type="submit" value="SAVE" /></td><td>
<input type="reset" value="RESET" /></td></tr></table>
</form>


</div>



            </div>

            
        </div>
				</div>
				<br/><br />
</body>

</html>
