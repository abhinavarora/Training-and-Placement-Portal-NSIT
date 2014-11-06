<?php
session_start();
if($_SESSION['auth']!=1)
	 header("Location:index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>List companies</title>
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
			<h1>Users</h1>
			<h2>Company information <span>(Click a row to edit)</span></h2>
			<div class="inner-box clearfix">
		<div id="sidebar">
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
<li class="current"><a href="listcompany.php">View Company List</a></li>
<li><a href="companyplacements.php">View Company Placements</a></li>
<li><a href="registrations.php">View Registrations</a></li>
<li><a href="company.php">Create Company Login</a></li>
<li><a href="companyloginlist.php">Company Login List</a></li>
<li><a href="contacts.html">Contacts</a></li>
<li><a href="logout.php">Logout</a></li>
				</ul>				
				</div>		
			<div id="table-block" >
			<table cellspacing="0" cellpadding="0">
			<tbody>
			<tr class="header">
							<td>Company Name</td>
							<td>Grade</td>
							<td>Cut-off</td>
							<td>Branches allowed</td>
							<td>Backs allowed</td>
							<td>Details</td>
							<td>Edit</td>
						</tr>
	<?php
	$con=mysql_connect('localhost','nsitonli_potter','Rj9868045066') or die("Could not connect");
	mysql_select_db('nsitonli_trndpl',$con) or die("Could not find db");
	$q = "select * from company";
	$result=mysql_query($q);
	$i=1;	
	$str = "Name,Grade,Cut-Off,Branches-Allowed,Details\n";
	while($row=mysql_fetch_array($result))
	{ 
		$num=$row['cid'];
	?>	
				<tr <?php if($i%2==1) echo 'class="alternate"';?>>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['grade'];?></td>
						<td><?php echo $row['cut_off'];?></td>
						<td><?php echo $row['branches_allowed'];?></td>
						<td><?php echo $row['backs_allowed'];?></td>
						<td><?php echo $row['details'];?></td>
						<td><a href="editcompany.php?user=<?php echo $num?>">Edit</a><td></tr>
				<?php						
					$i+=1;
		$val = str_replace(",",";",$row['branches_allowed']);
		$val1 = str_replace(",",";",$row['details']);
		$str = $str.$row['name'].",".$row['grade'].",".$row['cut_off'].",".$val.",".$row['backs_allowed'].$val1."\n";
	}	
	mysql_close($con);
	$fp = fopen("./Files/companylist.csv","w");
	if(!$fp)
	{
	echo "Write Error!!";
	}
	fwrite($fp,$str);
	fclose($fp);	
?>
</table>
<h3><a href="./Files/companylist.csv">Export company list</a></h3>
</div>						
		</div><!-- end page-content -->
		<div id="page-footer">
			<p><strong>NSIT Placement Management Portal|<a href="webteam.html"><class = "current"><font color="#000000">Webteam</font></a></p>
		</div><!-- end page-footer -->
	</div><!-- end page-container -->
</body>
</html>