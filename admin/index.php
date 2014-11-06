<?php
session_start();
if($_SESSION['auth']!=1)
	header("Location:index.html");
?>
<head>

	<title>Administrator Login</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="INDEX,FOLLOW" />
	<link rel="stylesheet" type="text/css" href="css/template.css" />
	
</head>

<body>

	<div id="page-container">
		<div id="branding">
			<h1>PlaceComm <span>| Administrator Login</span></h1>
		</div><!-- end branding -->
		
		<div id="page-content" class="clearfix">
			
			<h1>Login</h1>
			
			<h2>Administrator Login <span>(SuperAdmin login for the placement system)</span></h2>
			<div class="inner-box clearfix">

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="800px" id="AutoNumber1">
  <tr>
    <td width="80%" valign= "top"><p>Welcome,<br>The Admin end allows you to effectively manage registrations and placement. Have fun!!</p>
</td>
    <td width="20%" valign="top"><div id="sidebar">
				<br/>
<ul>
<li class="head">Main Menu</li>
<li class="current"><a href="index.php">Home</a></li>
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
</div></td>
  </tr>
</table>				
				</div>
			</div>				
		</div><!-- end page-content -->
		
		<div id="page-footer">
			<!--
			<p><strong>NSIT Placement Management Portal | <a href="webteam.html">Webteam</a></p>
			-->	
		</div><!-- end page-footer -->
		
	</div><!-- end page-container -->

</body>


</html>
