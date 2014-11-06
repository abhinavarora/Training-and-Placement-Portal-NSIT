<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} ?>

<script type="text/javascript">
function logout() {

var confirmmessage = "Are you sure you want to logout?";
var goifokay = "companylogout.php";
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
</head>

<body>

<div id="page-container">
	<div id="branding">
	
<img src="banner/tnp2.jpg" width="100%" height="150"/>	
</div><!-- end branding -->
		
<div id="page-content" class="clearfix">
<h2 style="text-align:left;">Hello <?php echo $_SESSION['name']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to the Homepage of the Training and Placement Cell, Netaji Subhas Institute of Technology.</h2>	
<div class="inner-box clearfix">
	
				<div id="sidebar">
				
					<ul id='sidebar' class="main">
						<li><a href="companyview.php">Home</a>
						<li><a href="companyprofile.php">Profile</a></li>
						
						<li class="current"><a href="changepassword.php">Change Password</a></li>
						<li><a href="#" onClick="logout()">Logout</a></li>	
						
					</ul>
			
				
				</div>
			
<div id="form-block">
<h2>CHANGE PASSWORD</h2><br/>


<form id="values" action="companypasswordverify.php" onsubmit="return validate_form(this)" method="post" enctype="multipart/form-data">
	 
<p>New Password: </p></br><input name="password" type="password" size="70" />

<p>Confirm Password: </p></br><input name="confirm_password" type="password"size="70" />

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
