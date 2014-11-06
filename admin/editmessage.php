<?php
session_start();
		if($_SESSION['auth']!=1)
			 header("Location:index.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<title>Messsage</title>
	
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
			
			<h1>Content</h1>
			<h2>Complete Message</h2>
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
<?php
		$con=mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die("Could not connect");
		mysql_select_db("nsitonli_trndpl",$con) or die("Could not find db");
		$q="select * from news where nid=".$_GET['message'];
		$result=mysql_query($q);
		$num=mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		echo "<h2 align='centre'>".$row['title']."</h2><br>";
		echo "<h3 align='left'>Publisher:  ".$row['publisher']."<br>Date & Time:  ".$row['date']."</h3><br>";
		echo "<p align='justify'>".$row['content']."</p>";			
		?>
		</div>

			
		</div><!-- end page-content -->
		
		<div id="page-footer">
			
			<p><strong>NSIT Placement Management Portal|<a href="webteam.html">Webteam</a></p>

				
		</div><!-- end page-footer -->
		
	</div><!-- end page-container -->

</body>


</html>
