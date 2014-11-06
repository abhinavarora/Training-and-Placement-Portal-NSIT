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
						<li class="current"><a href="#">Profile</a></li>
						<li><a href="companypassword.php">Change Password</a></li>
						<li><a href="#" onClick="logout()">Logout</a></li>	
					</ul>
			
				
				</div>
			
<div id="form-block">
<form id="values" action="company_jobverify.php" method="post" enctype="multipart/form-data">
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
?>

<h2>JOB PROFILE</h2><br/>

<p>Job Designation: </p><input name="job_desig" type="text" value="<?php echo $row['job_desig'] ?>" size="70" />

<p>Job Description: </p><textarea name="job_describe" rows="10" cols="60"><?php echo $row['job_describe'] ?></textarea>

<p>Place of Posting: </p><input name="place" type="text" value="<?php echo $row['place'] ?>" size="70" />

<p>Tentative Joining Date: </p>
  <select size="1" name="day" >
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
</select>&nbsp;&nbsp;&nbsp; <select size="1" name="month" >
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
 &nbsp;&nbsp;&nbsp; <select size="1" name="year">
 <option>2010</option>
 <option>2011</option>
</select>
<br/>





<?php
 mysql_close($con);
?>

<table cellspacing="30">
<tr><td>
<a href="company_hr.php"><img src="back.jpg" /></a></td><td>
<input type="image" src="next.jpg" /></td></tr></table>
</form>


</div>



            </div>

            
        </div>
			
		
				</div>
				</div>
				</div>

			
			
				
		</div><!-- end page-content -->
		
		
	</div><!-- end page-container -->

</body>

</html>
