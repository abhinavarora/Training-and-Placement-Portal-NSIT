<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php if (!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} ?>
<head>
<title>My Profile</title>

<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Training & Placement, NSIT" />
<link rel="stylesheet" type="text/css" href="css/template.css" />


<link rel="stylesheet" href="css/coda-slider.css" type="text/css" media="screen" title="no title" charset="utf-8">

<script src="js/jquery-1.2.6.js" type="text/javascript"></script>
<script src="js/jquery.scrollTo-1.3.3.js" type="text/javascript"></script>
<script src="js/jquery.localscroll-1.2.5.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.serialScroll-1.2.1.js" type="text/javascript" charset="utf-8"></script>
<script src="js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
function logout() {

var confirmmessage = "Are you sure you want to logout?";
var goifokay = "logout.php";
var cancelmessage = "Action Cancelled";

if (confirm(confirmmessage)) {

window.location = goifokay;

} else {

alert(cancelmessage);

}

}
</script>
</head>

<body>

<div id="page-container">
	<div id="branding">
	
<img src="banner/tnp2.jpg" width="100%" height="150"/>	
</div><!-- end branding -->
		
<div id="page-content" class="clearfix">
<h2 style="text-align:left;">Hello <?php echo $_SESSION['fname']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to the Homepage of the Training and Placements Cell, Netaji Subhas Institute of Technology.</h2>	
<div class="inner-box clearfix">
	
				<div id="sidebar">
				
					<ul id='sidebar' class="main">
						<li><a href="home.php">Home</a>
						<?php
						$username=$_SESSION['username'];
						$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
						if (!$con)
						{
							die('Could not connect: ' . mysql_error());
							}
						mysql_select_db("nsitonli_trndpl", $con);
						$result= mysql_query("SELECT * FROM student WHERE rollnum='$username'");
						$row = mysql_fetch_array($result);
						if($row[message_counter]!=0)
						echo "<li ><a href='my_messages.php'><b>Inbox(".$row[message_counter].")</b></a>";
						else
						echo "<li ><a href='my_messages.php'>Inbox</a>";
						?>
						<li class="current"><a href="student.php">Profile</a></li>
						<li><a href="resume.php">Resume Manager</a></li>
						<li><a href="company_apply.php">Apply For Company</a></li>
						<li><a href="cancel_application.php">Deregister for Company</a></li>
						<li><a href="myregistrations.php">My Registrations</a></li>
						<?php
						if($row[upload_counter]!=0)
						echo "<li ><a href='adminuploads.php'><b>Admin Uploads(".$row[upload_counter].")</b></a>";
						else
						echo "<li ><a href='adminuploads.php'>Admin Uploads</a>"; 
						?>
						<li><a href="password.php">Change Password</a></li>
						<li><a href="#" onClick="logout()">Logout</a></li>		
						</ul>
			
				
				</div>
			
<div id="form-block">
<div id="slider">    
<ul class="navigation">

<li><a href="#personal">PERSONAL</a></li>
<li><a href="#academics">ACADEMICS</a></li>
<li><a href="#contact">CONTACT</a></li>
</ul>

