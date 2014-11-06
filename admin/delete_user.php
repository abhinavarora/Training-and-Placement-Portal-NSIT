<?php
session_start();
	if($_SESSION['auth']!=1)
		 header("Location:index.php");
?>
<!-- Mirrored from cssadmin.mip-design.com/index.html by HTTrack Website Copier/3.x [XR&CO'2008], Wed, 26 Nov 2008 20:37:30 GMT -->
<head>

	<title>NSIT Placement Portal</title>
	
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="INDEX,FOLLOW" />
	
	<link rel="stylesheet" type="text/css" href="css/template.css" />
	<script type="text/javascript">
	function cnfrm()
	{
	var x =  document.getElementById("field_1");
	if(confirm("You Wish to delete all Details of Roll Number "+x.value+" ??"))
		return true;
	else
		x.focus();
		return true;
	}
	</script>
</head>

<body>

	<div id="page-container">
	
		<div id="branding">
			
			<h1>Placecom | <span>Administration End</span></h1>
				
		</div><!-- end branding -->
		<div id="page-content" class="clearfix">
			
			<h1>Delete User</h1>
			
			<h2>Delete User From Portal</h2>
			<div class="inner-box clearfix">

			<table border="0" cellpadding="0" cellspacing="0" width:"750px">
			<tr>
			<td width="80%" valign="top">
			<div id="form-block">
			<?php
				$roll = $_POST['roll'];
				if(!isset($roll))
				{
			?>
				<form method="post" action="delete_user.php" >
				<label>Enter the Roll Number of Student:</label>
				<input type = "text" name="roll" cols="7" id="field_1" onchange="return cnfrm()">
				<input type="submit" class="submit" value="Delete"  />
				<input type="reset" class="submit reset" value="Reset form" />
			<?php
				}
				else
				{
				$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die("Could not connect");
				mysql_select_db("nsitonli_trndpl",$con) or die("Could not find db");
				$q = "SELECT * FROM student WHERE rollnum = '".$roll."'";
				$res = mysql_query($q,$con) or die(mysql_error());
				if($num = mysql_num_rows($res) == 1)
				{
				$q="delete from student where rollnum = '".$roll."'";
				$res = mysql_query($q,$con) or die(mysql_error());
				$q="delete from resume where rollnum = '".$roll."'";
				$res = mysql_query($q,$con) or die(mysql_error());
				$q="delete from placement where roll_num = '".$roll."'";
				$res = mysql_query($q,$con) or die(mysql_error());
				$q="delete from companyapply where student_rollnum = '".$roll."'";
				$res = mysql_query($q,$con) or die(mysql_error());
				echo"<h3>User with Roll Number ".$roll." Successfully Deleted";
				}
				else
				echo "<h2>User with Roll Number ".$roll." Not Found!!<br/>Please try again!!!</h2>";
				mysql_close($con);
				}
			?>
			</div>
			</td><td width="20%">
			<div id="sidebar">
			<br/>	<ul>
<li class="head">Main Menu</li>
<li><a href="index.php">Home</a></li>
<li><a href="adduser.php">Add User</a></li>
<li><a href="searchform.php">Search User</a></li>
<li class="current"><a href="delete_user.php">Delete User</a></li>
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
</td></tr>
			</div>				
		</div><!-- end page-content -->
	
		
	</div><!-- end page-container -->

</body>

<!-- Mirrored from cssadmin.mip-design.com/index.html by HTTrack Website Copier/3.x [XR&CO'2008], Wed, 26 Nov 2008 20:37:30 GMT -->
</html>
