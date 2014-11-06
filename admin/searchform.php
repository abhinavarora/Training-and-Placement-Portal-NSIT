<?php
session_start();
if($_SESSION['auth']!=1)
	header("Location:index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Search</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="INDEX,FOLLOW" />
	<link rel="stylesheet" type="text/css" href="css/template.css" />
</head>

<body>
	<div id="page-container">
		<div id="branding">
			<h1>PlaceComm <span>| Administrator</span></h1>
		</div><!-- end branding -->
		
		<div id="page-content" class="clearfix">
			
			<h1>Search</h1>
			
			<h2>Search the student database <span></span></h2>
			<div class="inner-box clearfix">
	<div id="sidebar">
				<br/>
				<ul>
<li class="head">Main Menu</li>
<li><a href="index.php">Home</a></li>
<li><a href="adduser.php">Add User</a></li>
<li class="current"><a href="searchform.php">Search User</a></li>
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
<li><a href="company.php">Create Company Login</a></li>
<li><a href="companyloginlist.php">Company Login List</a></li>
<li><a href="contacts.html">Contacts</a></li>
<li><a href="logout.php">Logout</a></li>
				</ul>				
				</div>
				<div id="form-block">
				<form method="post" action="search.php">
				
					<label for="field_1">First Name</label>
					<input type="text" name="fname" id="field_1" class="short" />
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_2">Last name</label>
					<input type="text" name="lname" id="field_2" class="short" />
					<em><!--Insert info about field here--></em>
					<br/>
					
					<label for="field_4">Branch</label>
					<select name="branch" id="field_4" >
					<OPTION>COE</OPTION>
					<OPTION>ECE</OPTION>
					<OPTION>ICE</OPTION>
					<OPTION>IT</OPTION>
					<OPTION>MPA</OPTION>
					<OPTION>BT</OPTION>
					</select>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_6">Roll number</label>
					<input type="text" rows="3" name="rollnum" cols="3" id="field_4" ></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_7">BE Percentage greater than</label>
					<input type="text" rows="3" cols="3" name="be_percent" id="field_4" ></input>
					<em><!--Insert info about field here--></em>
					<br/>
					
					<input type="submit" class="submit" value="Search"  />
					<input type="reset" class="submit reset" value="Reset" />
				</form>
				</div>
			
			</div>

			
			
				
		</div><!-- end page-content -->
		
		<div id="page-footer">
			
			<p><strong>NSIT Placement Management Portal|<a href="webteam.html">Webteam</a></p>
				
		</div><!-- end page-footer -->
		
	</div><!-- end page-container -->

</body>

</html>