<div class="scroll">
<div class="scrollContainer">
<div class="panel" id="personal">
<br/>
<table>
<tr><td width="350"></td>
<td>
<a href="personal.php"><img src=images/edit.jpg width="100" height="25" /></a>          
</td></tr>
</table>           
<?php
         
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
if(!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("nsitonli_tnp12",$con);
$username = $_SESSION['username'];
$sql = "SELECT fname, lname, gender, stud_category, branch, dob, rollnum, presnt_add, perm_add, father_name, father_occ, mother_name, mother_occ, father_cntct, intern_comp, intern_title, extra_co
				       FROM student
						 WHERE rollnum= '$username' ";
	 if(!mysql_query($sql))
	 {
	  die('Error: ' . mysql_error());
	 }
	 $result = mysql_query($sql);
	 $row = mysql_fetch_array($result);
	 echo "<br/><br/>";	 
	 echo "<table cellpadding='20'>";
         echo "<tr><td width='150'><p>";
	 echo "Name";
	 echo "</p></td><td width='20'><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['fname'] . " " . $row['lname'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Roll Number";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['rollnum'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Branch";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['branch'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Gender";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['gender'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Category";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['stud_category'];
	 echo "</h4></td></tr>";
	 
	 echo "<tr><td><p>";
	 echo "Date of birth";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['dob'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Present Address";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['presnt_add'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Permanent Address";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['perm_add'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "<tr><td><p>";
	 echo "Father Name";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['father_name'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Father Occupation";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['father_occ'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Mother Name";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['mother_name'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Mother Occupation";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['mother_occ'];
	 echo "</h4></td></tr>";
         echo "<tr><td><p>";
	 echo "Father contact number";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['father_cntct'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Internships";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['intern_comp'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Internship title";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['intern_title'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Extra Curricular Activities";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['extra_co'];
	 echo "</h4></td></tr>";
	 
	 echo "</table>";
	 mysql_close($con);
?> 
</div>


<div class="panel" id="academics">           
<?php
         
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
if(!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("nsitonli_tnp12",$con);
$username = $_SESSION['username'];
$sql = "SELECT be_percentdrop, be_percent, x_percent, x_s_percent, x_m_percent, xii_percent, xii_pcm_percent, xii_m_percent, x_year, xii_year, yr1_percent, yr2_percent, yr3_percent, sem1_percent, sem2_percent, sem3_percent, sem4_percent, sem5_percent, backs, cee_rnk, aiee_rnk, iit_rnk 
				       FROM student
						 WHERE rollnum= '$username' ";
	 if(!mysql_query($sql))
	 {
	  die('Error: ' . mysql_error());
	 }
	 $result = mysql_query($sql);
	 $row = mysql_fetch_array($result);
	 echo "<br/><br/>";
	 echo "<table cellpadding='20'>";
         echo "<tr><td width='250'><p>";
	 echo "B.E. percentage with drop";
	 echo "</p></td><td width='20'><p>";
	 echo ":";
	 echo "</p></td><td><h4>";	 
	 echo $row['be_percentdrop'];
	 echo "</h4></td></tr>";
	 echo "<tr><td width='250'><p>";
	 echo "B.E. percentage without drop";
	 echo "</p></td><td width='20'><p>";
	 echo ":";
	 echo "</p></td><td><h4>";	 
	 echo $row['be_percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 
	 echo "First year";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['yr1_percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Second year";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['yr2_percent'];
	 echo "</h4></td></tr>";
         echo "<tr><td><p>";
	 echo "Third year";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['yr3_percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "First semester";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['sem1_percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Second semester";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['sem2_percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Third semester";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['sem3_percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Fourth semester";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['sem4_percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Fifth semester";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['sem5_percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Backlogs";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['backs'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "CEE rank";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['cee_rnk'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "AIEEE rank";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['aiee_rnk'];
	 echo "</h4></td></tr>";
         echo "<tr><td><p>";
	 echo "IIT rank";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['iit_rnk'];
	 echo "</h4></td></tr>";
 	 echo "<tr><td><p>";
	 echo "10th percentage";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['x_percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "10th Science percentage";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['x_s_percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "10th Maths percentage";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['x_m_percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "12th percentage";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['xii_percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "12th PCM percentage";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['xii_pcm_percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "12th Maths percentage";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['xii_m_percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "10th passing year";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['x_year'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "12th passing year";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['xii_year'];
	 echo "</h4></td></tr>";
	 
         echo "</table>";
mysql_close($con);
?> 
</div>

<div class="panel" id="contact">
<br/>
<table>
<tr><td width="350"></td>
<td>
<a href="contact.php"><img src=images/edit.jpg width="100" height="25" /></a>          
</td></tr>
</table>
           
<?php
         
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
if(!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("nsitonli_tnp12",$con);
$username = $_SESSION['username'];
$sql = "SELECT email, alt_email, cntct, alt_cntct 
				       FROM student
						 WHERE rollnum= '$username' ";
	 if(!mysql_query($sql))
	 {
	  die('Error: ' . mysql_error());
	 }
	 $result = mysql_query($sql);
	 $row = mysql_fetch_array($result);
	 echo "<br/><br/>";	 
	 echo "<table cellpadding='20'>";
         echo "<tr><td width='150'><p>";
	 echo "Primary email";
	 echo "</p></td><td width='20'><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['email'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Secondary email";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['alt_email'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Contact";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['cntct'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Alternate Contact";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['alt_cntct'];
	 echo "</h4></td></tr>";
	 echo "</table>";
mysql_close($con);
?> 
</div>



            </div>

            
        </div>
			
		
				</div>
				</div>
				</div>
<br /><br />
			
</body>

</html>
