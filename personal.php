<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php if (!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} ?>

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
<head>
<title>Edit Details</title>

<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Training & Placement, NSIT" />
<meta name="keywords" content="training, placement, NSIT, NSIT Delhi, netaji subhas institute of technology, DIT" />

<link rel="stylesheet" type="text/css" href="css/template.css" />
</head>

<body>

<div id="page-container">
	<div id="branding">
	
<img src="banner/tnp2.jpg" width="100%" height="150"/>	
</div><!-- end branding -->
		
<div id="page-content" class="clearfix">
<h2 style="text-align:left;">Hello <?php echo $_SESSION['fname']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to the Homepage of the Training and Placement Cell, Netaji Subhas Institute of Technology.</h2>	
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
						<li><a href="myregisterations.php">My Registerations</a></li>
						<?php
						if($row[upload_counter]!=0)
						echo "<li ><a href='adminuploads.php'><b>Admin Uploads(".$row[upload_counter].")</b></a>";
						else
						echo "<li ><a href='adminuploads.php'>Admin Uploads</a>"; 
						?><li><a href="Placement Policies 11.pdf" target="_blank">Placement Policies</a></li>
						<li><a href="password.php">Change Password</a></li>
						<li><a href="#" onClick="logout()">Logout</a></li>	
					</ul>
			
				
				</div>
			
<div id="form-block">
<form id="values" action="personalverify.php" method="post" enctype="multipart/form-data">

<?php
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_tnp12",$con);
$username = $_SESSION['username'];


$sqlselect="SELECT student.fname as fname,student.lname as lname,student.branch as branch,student.gender as gender,student.stud_category as stud_category,student.dob as dob,
            student.presnt_add as presnt,student.perm_add as perm,student.father_name as fatname,student.father_occ as fatocc,student.mother_name as motname,
	    student.mother_occ as motocc,student.father_cntct as fatcntct,student.intern_comp as intern_comp,student.intern_title as intern_title,student.extra_co as extra_co
			       FROM student 
						 WHERE rollnum = '$username' "; 			
if(!mysql_query($sqlselect,$con))
	 {
	  die('Error: ' . mysql_error());
	 }
	 $result = mysql_query($sqlselect);
	 $row = mysql_fetch_array($result);
	 echo "<center>";
	 
	 echo "<table cellpadding='20'>";
    	 echo "<tr><td width='100'><p><strong>";
	 echo "Name";
	 echo "</strong></p></td><td width='20'><p><strong>";
	 echo ":";
	 echo "</strong></p></td><td><h4>";
	 echo $row['fname'] . " " . $row['lname'];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p><strong>";
	 echo "Roll Number";
	 echo "</strong></p></td><td><p><strong>";
	 echo ":";
	 echo "</strong></p></td><td><h4>";
	 echo $username;
	 echo "</h4></td></tr>";
	 echo "<tr><td><p><strong>";
	 echo "Branch";
	 echo "</strong></p></td><td><p><strong>";
	 echo ":";
	 echo "</strong></p></td><td><h4>";
	 echo $row[branch];
	 echo "</h4></td></tr>";
	 echo "<tr><td><p><strong>";
	 echo "Category";
	 echo "</strong></p></td><td><p><strong>";
	 echo ":";
	 echo "</strong></p></td><td><h4>";
	 echo $row[stud_category];
	 echo "</h4></td></tr>";

	 echo "</table>";
         echo "</center>";
?>

<?php
if(!strcasecmp($row['gender'],"Female"))
{
$str = sprintf("Male");

}
else
$str = sprintf("Female");
?>

<p>Gender: </p></br>
<table>
<tr><td>
<?php echo $row['gender'] ?><input type="radio" checked="checked" name="gender" value="<?php echo $row['gender'] ?>" />
</td></tr><tr><td>
<?php echo $str ?><input type="radio" name="gender" value="<?php echo $str ?>" />
</td></tr>
</table>


<p>Date of Birth: </p></br>
<select size="1" name="sday" >
  <option>01</option>
  <option>02</option>
  <option>03</option>
  <option>04</option>
  <option>05</option>
  <option>06</option>
  <option>07</option>
  <option>08</option>
  <option>09</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>
  <option>13</option>
  <option>14</option>
  <option>15</option>
  <option>16</option>
  <option>17</option>
  <option>18</option>
  <option>19</option>
  <option>20</option>
  <option>21</option>
  <option>22</option>
  <option>23</option>
  <option>24</option>
  <option>25</option>
  <option>26</option>
  <option>27</option>
  <option>28</option>
  <option>29</option>
  <option>30</option>
  <option>31</option>
  </select>
</select>&nbsp;&nbsp;&nbsp; <select size="1" name="smonth" >
  <option>Jan</option>
  <option>Feb</option>
  <option>Mar</option>
  <option>Apr</option>
  <option>May</option>
  <option>Jun</option>
  <option>Jul</option>
  <option>Aug</option>
  <option>Sep</option>
  <option>Oct</option>
  <option>Nov</option>
  <option>Dec</option>
</select>
 &nbsp;&nbsp;&nbsp; <select size="1" name="syear">
<option>1985</option>
<option>1986</option>
 <option>1987</option>
<option>1988</option> 
<option>1989</option>
<option>1990</option>
<option>1991</option>
<option>1992</option>
<option>1993</option>
</select>
<br/><br/>

<p>Present Address: </p></br><input name="presnt_add" type="text" value="<?php echo $row['presnt'] ?>" size="70" />

<p>Permanent Address: </p></br><input name="perm_add" type="text" value="<?php echo $row['perm'] ?>"  size="70"/>

<p>Father Name: </p></br><input name="father_name" type="text" value="<?php echo $row['fatname'] ?>" size="70"/>

<p>Father Occupation: </p></br><input name="father_occ" type="text" value="<?php echo $row['fatocc'] ?>" size="70"/>

<p>Mother Name: </p></br><input name="mother_name" type="text" value="<?php echo $row['motname'] ?>" size="70"/>

<p>Mother Occupation: </p></br><input name="mother_occ" type="text" value="<?php echo $row['motocc'] ?>" size="70"/>

<p>Father contact number: </p></br><input name="father_cntct" type="text" value="<?php echo $row['fatcntct'] ?>" size="70"/>

<p>Internships Completed: </p><textarea name="intern_comp" rows="10" cols="60" ><?php echo $row['intern_comp'] ?></textarea><br/><br/><br/>

<p>Internship title: </p><textarea name="intern_title" rows="10" cols="60" ><?php echo $row['intern_title'] ?></textarea><br/><br/><br/>

<p>Extra Curricular activities: </p><textarea name="extra_co" rows="10" cols="60" ><?php echo $row['extra_co'] ?></textarea><br/><br/><br/>

<?php
 mysql_close($con);
?>

<table cellspacing="20">
<tr><td>
<input type="submit" value="SAVE" /></td><td>
<input type="reset" value="RESET" /></td></tr></table>
</form>


</div>



            </div>

            
        </div>
			
		
				</div>
				<br /><br />
</body>

</html>
