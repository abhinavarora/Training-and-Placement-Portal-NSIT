<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} ?>
<head>
<title>Profile</title>

<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Training & Placement, NSIT" />
<link rel="stylesheet" type="text/css" href="css/template.css" />


<script type="text/javascript">
function logout() {

var confirmmessage = "Are you sure you want to logout?";
var goifokay = "companylogout.php";
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
			
<?php	
echo "<h2 style='float:left'>Hello ".$_SESSION['name']."</h2><h2>Welcome to the Homepage of the Training and Placement Cell, Netaji Subhas Institute of Technology.</h2>";
?>
	

<div class="inner-box clearfix">
	
				<div id="sidebar">
				
					<ul id='sidebar' class="main">
						<li><a href="companyview.php">Home</a>
						<li class="current"><a href="companyprofile.php">Profile</a></li>
					
						<li><a href="companypassword.php">Change Password</a></li>
						<li><a href="#" onClick="logout()">Logout</a></li>	
					</ul>
			
			
				
				</div>
			
<div id="form-block">
<?php
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_trndpl",$con);
$cname = $_SESSION['name'];


$sqlselect="SELECT * from companyprofile WHERE username = '$name' "; 			
if(!mysql_query($sqlselect,$con))
	 {
	  die('Error: ' . mysql_error());
	 }
	 $result = mysql_query($sqlselect);
	 $row = mysql_fetch_array($result);
	 
echo "<h2>";
echo "COMPANY CONTACT INFORMATION";
echo "</h2>";
echo "<br/>";

?>
<table>
<tr><td width="400"></td><td>
<a href="company_contact.php"><img src=images/edit.jpg width="100" height="25" /></a>          
</td></tr></table>
<?php
	 
	 echo "<table cellpadding='20'>";
         echo "<tr><td width='150'><p>";
	 echo "Name of the Firm";
	 echo "</p></td><td width='20'><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['cname'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Postal Address";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['address'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "City";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['city'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "State";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['state'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Pin code";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['pincode'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Contact Number";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['contact'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Fax Nuber";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['fax'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 
	 echo "Website";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['website'];
	 echo "</h4></td></tr>";
	 echo "</table>";
echo "<br/><br/>";
echo "<h2>";
echo "HEAD OF DEPARTMENT CONTACT INFORMATION";
echo "</h2>";
	 echo "<br/><br/>";
	 echo "<table cellpadding='20'>";
	 echo "<tr><td><p>";
	 echo "Name";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['head_name'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Contact Number";
	 echo "</p></td><td><p>";
	 echo "";
	 echo "</p></td><td><h4>";
	 
	 echo "</h4></td></tr>";
	 echo "<tr><td>";
	 echo "Mobile";
	 echo "</td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['head_mobile'];
	 echo "</h4></td></tr>";
	 echo "<tr><td>";
	 echo "Landline";
	 echo "</td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['head_landline'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Email ID";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['head_email'];
	 echo "</h4></td></tr>";
	 echo "</table>";
echo "<br/><br/>";
echo "<h2>";
echo "HR CONTACT INFORMATION";
echo "</h2>";
echo "<br/><br/>";
	 echo "<table cellpadding='20'>";
	 echo "<tr><td><p>";
	 echo "Name";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['hr_name'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Designation";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['hr_designation'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Contact Number";
	 echo "</p></td><td><p>";
	 echo "";
	 echo "</p></td><td><h4>";
	 
	 echo "</h4></td></tr>";
         echo "<tr><td>";
	 echo "Mobile";
	 echo "</td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['mobile'];
	 echo "</h4></td></tr>";

         echo "<tr><td>";
	 echo "Landline";
	 echo "</td><td width='20'><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['landline'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Email ID";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['email'];
	 echo "</h4></td></tr>";
	 echo "</table>";
echo "<br/><br/>";
echo "<h2>";
echo "JOB PROFILE";
echo "</h2>";
echo "<br/><br/>";
	 echo "<table cellpadding='20'>";
	 echo "<tr><td><p>";
	 echo "Job Designation";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['job_desig'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "job Description";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['job_describe'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Place of Posting";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['place'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Tentative Joining Date";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['date'];
	 echo "</h4></td></tr>";
	 echo "</table>";
echo "<br/><br/>";
echo "<h2>";
echo "COMPENSATION";
echo "</h2>";
echo "<br/><br/>";
echo "<h1>";
echo "Bachelor of Engineering (B.E.)";
echo "</h1>";
echo "<hr>";
echo "<br/>";
	 echo "<table cellpadding='20'>";
         echo "<tr><td><p>";
	 echo "HRA";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['hra'];
	 echo "</h4></td></tr>";
         echo "<tr><td><p>";
	 echo "Gross";
	 echo "</p></td><td width='20'><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['gross'] . " " . $row['lname'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Others";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['othercompensation'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Take Home";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['takehome'];
	 echo "</h4></td></tr>";
echo "</h4></td></tr>";
echo "<tr><td><p>";
	 echo "Cost to Company";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['cost'];
	 echo "</h4></td></tr>";	 
echo "<tr><td><p>";
	 echo "Any further Details";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['details'];
	 echo "</h4></td></tr>";
	 echo "</table>";
echo "<br/>";
echo "<h1>";
echo "Master of Technology (M.tech.)";
echo "</h1>";
echo "<hr>";
echo "<br/>";
	 echo "<table cellpadding='20'>";
         echo "<tr><td><p>";
	 echo "HRA";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['mhra'];
	 echo "</h4></td></tr>";
         echo "<tr><td><p>";
	 echo "Gross";
	 echo "</p></td><td width='20'><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['mgross'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Others";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['mothercompensation'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Take Home";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['mtakehome'];
	 echo "</h4></td></tr>";
echo "<tr><td><p>";
	 echo "Cost to Company";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['mcost'];
	 echo "</h4></td></tr>";
	 	 
echo "<tr><td><p>";
	 echo "Any further Details";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['mdetails'];
	 echo "</h4></td></tr>";
	 echo "</table>";
echo "<br/><br/>";
echo "<h2>";
echo "BRANCHES ALLOWED";
echo "</h2>";
echo "<br/><br/>";
echo "<h1>";
echo "Bachelor of Engineering (B.E.)";
echo "</h1>";
echo "<hr>";
echo "<br/>";
	 echo "<table cellpadding='20'>";
         echo "<tr><td><p>";
	 echo "Electronics and Communication Engineering";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['ece'];
	 echo "</h4></td></tr>";
         echo "<tr><td><p>";
	 echo "Computer Engineering";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['cse'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Information Technology";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['it'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Instrumentation & Control Engineering";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['ice'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Manufacturing Process & Automation Engineering";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['mpae'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Biotechnology";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['bt'];
	 echo "</h4></td></tr>";
	 echo "</table>";
echo "<br/>";
echo "<h1>";
echo "Master of Technology (M.tech.)";
echo "</h1>";
echo "<hr>";
echo "<br/>";
	 echo "<table cellpadding='20'>";
         echo "<tr><td><p>";
	 echo "Signal Processing";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['sp'];
	 echo "</h4></td></tr>";
         echo "<tr><td><p>";
	 echo "Information Systems";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['infos'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Process Control";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['pc'];
	 echo "</h4></td></tr>";
	 echo "</table>";
echo "<br/><br/>";
echo "<h2>";
echo "SELECTION PROCEDURE";
echo "</h2>";
echo "<br/><br/>";
echo "<table cellpadding='20'>";
echo "<tr><td><p>";
	 echo "Pre Placement Talk";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['ppt'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Percentage Criteria";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['percent'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Resume Shortlisting";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['resume_short'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 	 
	 echo "<tr><td><p>";
	 echo "Written Test";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['test'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 
	 echo "Type of Written Test";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['testtype'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Group Discussion";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['gd'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Technical Interview(s)";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['ti'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "HR Interview";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['hri'];
	 echo "</h4></td></tr>";
         echo "<tr><td><p>";
	 echo "Others";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['others'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Bond or Service Contract";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['bond'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Deatils of bond";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['bonddetails'];
	 echo "</h4></td></tr>";
	 echo "</table>";
         echo "<table>";
         echo "<tr><td><p>";
	 echo "Expected number of days required for declaration of result:";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['result'];
	 echo "</h4></td></tr>";
         echo "</table>";
echo "<br/><br/>";
echo "<h2>";
echo "INFRASTRUCTURE REQUIRED";
echo "</h2>";
echo "<br/><br/>";
echo "<table cellpadding='20'>";
echo "<tr><td><p>";
	 echo "Number of Days required for recruitment";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['days'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Number of Executives visiting the campus";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['executives'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p>";
	 echo "Number of rooms needed for conducting the interviews";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['rooms'];
	 echo "</h4></td></tr>";
	 echo "</table>";
	 echo "<table>";
	 echo "<tr><td><p>";
	 echo "Other Requirements";
	 echo "</p></td><td><p>";
	 echo ":";
	 echo "</p></td><td><h4>";
	 echo $row['otherinfra'];
	 echo "</h4></td></tr>";
	 echo "</table>";
	 mysql_close($con);

?>

<div>



            </div>

            
        </div>
			
		
				</div>
				</div>
				</div>

			
			
				
		</div><!-- end page-content -->
		
		
	</div><!-- end page-container -->

</body>

</html>
