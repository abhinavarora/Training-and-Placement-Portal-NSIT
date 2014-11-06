<?php
session_start();
		if($_SESSION['auth']!=1)
			 header("Location:index.php");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title>Create Company Login</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="INDEX,FOLLOW" />
	<link rel="stylesheet" type="text/css" href="css/template.css" />
<script type="text/javascript">	
function validate_form(thisform)
{
with (thisform)
  {
 if( password.value != cpassword.value)
  	{
  	    alert("Passwords Dont Match!!");
  	    cnfrmpwd.focus();
  	    pwd.focus();
  	    return false;
  	}
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
			<h1>Company Login</h1>
			<h2>Create Company Account</h2>
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
<li><a href="adduserplacement.php">Add User Placements</a></li>
<li><a href="listplacmnt.php">View User Placements</a></li>
<li><a href="addmessage.php">Send Message</a></li>
<li><a href="listmessage.php">View Message</a></li>
<li><a href="uploadcontent.php">Upload Content</a></li>
<li><a href="viewuploads.php">View Uploads</a></li>
<li><a href="addcompany.php">Add Company</a></li>
<li><a href="listcompany.php">View Company List</a></li>
<li><a href="companyplacements.php">View Company Placements</a></li>
<li><a href="registrations.php">View Registrations</a></li>
<li class="current"><a href="company.php">Create Company Login</a></li>
<li><a href="companyloginlist.php">Company Login List</a></li>
<li><a href="contacts.html">Contacts</a></li>
<li><a href="logout.php">Logout</a></li>
				</ul>				
				</div>
		<div id="form-block">
			<?php
				$company = $_POST['name'];
				if(isset($company))
				{
				$pwd = md5($_POST['password']);
				$con=mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die("could not connect");
				mysql_select_db("nsitonli_trndpl",$con);
				$q = "INSERT INTO `nsitonli_tnp12`.`companyprofile` (`username`, `password`, `cname`, `address`, `city`, `state`, `pincode`, `contact`, `fax`, `website`, `hr_name`, `hr_designation`, `mobile`, `landline`, `email`, `head_name`, `head_mobile`, `head_landline`, `head_email`, `job_desig`, `job_describe`, `place`, `date`, `hra`, `gross`, `othercompensation`, `takehome`, `cost`, `details`, `mhra`, `mgross`, `mothercompensation`, `mtakehome`, `mcost`, `mdetails`, `ece`, `cse`, `it`, `ice`, `mpae`, `bt`, `sp`, `infos`, `pc`, `ppt`, `percent`, `test`, `testtype`, `gd`, `ti`, `hri`, `others`, `bond`, `bonddetails`, `days`, `executives`, `rooms`, `loginstatus`) VALUES ('$company', '$pwd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";
				$res = mysql_query($q);
				if($res)
					echo "<h3>Login for the Company ".$company." has been created<h3>";
				else
					echo "<h3>Insert Error</h3>";
				}
				else
				{
			?>
				<form method="post" onsubmit="return validate_form(this)" action="company.php"> 
					<label for="field_1">Company Name</label>
					<input type="text" name="name" id="field_1" class="short" />
					<br/>
					<label for="field_2">Password</label>
					<input type="password" name="password" id="field_2" class="short" />
					<br/>
					<label for="field_2">Confirm Password</label>
					<input type="password" name="cpassword" id="field_3" class="short" />
					<br/>
					<input type="submit" class="submit" value="Save"  />
					<input type="reset" class="submit reset" value="Reset" />
				</form>
			<?php
			}?>
				
		</div>
		
		</div>
				
		</div><!-- end page-content -->
		
		<div id="page-footer">
			
			<p><strong>NSIT Placement Management Portal|<a href="webteam.html">Webteam</a></p>
				
		</div><!-- end page-footer -->
		
	</div><!-- end page-container -->

</body>

</html>
