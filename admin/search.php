<?php
session_start();
		if($_SESSION['auth']!=1)
			 header("Location:index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title>Search</title>
	
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
			
			<h1>Search</h1>
			
			<h2>Search the student database <span></span></h2>
			<div class="inner-box clearfix">
	<div id="sidebar">
				<br/>
				<ul>
<li class="head">Main Menu</li>
<li><a href="index.php">Home</a></li>
<li><a href="adduser.php">Add User</a></li>
<li class="current"><a href="searchform.php">Search User</a></li>
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
				</div>		<div id="table-block">

					<table cellspacing="0" cellpadding="0">
					<tbody>
						<tr class="header">
							<td>Student Name</td>
							<td>Branch</td>
							<td>Roll Number</td>
							<td>E-mail</td>
							<td>Contact</td>
							<td>Percentage</td>
							<td>Edit</td>
						</tr>
				<?php
					$con=mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die("Could not connect");
		mysql_select_db("nsitonli_trndpl",$con);$i=0;
		$q="select * from student where ";
		if($_POST['fname'])
			{$q=$q." fname='".$_POST['fname']."'";$i+=1;}
		if($_POST['lname'])
		{	if($i>0)
			$q=$q." and ";
			$q=$q." lname='".$_POST['lname']."'";
			$i+=1;
		}
		if($_POST['branch'])
		{	if($i>0)
				$q=$q." and" ;
			$i+=1;
			$q=$q." branch='".$_POST['branch']."'";
		}		
		if($_POST['rollnum'])
		{	if($i>0)
				$q=$q." and" ;
			$q=$q." rollnum='".$_POST['rollnum']."'";
		}		
		if($_POST['be_percent'])
		{	if($i>0)
				$q=$q." and" ;
			$i+=1;
			$q=$q." be_percentdrop >='".$_POST['be_percent']."'";
		}
		//echo $q;			
		$result = mysql_query($q) or die("Error:".mysql_error());
		$i=1;
		$csv = "Search Result\nRoll Numer,Name,BE Percentage,Contact,E-mail\n";	
		while($row= mysql_fetch_array($result))
					{ 
					  $num=$row['sid'];
					  if($i%2==1)
						$x = "<tr class= 'alternate'>"; 
					  else	
						$x ="<tr>";
						$x = $x."<td>".$row['fname']." ".$row["lname"]."</td>";
						$x = $x."<td>".$row['branch']."</td>";
						$x = $x."<td>".$row['rollnum']."</td>";
						$x = $x."<td>".$row['email']."</td>";
						$x = $x."<td>".$row['cntct']."</td>";
						$x = $x."<td>".$row['be_percentdrop']."</td>";
						$x = $x."<td><a href='/admin/edit.php?user=".$num."'>Edit</a><td></tr>";
						$i+=1;
					echo $x;
					$csv = $csv.$row['rollnum'].",".$row['fname']." ".$row['lname'].",".$row['be_percentdrop'].",".$row['cntct'].",".$row['email']."\n";
					}
					$fp = fopen('./Files/search-result.csv','w');
					if(!$fp)
					{
						echo "<h1>Write File Error!!</h1>";
						exit();
					}
					fwrite($fp,$csv);
					fclose($fp);
					mysql_close($con);
				?>
			</table><br><br><br>
		<a href="./Files/search-result.csv">Export table as CSV file</a>			
			</div>
		</div><!-- end page-content -->
		
		<div id="page-footer">
			
			<p><strong>NSIT Placement Management Portal|<a href="webteam.html"> Webteam</font></a></p>
				
		</div><!-- end page-footer -->
		
	</div><!-- end page-container -->

</body>

<!-- Mirrored from cssadmin.mip-design.com/index.html by HTTrack Website Copier/3.x [XR&CO'2008], Wed, 26 Nov 2008 20:37:30 GMT -->
</html>
