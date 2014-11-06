<?php
session_start();
if($_SESSION['auth'] != 1)
	header("Location:index.php");
?>
<!-- Mirrored from cssadmin.mip-design.com/table.html by HTTrack Website Copier/3.x [XR&CO'2008], Wed, 26 Nov 2008 20:37:30 GMT -->
<head>

	<title>Placement Details</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="INDEX,FOLLOW" />
	
	<link rel="stylesheet" type="text/css" href="css/template.css" />
	
</head>

<body>

	<div id="page-container">
	
		<div id="branding">
			
			<h1>PlaceComm | <span>Administrator</span></h1>
				
		</div><!-- end branding -->
		<div id="page-content" class="clearfix">
			
			<h1>Users' Placement Record</h1>
			<h2>Student Placements | <span>Click Row to Edit</span></h2>
		<div class="inner-box clearfix">
		<div id="sidebar">
<ul>
<li class="head">Main Menu</li>
<li class="current"><a href="index.php">Home</a></li>
<li><a href="adduser.php">Add User</a></li>
<li><a href="searchform.php">Search User</a></li>
<li><a href="delete_user.php">Delete User</a></li>
<li><a href="users.php">View User Details</a></li>
<li><a href="adduserplacement.php">Add User Placements</a></li>
<li class="current"><a href="listplacmnt.php">View User Placements</a></li>
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
		<div id="table-block">
		<h1>Select Branch:</h1>
		<h3><a href="listplacmnt.php?branch=coe">COE</a>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </h3>
		<h3><a href="listplacmnt.php?branch=ece">ECE</a></h3>
		<h3><a href="listplacmnt.php?branch=ice">ICE</a></h3>
		<h3><a href="listplacmnt.php?branch=it">IT</a></h3>
		<h3><a href="listplacmnt.php?branch=mpa">MPAE</a></h3>
		<h3><a href="listplacmnt.php?branch=bt">BT</a></h3>
		<h3><a href="listplacmnt.php?branch=pc">PC</a></h3>
		<h3><a href="listplacmnt.php?branch=is">IS</a></h3>
		<h3><a href="listplacmnt.php?branch=sp">SP</a></h3>
		<table cellspacing="0" cellpadding="0">
					<tbody>
						<tr class="header">
							<td>Name</td>
							<td>Roll No.</td>
							<td>Contact</td>
							<td>Percentage</td>
							<td>Job: 1 </td>
							<td>Job: 2 </td>
							<td>Job: 3 </td>
							<td>Job: 4 </td>
							<td>Edit</td>
							</tr>
		<?php
		$branch = $_GET['branch'];
		if(isset($branch))
		{
		$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die("Could not connect");
		mysql_select_db("nsitonli_trndpl",$con) or die("Could not find db");
		$q=" SELECT s.rollnum, s.lname, s.fname, s.be_percentdrop, s.cntct, s.email, p.job_1, p.job_2, p.job_3, p.job_4 FROM student as s, placement as p WHERE s.rollnum = p.roll_num AND s.branch ='".$branch."'";
		$result = mysql_query($q,$con) or die("Query:".mysql_error());
		$i=1;	
		while($row= mysql_fetch_array($result))
					{ 
					  $num=$row['rollnum'];
					  if($i%2==1)
						$x = "<tr class= 'alternate'>"; 
					  else	
						$x ="<tr>";
						$x = $x."<td>".$row['fname']." ".$row["lname"]."</td>";
						$x = $x."<td>".$row['rollnum']."</td>";
						$x = $x."<td>".$row['cntct']."</td>";
						$x = $x."<td>".$row['be_percentdrop']."</td>";
						$x = $x."<td>".$row['job_1']."</td>";
						$x = $x."<td>".$row['job_2']."</td>";
						$x = $x."<td>".$row['job_3']."</td>";
						$x = $x."<td>".$row['job_4']."</td>";
						$x = $x."<td><a href='editplacmnt.php?user=".$num."'>Edit</a><td></tr>";
						$i+=1;
					echo $x;
					}	
				mysql_close($con);
				}
		?>
		</tbody>
		</table>
		</div>
		</div><!-- end page-content -->
		
		<div id="page-footer">
			
			<p><strong>NSIT Placement Management Portal|<a href="webteam.html"><class = "current"><font color="#000000">Webteam</font></a></p>
				
		</div><!-- end page-footer -->
		
	</div><!-- end page-container -->

</body>

<!-- Mirrored from cssadmin.mip-design.com/table.html by HTTrack Website Copier/3.x [XR&CO'2008], Wed, 26 Nov 2008 20:37:30 GMT -->
</html>
