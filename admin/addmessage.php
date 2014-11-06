<?php
session_start();
if($_SESSION['auth']!=1)
	 header("Location:index.php");
	?>
<head>
	<title>Add Message</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="INDEX,FOLLOW" />
	<link rel="stylesheet" type="text/css" href="css/template.css" /><!-- TinyMCE --><script type="text/javascript" src="tiny_mce/tiny_mce.js"></script><script type="text/javascript">	tinyMCE.init({		mode : "textareas",		theme : "simple"	});</script><!-- /TinyMCE -->	
</head>
<body>
	<div id="page-container">
		<div id="branding">
			<h1>PlaceComm <span>| Administrator</span></h1>
		</div><!-- end branding -->
		<div id="page-content" class="clearfix">
			
			<h1>Send Message</h1>
			<h2>Add Message <span>Send message to Batch</span></h2>
			<div class="inner-box clearfix">
			
				<div id="sidebar">
				<br/>
				<ul>
 <li class="head">Main Menu</li>
<li ><a href="index.php">Home</a></li>
<li><a href="adduser.php">Add User</a></li>
<li><a href="searchform.php">Search User</a></li>
<li><a href="delete_user.php">Delete User</a></li>
<li><a href="users.php">View User Details</a></li>
<li><a href="adduserplacement.php">Add User Placements</a></li>
<li><a href="listplacmnt.php">View User Placements</a></li>
<li class="current"><a href="addmessage.php">Send Message</a></li>
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
					<form method="post" action="/admin/insertmessage.php">
					<label for="field_1">Message Title</label>
					<input type="text" name="title" id="field_1" " class="short" />
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_2">Publisher</label>
					<input type="text" name="publisher" id="field_1" class="short" />
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_3">Content</label>
					<textarea  id="elm1" rows="3" name="content" cols="20"></textarea></p>
					<em><!--Insert info about field here--></em>
					<br/>
					<input type="submit" name="submit" class="submit" value="Send News"  />
					<input type="reset" class="submit reset" value="Reset form"  />
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
