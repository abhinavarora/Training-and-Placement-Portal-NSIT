<?php session_start();
		if($_SESSION['auth']!=1)
			header("Location:index.php");		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Add User Placements</title>
	<div style="background-image:url('../images/bigLoader.gif');"></div>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="INDEX,FOLLOW" />
	<link rel="stylesheet" type="text/css" href="css/template.css" />
	<script type="text/javascript" src="../js/jquery-1.2.6.js"></script>
	<script type="text/javascript">	
	var num=1;function validate_form(thisform){with (thisform)  { if (validate_required(name,"Name of the content to be uploaded must be filled out!")==false)  {name.focus();return false;}  if (validate_required(file,"Please select a file to upload!")==false)  {file.focus();return false;}    if (validate_required(recaptcha_response_field,"Characters in the image must be inserted!")==false)  {recaptcha_response_field.focus();return false;}  }}
	function isNumeric(val) {
    var numeric = true;
    var chars = "0123456789";
    var len = val.length;
    var char = "";
    for (i=0; i<len; i++) { char = val.charAt(i); if (chars.indexOf(char)==-1) { numeric = false; } }
    return numeric;
}
	function getinfo()
	{
	num=1;
var company = document.getElementById('comp').value;
if (company=="NULL")
  { 
  alert('Please select a Company!');
  document.getElementById("information").innerHTML="";
  return;
  }
 document.getElementById("information").innerHTML="<img src='../images/bigLoader.gif' alt='Loading'/>"
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
xmlhttp.open("GET","getinfo.php?c="+company,true);
xmlhttp.send();
	}
	

function firstcall()
{
var total = document.getElementById('total').value;
	if (total==0 || !isNumeric(total))
	{
	document.getElementById("messg").innerHTML='';
	 document.getElementById("d1").innerHTML=""
	alert('Please Enter a Valid Number!');
	return;
	}
	document.getElementById('total').disabled=true
	document.getElementById('comp').disabled=true
	 document.getElementById("messg").innerHTML='<p style="font-size:18px;font-weight:normal;">Enter Student Roll Numbers:</p>';
	addstudents(num);
}	
document.onkeypress = function()
{
    if( window.event.keyCode == 13 ) // enter key
    {
        return false; // this will prevent bubbling ( sending it to children ) the event!
    }
}
function checkform()
{
document.getElementById('total').disabled=false
	document.getElementById('comp').disabled=false
	return true;
}function validate_required(field,alerttxt){with (field)  {  if (value==null||value=="")    {    alert(alerttxt);return false;    }  else    {    return true;    }  }}
</script>
</head>
	<body>
	<div id="page-container">
		<div id="branding">
			<h1>PlaceComm <span>| Administrator</span></h1>
		</div><!-- end branding -->
		<div id="page-content" class="clearfix">
			
			<h1>Add User Placements</h1>
			<h2></h2>
			<div class="inner-box clearfix">
			<div id="sidebar">
				<br/>
				<ul>
<li class="head">Main Menu</li>
<li><a href="index.php">Home</a></li>
<li><a href="adduser.php">Add User</a></li>
<li><a href="searchform.php">Search User</a></li>
<li><a href="delete_user.php">Delete User</a></li>
<li><a href="users.php">View User Details</a></li>
<li  class="current"><a href="adduserplacement.php">Add User Placements</a></li>
<li><a href="listplacmnt.php">View User Placements</a></li>
<li><a href="addmessage.php">Send Message</a></li>
<li><a href="listmessage.php">View Message</a></li>
<li><a href="uploadcontent.php">Upload Content</a></li>
<li><a href="viewuploads.php">View Uploads</a></li>
<li><a href="addcompany.php">Add Company</a></li>
<li><a href="listcompany.php">View Company List</a></li>
<li><a href="companyplacements.php">View Company Placements</a></li>
<li><a href="registrations.php">View Registrations</a></li>
<li><a href="company.php">Create Company Login</a></li>
<li><a href="companyloginlist.php">Company Login List</a></li>
<li><a href="contacts.html">Contacts</a></li>
<li><a href="logout.php">Logout</a></li>
				</ul>				
				</div><form onsubmit="return validate_form(this)" method="post" enctype="multipart/form-data" action="uploadcsv.php"><div><p style="font-size:18px;font-weight:normal;">Add user placements by uploading csv : </p><div id="table-block">		<!--<form onsubmit="return validate_form(this)" method="post" enctype="multipart/form-data" action="uploadcsv.php">-->				<p style="font-size:18px;font-weight:normal;">		Name of Company :<br />		 <input type="text" id="name" style="width:35%;font-size:16px;" name="name">					<br />		Company Grade(A/A+/A++/Dream) :<br />		 <input type="text" id="cgrade" style="width:35%;font-size:16px;" name="cgrade">			 		<br />		<br />Note: The csv file should have a list of roll numbers of the selected candidates in the first column.<br />				Select a File to Upload:<br />				<input type="file" name="file" id="file" style="width:35%;font-size:16px;"/>				<br />		<?php		require_once('../recaptchalib.php');$publickey = "6Ld02boSAAAAAKfiNo2PNzSuOgU98bHZs0UI-d2f";echo recaptcha_get_html($publickey, $_SESSION['error']);unset($_SESSION['error']);?><br /><table style="width:40%;"><tbody><tr><td><input type="submit" value="Upload" style="font-size:16px;" /></td><td><input type="reset" value="Reset" style="font-size:16px;" /></td></tr></tbody></table></form></div></div><br/><br/>
				</div>
				</div>
				</div><br /><br />
				</body>
				</html>