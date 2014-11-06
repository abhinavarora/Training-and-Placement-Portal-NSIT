<?php session_start();
	if($_SESSION['auth']!=1)
	header("Location:index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
<title>Upload Content</title>	
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="robots" content="INDEX,FOLLOW" />
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

function validate_form(thisform)
{
with (thisform)
  {
 if (validate_required(name,"Name of the content to be uploaded must be filled out!")==false)
  {name.focus();return false;}
  if (validate_required(file,"Please select a file to upload!")==false)
  {file.focus();return false;}
    if (validate_required(recaptcha_response_field,"Characters in the image must be inserted!")==false)
  {recaptcha_response_field.focus();return false;}
    }
}
</script>
</head>
<body>
<div id="page-container">
		<div id="branding">
		<h1>PlaceComm <span>| Administrator</span></h1>
		</div><!-- end branding -->
		<div id="page-content" class="clearfix">
		<h1>Upload Content</h1>
		<h2><span>Maximum Upload Size = 2 MB</span></h2>
		<div class="inner-box clearfix">
		<div id="sidebar">
		<br/>
		<ul>
		<li class="head">Main Menu</li>
		<li><a href="index.php">Home</a></li>
		<li><a href="logout.php">Logout</a></li>
		<li><a href="users.php">View User Details</a></li>
		<li><a href="adduserplacement.php">Add User Placements</a></li>
		<li><a href="companyplacements.php">View Company Placements</a></li>
		<li><a href="listplacmnt.php">View User Placements</a></li>
		<li><a href="searchform.php">Search User</a></li>
		<li><a href="adduser.php">Add User</a></li>		
		<li><a href="listcompany.php">View Company List</a></li>
		<li><a href="addcompany.php">Add Company</a></li>		
		<li><a href="addmessage.php">Send Message</a></li>		
		<li><a href="listmessage.php">View Message</a></li>		
		<li><a href="registrations.php">View Registrations</a></li>
		<li class="current"><a href="uploadcontent.php">Upload Content</a></li>
		</ul>			
		</div><div id="table-block">
		<form onsubmit="return validate_form(this)" method="post" enctype="multipart/form-data" action="upload.php">
				<p style="font-size:18px;font-weight:normal;">
		Name of Content to be uploaded:<br /><br />
		 <input type="text" id="name" style="width:35%;font-size:16px;" name="name">		
		<br />
				Select a File to Upload:<br />
				<input type="file" name="file" id="file" style="width:35%;font-size:16px;"/>
				<br />
		<?php		require_once('../recaptchalib.php');
$publickey = "6Ld02boSAAAAAKfiNo2PNzSuOgU98bHZs0UI-d2f";
echo recaptcha_get_html($publickey, $_SESSION['error']);
unset($_SESSION['error']);
?>
<br />
<table style="width:40%;">
<tbody><tr>
<td><input type="submit" value="Upload" style="font-size:16px;" /></td>
<td><input type="reset" value="Reset" style="font-size:16px;" /></td></tr></tbody></table>
</form>
				</div>
				</div>
				</div>
				</div>
				</body>
				</html>