<?php
session_start();
		if($_SESSION['auth']!=1)
			 header("Location:index.php");
		$con=mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die("Could not connect");
		mysql_select_db("nsitonli_trndpl",$con) or die("Could not find db");
		$q="select * from company where cid=".$_GET['user'];
		$result=mysql_query($q);
		$num=mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		date_default_timezone_set('Asia/Calcutta');

	?>
<head>
	<title>Edit Company</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="INDEX,FOLLOW" />
	<link rel="stylesheet" type="text/css" href="css/template.css" />
<script language="javascript" type="text/javascript" src="datetimepicker.js"></script>

</head>
<body>
	<div id="page-container">
	<div id="branding">
			<h1>PlaceComm <span>| Administrator</span></h1>
				
		</div><!-- end branding -->
		<div id="page-content" class="clearfix">
			
			<h1>Content</h1>
			<h2>Group title goes here <span>(short description)</span></h2>
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
<li><a href="company.php">Create Company Login</a></li>
<li><a href="companyloginlist.php">Company Login List</a></li>
<li><a href="contacts.html">Contacts</a></li>
<li><a href="logout.php">Logout</a></li>
				</ul>				
				</div>
				<div id="form-block">
					<form method="post" action="updatecompany.php?id=<?php echo $_GET['user'];?>">
					<label for="field_1">Company Name</label>
					<input type="text" name="name" id="field_1" value="<?php echo $row['name']; ?>" class="short" />
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_2">Grade</label>
					<input type="text" name="grade" id="field_2" class="short" value="<?php echo $row['grade']; ?>"/>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_3">Cut-off</label>
					<input type="text" name="cut_off" id="field_3" value="<?php echo $row['cut_off']; ?>"/>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_4">Branches allowed</label>
					<input type="text" name="branches_allowed" id="field_4" value="<?php echo $row['branches_allowed']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_5">Backs allowed</label>
					<input type="text" name="backs_allowed" id="field_5" value="<?php echo $row['backs_allowed']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_6">Details</label>
					<input type="text" rows="3" name="details" cols="3" id="field_6" value="<?php echo $row['details']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
				<label for="field_7">Closing Date (dd/mm/yyyy)</label>
<input id="date" type="text" name="close_date" value="<?php $val = date(DATE_RSS,$row['close_date']);echo $val;?>" class="short" size="60" style="float:left;" readonly>&nbsp;&nbsp;&nbsp;<a href="javascript:NewCal('date','ddmmyyyy',true,24)"><img src="cal.gif" width="25" height="25" border="0" alt="Pick a date"></a>
<br/>	<br/>			
					<input type="submit" name="submit" class="submit" value="Save"  />
					<input type="reset" class="submit reset" value="Reset form"  />
				</form>
				</div>
			
			</div>

			
		</div><!-- end page-content -->
		
		<div id="page-footer">
			
			<p><strong>NSIT Placement Committee</strong> - &copy; Copyright 2010<br />

				
		</div><!-- end page-footer -->
		
	</div><!-- end page-container -->

</body>


</html>
