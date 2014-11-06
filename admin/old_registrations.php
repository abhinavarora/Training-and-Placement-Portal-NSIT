<?php
session_start();
		if($_SESSION['auth']!=1)
			 header("Location:index.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Registrations</title>
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
			
			<h1>Company Registrations</h1>
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
<li  class="current"><a href="registrations.php">View Registrations</a></li>
<li><a href="company.php">Create Company Login</a></li>
<li><a href="companyloginlist.php">Company Login List</a></li>
<li><a href="contacts.html">Contacts</a></li>
<li><a href="logout.php">Logout</a></li>
				</ul>				
				</div>
				<?php
				$company = $_GET['company'];
				$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
					mysql_select_db("nsitonli_tnp",$con);
				if(!isset($company))
				{	
					unset ($_SESSION[company]);
					$q = "SELECT * FROM company WHERE 1";
					$res = mysql_query($q,$con)  or die("Query Error".mysql_error());
					$out = "<h1>Select Company:</h1>";
					while($row = mysql_fetch_array($res)) 
					$out = $out."<h3><a href='registrations.php?company=".$row['name']."'>".$row['name']."</a></h2>";
					
					mysql_close($con);	
					print $out;
				}
				else
				{										
					$q = "SELECT s.fname,s.lname,s.rollnum,s.email,s.cntct,s.be_percentdrop,s.x_percent,s.xii_percent,s.dob,s.stud_category FROM student AS s, companyapply as r WHERE r.company_name = '".$company."' AND r.student_rollnum = s.rollnum";
					$res = mysql_query($q,$con) or die(mysql_error());
				?>
				<div id="table-block">				
				<?php
					$url= "resume_export.php?c=".$company;
					$url2="cleardata.php?c=".$company;
					?>
					 <script type="text/javascript">
function confirmdel() {

var confirmmessage = "Are you sure you want to Clear Server Data?";
var goifokay = "<?php echo $url2;?>";
if (confirm(confirmmessage)) {

window.location = goifokay;

}
}

</script>			
					<span><table style="width=100px;"> <tr width="300px">
					<td><input type='button' value='Export Resumes' style='width:150px;' onclick='window.open("<?php echo $url;?>")' ></td>
		<td>	<input type='button' value='Clear Server Data' style='width:150px;' onclick='confirmdel()' ></span></td>
</tr></table>					
					<table cellspacing="0" cellpadding="0" width="550px">
					<tbody>
						<tr class="header">
							<td>S No.</td>
							<td>Student Name</td>
							<td>Roll Number</td>
							<td>E-mail</td>
							<td>Contact</td>
							<td>BE %age</td>
							<td>X %age</td>
							<td>XII %age</td>
							<td>DoB</td>
							<td>Category</td>							
						</tr>	
				<?php
				$csv = $company.",Registerations\nS No.,NAME,Roll No,E-mail,Contact,Percentage,X Percentage,XII Percentage,Date Of Birth\n";
				$i=1;	
				while($row= mysql_fetch_array($res))
					{ 
					  if($i%2==1)
						$x = "<tr class= 'alternate'><td>".$i."</td>"; 
					  else	
						$x ="<tr><td>".$i."</td>";
						$x = $x."<td>".$row['fname']." ".$row["lname"]."</td>";
						$x = $x."<td>".$row['rollnum']."</td>";
						$x = $x."<td>".$row['email']."</td>";
						$x = $x."<td>".$row['cntct']."</td>";
						$x = $x."<td>".$row['be_percentdrop']."</td>";
						$x = $x."<td>".$row['x_percent']."</td>";
						$x = $x."<td>".$row['xii_percent']."</td>";
						$x = $x."<td>".$row['dob']."</td><td>".$row['stud_category']."</td></tr>";
					echo $x;
					$csv = $csv.$i.",".$row['fname']." ".$row['lname'].",".$row['rollnum'].",".$row['email'].",".$row['cntct'].",".$row['be_percentdrop'].",".$row['x_percent'].",".$row['xii_percent'].",".$row['dob']."\n";
					$i+=1;
					}
				$company = str_replace(" ","-",$company);
				echo "</table><br/><h3><a href='./Files/".$company."registrations.csv'>Export Registration list</a></h3>";	
				mysql_close($con);
				$fp = fopen("./Files/".$company."registrations.csv","w");
				fwrite($fp,$csv);
				fclose($fp);
				}
				?>
		</div><!-- end page-content -->
		<div id="page-footer">
			
			<p><strong>NSIT Placement Management Portal|<a href="webteam.html"><class = "current"><font color="#000000">Webteam</font></a></p>
				
		</div><!-- end page-footer -->
		
	</div><!-- end page-container -->

</body>

</html>
