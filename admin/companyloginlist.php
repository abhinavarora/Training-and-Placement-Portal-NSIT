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
	var x=document.getElementById("rahul");
	if(confirm("You Wish to delete all Details of Roll Number "+ x.value +" ??"))
		return true;
	else
	{
	x.focus();	
	return false;
	}
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
<li class="current"><a href="companyloginlist.php">Company Login List</a></li>
<li><a href="contacts.html">Contacts</a></li>
<li><a href="logout.php">Logout</a></li>
				</ul>				
				</div>
				<div id="table-block" style="overflow:auto; width:650px">
				<table cellspacing="0" cellpadding="0">
					<tbody>
						<tr class="header">
							<td>Serial No.</td>
							<td>Company Name</td>
							<td>Username</td>
						</tr>
				<?php
				$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die("Could not connect");
				mysql_select_db("nsitonli_trndpl",$con) or die("Could not find db");
				$q="SELECT * FROM companyprofile";
				$res = mysql_query($q,$con) or die(mysql_error());
				$i = 1;
				while($row= mysql_fetch_array($res))
				{ 
					  if($i%2==1)
						$x = "<tr class= 'alternate'>"; 
					  else
						$x ="<tr>";
					  $x = $x."<td>".$i."</td>";
					  $x = $x."<td>".$row['cname']."</td>";
					  $x = $x."<td>".$row['username']."<td></tr>";
					  $i+=1;
					echo $x;
				}	
				mysql_close($con);
				?>
			</table>
			</div>				
		</div><!-- end page-content -->
		
		<div id="page-footer">
			
			<p><strong>NSIT Placement Management Portal|<a href="webteam.html">Webteam</a></p>
				
		</div><!-- end page-footer -->
		
	</div><!-- end page-container -->

</body>

<!-- Mirrored from cssadmin.mip-design.com/index.html by HTTrack Website Copier/3.x [XR&CO'2008], Wed, 26 Nov 2008 20:37:30 GMT -->
</html>

