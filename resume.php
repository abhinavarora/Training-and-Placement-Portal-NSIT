<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php if (!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} ?>
<head>
<title>My Resume</title>

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
<script type="text/javascript"
src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	//When you click on a link with class of poplight and the href starts with a # 
$('a.poplight[href^=#]').click(function() {
    var popID = $(this).attr('rel'); //Get Popup Name
    var popURL = $(this).attr('href'); //Get Popup href to define size

    //Pull Query & Variables from href URL
    var query= popURL.split('?');
    var dim= query[1].split('&');
    var popWidth = dim[0].split('=')[1]; //Gets the first query string value

    //Fade in the Popup and add close button
    $('#' + popID).fadeIn().css({ 'width': Number( popWidth ) }).prepend('<a href="#" class="close"><img src="images/closelabel.gif" class="btn_close" title="Close Window" alt="Close" /></a>');

    //Define margin for center alignment (vertical   horizontal) - we add 80px to the height/width to accomodate for the padding  and border width defined in the css
    var popMargTop = ($('#' + popID).height() + 80) / 2;
    var popMargLeft = ($('#' + popID).width() + 80) / 2;

    //Apply Margin to Popup
    $('#' + popID).css({
        'margin-top' : -popMargTop,
        'margin-left' : -popMargLeft
    });

    //Fade in Background
    $('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
    $('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn(); //Fade in the fade layer - .css({'filter' : 'alpha(opacity=80)'}) is used to fix the IE Bug on fading transparencies 

    return false;
});

//Close Popups and Fade Layer
$('a.close, #fade').live('click', function() { //When clicking on the close or fade layer...
    $('#fade , .popup_block').fadeOut(); //fade them both out
    $('#fade').remove();
    return false;
});
});
</script>
<style type="text/css">
#inbox
{
position: relative;
	
	width:75%;
	float: right;
	margin-right: -20px;
}

#fade { /*--Transparent background layer--*/
	display: none; /*--hidden by default--*/
	background: #000;
	position: fixed; left: 0; top: 0;
	width: 100%; height: 100%;
	opacity: .80;
	z-index: 9999;
}
.popup_block{
	display: none; /*--hidden by default--*/
	background: #fff;
	padding: 20px;
	border: 20px solid #ddd;
	float: left;
	font-size: 1.2em;
	position: fixed;
	top: 50%; left: 50%;
	z-index: 99999;
	/*--CSS3 Box Shadows--*/
	-webkit-box-shadow: 0px 0px 20px #000;
	-moz-box-shadow: 0px 0px 20px #000;
	box-shadow: 0px 0px 20px #000;
	/*--CSS3 Rounded Corners--*/
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
}
img.btn_close {
	float: right;
	margin: -55px -55px 0 0;
}
/*--Making IE6 Understand Fixed Positioning--*/
*html #fade {
	position: absolute;
}
*html .popup_block {
	position: absolute;
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
						<li class="current"><a href="resume.php">Resume Manager</a></li>
						<li><a href="company_apply.php">Apply For Company</a></li>
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
	<h1 style="font-size: 32px; font-family:'Times New Roman', Times, serif;" >Resume Manager<h1></center>
	<hr />
	<div id="form-block">
	<h4>
	<br /><br />
	1. Please upload your Resume in the <strong>".pdf "</strong> format only. No other format will be accepted.
	<br /><br />
	2. The T&P Cell allows you to <strong>Upload 3 different Resumes</strong> which you may apply for different types of Companies.
	<br /><br />
	3. You may designate these resumes as <strong>Resume 1, Resume 2 and Resume 3 </strong>respectively.
	<br /><br />
	4. In order to<strong> Modify a Resume</strong>, upload the modified resume in any of the 3 categories to overwrite the respective resume. 
	<br /><br />
	5. You may also <strong>Delete Resume</strong> if you wish to use less than 3 resumes.
	<br /><br />
	6. Your Resume should <strong>not exceed the size of 500 KB</strong>.
	<br /><br />
	<strong>NOTE:</strong> All the uploaded resumes should be in Standard Resume format set by PlaceComm-2011. Strict actions will be taken against those who are found using any other Resume format.
	<br /><br /></h4>
	

	<table>
	<tr><td width="250" allign="right">
	<a href="#?w=500" rel="upload" class="poplight"><img src="images/upload.gif" width="120" height="30" /></a></td><td width="250" allign="left">
	<a href="#?w=500" rel="delete" class="poplight"><img src="images/delete.gif" width="120" height="30" /></a></td><td>
	<a href="#?w=500" rel="view" class="poplight"><img src="images/view.gif" width="120" height="30" /></a></td></tr>
</table>

<div id="upload" class="popup_block">
	<form action="request.php" method="post" enctype="multipart/form-data">
<p style="font-size:1.5em;">Select a File to Upload</p><br />
<p>Filename:</p>
<input type="file" name="file" id="file"/><br />
<p>Resume Number:
<select name="resume">
<option value="NULL" selected="selected">Select Resume</option>
<option value="NULL">-----------</option> 
<option value="res1">Resume 1</option> 
<option value="res2">Resume 2</option> 
<option value="res3">Resume 3</option></select></p><center> 
<br />
<input type="submit" name="submit" value="Upload" /></center>
</form>
	
</div>

<?php
$username=$_SESSION['username'];
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				if (!$con)
					{
					die('Could not connect: ' . mysql_error());
						}
				mysql_select_db("nsitonli_tnp12", $con);
				$result = mysql_query("SELECT * FROM resume WHERE rollnum='$username'");
				$row = mysql_fetch_array($result); 
?>

<div id="delete" class="popup_block">
	<form action="request.php" method="post">
<p style="font-size:1.5em;">Select a Resume to Delete</p><br />
<p>Resume Number:
<select name="resume">
<option value="NULL" selected="selected">Select Resume</option>
<option value="NULL">-----------</option>
<?php
if($row[res1]==1)
echo '<option value="res1">Resume 1</option>'; 
if($row[res2]==1)
echo '<option value="res2">Resume 2</option>'; 
if($row[res3]==1)
echo '<option value="res3">Resume 3</option>';
?>
</select></p><center> 
<br />
<input type="submit" name="submit" value="Delete" /></center>
</form>
	
</div>

<div id="view" class="popup_block">
	<form action="request.php" method="post">
<p style="font-size:1.5em;">Select a Resume to View</p><br />
<p>Resume Number:
<select name="resume">
<option value="NULL" selected="selected">Select Resume</option>
<option value="NULL">-----------</option> 
<?php
if($row[res1]==1)
echo '<option value="res1">Resume 1</option>'; 
if($row[res2]==1)
echo '<option value="res2">Resume 2</option>'; 
if($row[res3]==1)
echo '<option value="res3">Resume 3</option>';
?>
</select></p>
<center> <br />
<input type="submit" name="submit" value="View" /></center>
</form>
	
</div> </div>
	   </div>
	   </div>
	   </div>
<br /><br />
</body>	   	