<?php
session_start();
		if($_SESSION['auth']!=1)
			 header("Location:index.php");
		$num = $_GET['user'];
		$con=mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die("Could not connect");
		mysql_select_db("nsitonli_trndpl",$con) or die("Could not find db");
		$q = "select * from student where sid=".$num;
		$result=mysql_query($q) or die("Query: Error");
		$row=mysql_fetch_array($result);
		
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Edit user</title>
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
			
			<h1>Student Profile</h1>
			<h2>Edit Student Details</h2>
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
			
				<div id="form-block" style="overflow:auto; height:1000px;">
					<form method="post" action="update.php?id=<?php echo $num; ?>">
					<label for="field_1">First Name</label>
					<input type="text" name="fname" id="field_1" value="<?php echo $row['fname']; ?>" class="short" />
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_2">Last name</label>
					<input type="text" name="lname" id="field_2" class="short" value="<?php echo $row['lname']; ?>"/>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_4">Branch</label>
					<input type="text" name="branch" id="field_4" value="<?php echo $row['branch']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_5">Roll number</label>
					<input type="text" rows="3" name="rollnum" cols="3" id="field_5" value="<?php echo $row['rollnum']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_44">Password</label>
					<input type="password" rows="3" cols="3" name="password" id="field_44" value="<?php echo $row['password']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_45">BE Percentage With Drop</label>
					<input type="text" rows="3" cols="3" name="be_percentdrop" id="field_45" value="<?php echo $row['be_percentdrop']; ?>"></input>
				
					<label for="field_6">BE Percentage</label>
					<input type="text" rows="3" cols="3" name="be_percent" id="field_6" value="<?php echo $row['be_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_7">Year I Percentage</label>
					<input type="text" rows="3" cols="3" name="yr1_percent" id="field_7" value="<?php echo $row['yr1_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_8">Year II Percentage</label>
					<input type="text" rows="3" cols="3" id="field_8" name="yr2_percent" value="<?php echo $row['yr2_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_9">Year III Percentage</label>
					<input type="text" rows="3" cols="3" id="field_9" name="yr3_percent" value="<?php echo $row['yr3_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_10">Semester: 1 Percentage</label>
					<input type="text" rows="3" cols="3" id="field_10" name="sem1_percent" value="<?php echo $row['sem1_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_11">Semester: 2 Percentage </label>
					<input type="text" rows="3" cols="3" id="field_11" name="sem2_percent" value="<?php echo $row['sem2_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_12">Semester: 3 Percentage</label>
					<input type="text" rows="3" cols="3" id="field_12" name="sem3_percent" value="<?php echo $row['sem3_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_13">Semester: 4</label>
					<input type="text" rows="3" cols="3" id="field_13" name="sem4_percent" value="<?php echo $row['sem4_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_14">Semester: 5</label>
					<input type="text" rows="3" cols="3" name="sem5_percent" id="field_14" value="<?php echo $row['sem5_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_15">Semester: 6</label>
					<input type="text" rows="3" cols="3" name="sem6_percent" id="field_15" value="<?php echo $row['sem6_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_16">Backlogs</label>
					<input type="text" rows="3" cols="3" name="backs" id="field_16" value="<?php echo $row['backs']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_17">Contact</label>
					<input type="text" rows="3" cols="3" name="cntct" id="field_17" value="<?php echo $row['cntct']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_18">Email</label>
					<input type="text" rows="3" cols="3" name="email" id="field_18" value="<?php echo $row['email']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_19">Intern Company</label>
					<input type="text" rows="3" cols="3" name="intern_comp" id="field_19" value="<?php echo $row['intern_comp']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_20">Intern Title</label>
					<input type="text" rows="3" cols="3" name="intern_title" id="field_4" value="<?php echo $row['intern_title']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_21">Class X Percentage</label>
					<input type="text" rows="3" cols="3" name="x_percent" id="field_21" value="<?php echo $row['x_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_22">Class X Science Percentage</label>
					<input type="text" rows="3" cols="3" name="x_s_percent" id="field_22" value="<?php echo $row['x_s_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_23">Class X Maths Percentage</label>
					<input type="text" rows="3" cols="3" name="x_m_percent" id="field_23" value="<?php echo $row['x_m_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_24">Class XII Percentage</label>
					<input type="text" rows="3" cols="3" name="xii_percent" id="field_24" value="<?php echo $row['xii_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_25">Class XII PCM Percentage</label>
					<input type="text" rows="3" cols="3" name="xii_pcm_percent" id="field_25" value="<?php echo $row['xii_pcm_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_26">Class XII Maths Percentage</label>
					<input type="text" rows="3" cols="3" name="xii_m_percent" id="field_26" value="<?php echo $row['xii_m_percent']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_27">Father Name</label>
					<input type="text" rows="3" cols="3" name="father_name" id="field_27" value="<?php echo $row['father_name']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_28">Mother Name</label>
					<input type="text" rows="3" cols="3" name="mother_name" id="field_28" value="<?php echo $row['mother_name']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_29">Father occupation</label>
					<input type="text" rows="3" cols="3" name="father_occ" id="field_29" value="<?php echo $row['father_occ']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_30">Mother Occupation</label>
					<input type="text" rows="3" cols="3" name="mother_occ" id="field_30" value="<?php echo $row['mother_occ']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_31">Father Contact</label>
					<input type="text" rows="3" cols="3" name="father_cntct" id="field_31" value="<?php echo $row['father_cntct']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_32">Alternate Contact</label>
					<input type="text" rows="3" cols="3" name="alt_cntct" id="field_32" value="<?php echo $row['alt_cntct']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_33">Alternate E-mail</label>
					<input type="text" rows="3" cols="3" name="alt_email" id="field_33" value="<?php echo $row['alt_email']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_34">Present Address</label>
					<input type="text" rows="3" cols="3" name="presnt_add" id="field_34" value="<?php echo $row['presnt_add']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_35">Permanenet Address</label>
					<input type="text" rows="3" cols="3" name="perm_add" id="field_35" value="<?php echo $row['perm_add']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_36">Date Of Birth</label>
					<input type="text" rows="3" cols="3" name="dob" id="field_36" value="<?php echo $row['dob']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_37">Category</label>
					<input type="text" rows="3" cols="3" name="category" id="field_37" value="<?php echo $row['stud_category']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_38">AIEEE Rank</label>
					<input type="text" rows="3" cols="3" name="aiee_rnk" id="field_38" value="<?php echo $row['aiee_rnk']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_39">CEE Rank</label>
					<input type="text" rows="3" cols="3" name="cee_rnk" id="field_39" value="<?php echo $row['cee_rnk']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_40">IIT Rank</label>
					<input type="text" rows="3" cols="3" name="iit_rnk" id="field_40" value="<?php echo $row['iit_rnk']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_41">Extra Curricular</label>
					<input type="text" rows="3" cols="3" name="extra_co" id="field_41" value="<?php echo $row['extra_co']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_42">X Year</label>
					<input type="text" rows="3" cols="3" name="x_year" id="field_42" value="<?php echo $row['x_year']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_43">XII Year</label>
					<input type="text" rows="3" cols="3" name="xii_year" id="field_42" value="<?php echo $row['xii_year']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_44">Gender</label>
					<input type="text" rows="3" cols="3" name="gender" id="field_44" value="<?php echo $row['gender']; ?>"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<input type="submit" name="submit" class="submit" value="Submit form"  />
					<input type="reset" class="submit reset" value="Reset form"  />
				</form>
				</div>
			
			</div>

			
		</div><!-- end page-content -->
		
		<div id="page-footer">
			
			<p><strong>NSIT Placement Management Portal|<a href="webteam.html"><class = "current">Webteam</a></p>
				
		</div><!-- end page-footer -->
		
	</div><!-- end page-container -->

</body>

NsitCoeRocks
</html>
