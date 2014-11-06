<?php
session_start();
	if($_SESSION['auth']!=1)
		 header("Location:index.php");
?>
<!-- Mirrored from cssadmin.mip-design.com/index.html by HTTrack Website Copier/3.x [XR&CO'2008], Wed, 26 Nov 2008 20:37:30 GMT -->
<head>

	<title>Edit User Placement</title>
	
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="INDEX,FOLLOW" />
	
	<link rel="stylesheet" type="text/css" href="css/template.css" />
	
</head>

<body>

	<div id="page-container">
	
		<div id="branding">
			
			<h1>Edit Placement</h1>
				
		</div><!-- end branding -->
		<div id="page-content" class="clearfix">
			
			<h1>Edit Placement</h1>
			
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
				<?php
				$id = $_GET['user'];
				$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die("Could not connect");
				mysql_select_db("nsitonli_trndpl",$con) or die("Could not find db");
				
$q="SELECT s.rollnum, s.lname, s.fname, s.cntct, s.email, p.job_1, p.job_2, p.job_3, p.job_4 FROM student as s, placement as p WHERE s.rollnum = p.roll_num AND s.rollnum = '".$id."'";
				$res = mysql_query($q,$con) or die(mysql_error());
				$row = mysql_fetch_array($res) or die(mysql_error());
				?>
					<form method="post" action="updateplacmnt.php?id=<?php echo $row['rollnum'];?>">
					<label for="field_1">Name: <?php echo $row['fname']." ".$row['lname']; ?> </label>
					<label for="field_2">Roll Numebr: <?php echo $row['rollnum']; ?></label>
					<label for="field_3">Contact: <?php echo $row['cntct']; ?> </label>
					<label for="field_4">Placement 1(DREAM):</label>
					<input type = "text" name="job1" rows="5" cols="7" id="field_5" value="<?php echo $row['job_1']; ?>" >
					<label for="field_4">Placement 2(A++):</label>
					<input type = "text" name="job2" rows="5" cols="7" id="field_6" value="<?php echo $row['job_2']; ?>" >
					<label for="field_4">Placement 3(A+):</label>
					<input type = "text" name="job3" rows="5" cols="7" id="field_7" value="<?php echo $row['job_3']; ?>" >
					<label for="field_4">Placement 4(A):</label>
					<input type = "text" name="job4" rows="5" cols="7" id="field_8" value="<?php echo $row['job_4']; ?>" >
					<input type="submit" class="submit" value="Save"  />
					<input type="reset" class="submit reset" value="Reset form" />
				
				</div>
			
			</div>

			
			
				
		</div><!-- end page-content -->
		
		<div id="page-footer">
			
			<p><strong>NSIT Placement Management Portal|<a href="webteam.html">Webteam</a></p>
				
		</div><!-- end page-footer -->
		
	</div><!-- end page-container -->

</body>

<!-- Mirrored from cssadmin.mip-design.com/index.html by HTTrack Website Copier/3.x [XR&CO'2008], Wed, 26 Nov 2008 20:37:30 GMT -->
</html>
