<?php
session_start();
		if($_SESSION['auth']!=1)
			 header("Location:index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Add Company</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="INDEX,FOLLOW" />
	<link rel="stylesheet" type="text/css" href="css/template.css" /><script language="javascript" type="text/javascript" src="datetimepicker.js"></script>
</head>
<body>
	<div id="page-container">
		<div id="branding">
			<h1>PlaceComm <span>| Administrator</span></h1>
		</div><!-- end branding -->
		<div id="page-content" class="clearfix">
			
			<h1>Company</h1>
			<h2>Add a Company</h2>
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
<li class="current"><a href="addcompany.php">Add Company</a></li>
<li><a href="listcompany.php">View Company List</a></li>
<li><a href="companyplacements.php">View Company Placements</a></li>
<li><a href="registrations.php">View Registrations</a></li>
<li><a href="company.php">Create Company Login</a></li>
<li><a href="companyloginlist.php">Company Login List</a></li>
<li><a href="contacts.html">Contacts</a></li>
<li><a href="logout.php">Logout</a></li>
				</ul>				
				</div>
				<div id="form-block" width:"750px">
					<form method="post" name="addcompany" action="/admin/insertcompany.php">
					<label for="field_1">Company Name</label>
					<input type="text" name="name" id="field_1"  class="short" />
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_2">Grade</label>
					<select name="grade" id="field_2" class="short" />
					<OPTION>Dream</OPTION>
					<OPTION>A++</OPTION>
					<OPTION>A+</OPTION>
					<OPTION>A</OPTION>
					</select>
					<br/>
					<label for="field_3">Cut-off</label>
					<input type="text" class="short" name="cut_off" id="field_3" />
					<em><!--Insert info about field here--></em>
					<br/>					<select name="companycategory">					<option value="COE">COE Core</option>					<option value="ECE">ECE CORE</option>					<option value="NonTech">Non-Technical</option>					<option value="ICE">ICE core</option>					</select>					<br/>					
					<label for="field_4">Branches allowed</label><p>
					COE<input type="checkbox" name="coe" value="COE"><br>
					ECE<input type="checkbox" name="ece" value="ECE"><br>
					ICE<input type="checkbox" name="ice" value="ICE"><br>
					IT<input type="checkbox" name="it" value="IT"><br>
					MPA<input type="checkbox" name="mpa" value="MPA"><br>
					BT<input type="checkbox" name="bt" value="BT"><br>
					M. Tech(SP)<input type="checkbox" name="SP" value="M.Tech(SP)"><br>
					M. Tech(IS)<input type="checkbox" name="IS" value="M.Tech(IS)"><br>
					M. Tech(PC)<input type="checkbox" name="PC" value="M.Tech(PC)"></p>

					<label for="field_5">Backs allowed</label>
					<input type="text"  name="backs_allowed" id="field_5" ></input>
					<em>Please specify Number(0,1....)</em>
					<br/>
					<label for="field_6">Details</label>
					<input type="text" rows="3" name="details" cols="3" id="field_6" ></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_7">Closing Date (dd/mm/yyyy)</label>
<input id="date" type="text" name="close_date" class="short" size="45" style="float:left;" readonly>&nbsp;&nbsp;&nbsp;<a href="javascript:NewCal('date','ddmmyyyy',true,24)"><img src="cal.gif" width="25" height="25" border="0" alt="Pick a date"></a>
<br/>	<br/>			
<input type="submit" name="submit" class="submit" value="Add"  />
<input type="reset" class="submit reset" value="Reset form"  />
</form>
</div>
</div>

		</div><!-- end page-content -->
		
		<div id="page-footer">
			
			<p><strong><strong>NSIT Placement Management Portal|<a href="webteam.html">Webteam</a></p>
				
		</div><!-- end page-footer -->
		
	</div><!-- end page-container -->

</body>


</html>
