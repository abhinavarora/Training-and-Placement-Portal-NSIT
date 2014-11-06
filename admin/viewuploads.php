<?php session_start();
	if($_SESSION['auth']!=1)
	header("Location:index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
<title>View Uploads</title>	
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
		<h1>View Uploads</h1>
		<h2></h2>
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
<li class="current"><a href="viewuploads.php">View Uploads</a></li>
<li><a href="addcompany.php">Add Company</a></li>
<li><a href="listcompany.php">View Company List</a></li>
<li><a href="companyplacements.php">View Company Placements</a></li>
<li><a href="registrations.php">View Registrations</a></li>
<li><a href="company.php">Create Company Login</a></li>
<li><a href="companyloginlist.php">Company Login List</a></li>
<li><a href="contacts.html">Contacts</a></li>
<li><a href="logout.php">Logout</a></li>
		</ul>			
		</div><div id="table-block">
		<br />
			<p style="font-size:17px;font-weight:normal" >
			<table cellspacing="0" style="width:100%;" cellpadding="0">

					<tbody>

						<tr class="header">

							<td>S.No.</td>

							<td>Content Name</td>

							<td>Download </td>

							<td>Upload Date</td>

							<td>Upload Size</td>
							<td>Remove File</td>
						</tr>
		<?php
		$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
						if (!$con)
						{
							die('Could not connect: ' . mysql_error());
							}
						mysql_select_db("nsitonli_trndpl", $con);
		mysql_query("UPDATE student SET upload_counter = '0' WHERE rollnum = '$_SESSION[username]'");
		$result= mysql_query("SELECT * FROM uploads ORDER BY date DESC");
		$i=1;
		while($row = mysql_fetch_array($result))
		{
		if($i%2==1)
echo "<tr class= 'alternate'>"; 
else	
echo"<tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['name']."</td>";
echo "<td><a target='_blank' href='".$row[address]."'>Click Here</a></td>";
$date=getdate($row[date]);
echo "<td>".$date[mday]."-".$date[mon]."-".$date[year]."</td>";
echo "<td>".$row['size']."</td>";
echo "<td><a href='remove.php?cont=".$row[address]."'>Remove</a></td>";
echo "</tr>";
$i++;
		}
		?>
 </tbody></table>
	</p>
		
				</div>
				</div>
				</div>
				</div>
				</body>
				</html>