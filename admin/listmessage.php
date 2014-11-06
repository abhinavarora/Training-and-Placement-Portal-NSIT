<?php
session_start();
		if($_SESSION['auth']!=1)
			 header("Location:index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title>List messages</title>
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
<?php
		$con=mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die("Could not connect");
		mysql_select_db("nsitonli_trndpl",$con) or die("Could not find db");
		$q="select * from news";
		$result=mysql_query($q);	
?>
		<div id="page-content" class="clearfix">
			<h1>Users</h1>
			<h2>Messages sent <span>(Click a row to edit)</span></h2>
		<div class="inner-box clearfix">
	<div id="sidebar">
				<br/>
				<ul>
				<li class="head">Main Menu</li>
				<li><a href="index.php">Home</a></li>
				<li><a href="logout.php">Logout</a></li>
				<li><a href="users.php">View User Details</a></li>
	<li><a href="adduserplacement.php">Add User Placements</a></li>
		<li><a href="companyplacements.php">View Company Placements</a></li>
				<li><a href="listplacmnt.php">View User Placements</a></li>
				<li><a href="searchform.php">Search User</a></li>
				<li><a href="adduser.php">Add User</a></li>
				<li><a href="listcompany.php">View Company List</a></li>
				<li><a href="addcompany.php">Add Company</a></li>
				<li><a href="addmessage.php">Send Message</a></li>
				<li class="current"><a href="listmessage.php">View Message</a></li>
				<li><a href="registrations.php">View Registrations</a></li>
				<li><a href="uploadcontent.php">Upload Content</a></li>
		<li><a href="viewuploads.php">View Uploads</a></li>
				</ul>				
				</div>
			<div id="table-block">

					<table cellspacing="0" cellpadding="0">
					<tbody>
						<tr class="header">
							<td>Publisher</td>
							<td>Title</td>
							<td>Date</td>
							<td>View</td>
						</tr>
				<?php
					$i=1;	
					while($row=mysql_fetch_array($result))
					{ $num=$row['nid'];?>
						<tr <?php if($i%2==1) echo 'class="alternate"';?>>
						<td><?php echo $row['publisher']; ?></td>
						<td><?php echo $row['title'];?></td>
						<td><?php echo $row['date'];?></td>
						<td><a href="<?php echo "editmessage.php?message=".$num; ?> ">View</a><td></tr>
				<?php						
					$i+=1;
					}	
					mysql_close($con);
				?></table>							
		</div><!-- end page-content -->
		
		<div id="page-footer">
			
			<p><strong>NSIT Placement Management Portal|<a href="webteam.html"><class = "current"><font color="#000000">Webteam</font></a></p>
				
		</div><!-- end page-footer -->
		
	</div><!-- end page-container -->

</body>

</html>



      
