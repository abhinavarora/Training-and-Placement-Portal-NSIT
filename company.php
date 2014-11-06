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
echo "<h2 style='float:left'>Hello ".$_SESSION['name']."</h2><h2> Welcome to the Homepage of the Training and Placements Cell, Netaji Subhas Institute of Technology.</h2>";
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
<form id="values" action="companyverify.php" method="post" enctype="multipart/form-data">
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


<h2>COMPANY CONTACT INFORMATION</h2><br />
<p>Name of the Firm: </p><input name="cname" type="text" value="<?php echo $row['cname'] ?>" size="70" />

<p>Postal Address: </p><input name="address" type="text" value="<?php echo $row['address'] ?>" size="70" />

<p>City: </p><input name="city" type="text" value="<?php echo $row['city'] ?>" size="70" />

<p>State: </p><input name="state" type="text" value="<?php echo $row['state'] ?>"  size="70"/>

<p>Pin code: </p><input name="pincode" type="text" value="<?php echo $row['pincode'] ?>" size="70" />

<p>Contact Number: </p><input name="contact" type="text" value="<?php echo $row['contact'] ?>"  size="70"/>

<p>Fax Number: </p><input name="fax" type="text" value="<?php echo $row['fax'] ?>" size="70"/>

<p>Website: </p><input name="website" type="text" value="<?php echo $row['website'] ?>" size="70"/><br/><br/>



<h2>HEAD OF DEPARTMENT CONTACT INFORMATION</h2><br/>
<p>Name: </p><input name="head_name" type="text" value="<?php echo $row['head_name'] ?>" size="70" />

<p>Contact No : </p>Mobile<input name="head_mobile" type="text" value="<?php echo $row['head_mobile'] ?>" size="70"/> Landline<input name="head_landline" type="text" value="<?php echo $row['head_landline'] ?>" size="70"/>

<p>Email ID: </p><input name="head_email" type="text" value="<?php echo $row['head_email'] ?>" size="70" /><br/><br/>




<h2>HR CONTACT INFORMATION</h2><br/>
<p>Name: </p><input name="hr_name" type="text" value="<?php echo $row['hr_name'] ?>" size="70"/>

<p>Designation: </p><input name="hr_designation" type="text" value="<?php echo $row['hr_designation'] ?>" size="70"/>

<p>Contact No : </p>Mobile<input name="mobile" type="text" value="<?php echo $row['mobile'] ?>" size="70"/> Landline<input name="landline" type="text" value="<?php echo $row['landline'] ?>" size="70"/>

<p>Email ID: </p><input name="email" type="text" value="<?php echo $row['email'] ?>" size="70" /><br/><br/>




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
<br/><br/><br/>



<h2>COMPENSATION</h2><br/><br/>
<h1>Bachelor of Engineering (B.E.)<hr></h1>

<p>HRA: </p><input name="hra" type="text" value="<?php echo $row['hra'] ?>" size="70" />

<p>Gross: </p><input name="gross" type="text" value="<?php echo $row['gross'] ?>"  size="70"/>

<p>others: </p><input name="othercompensation" type="text" value="<?php echo $row['othercompensation'] ?>" size="70" />

<p>Take Home: </p><input name="takehome" type="text" value="<?php echo $row['takehome'] ?>"  size="70"/>

<p>Cost to Company: </p><input name="cost" type="text" value="<?php echo $row['cost'] ?>"  size="70"/>

<p>Any further Details: </p><textarea name="details" rows="10" cols="60" ><?php echo $row['details'] ?></textarea><br/>


<h1>Master of Technology (M.tech.)<hr></h1>

<p>HRA: </p><input name="mhra" type="text" value="<?php echo $row['mhra'] ?>" size="70" />

<p>Gross: </p><input name="mgross" type="text" value="<?php echo $row['mgross'] ?>"  size="70"/>

<p>others: </p><input name="mothercompensation" type="text" value="<?php echo $row['mothercompensation'] ?>" size="70" />

<p>Take Home: </p><input name="mtakehome" type="text" value="<?php echo $row['mtakehome'] ?>"  size="70"/>

<p>Cost to Company: </p><input name="mcost" type="text" value="<?php echo $row['mcost'] ?>"  size="70"/>

<p>Any further Details: </p><textarea name="mdetails" rows="10" cols="60" ><?php echo $row['mdetails'] ?></textarea><br/><br/>






<h2>BRANCHES ALLOWED</h2><br/>
<br/>
<h1>Bachelor of Engineering (B.E.)<hr></h1>


<p>Electronics and Communication Engineering:</p>
<table><tr><td>
<?php
if(!strcasecmp($row['ece'],"yes"))
{
?>
<input type="radio" name="ece" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="ece" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="ece" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="ece" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>

<p>Computer Engineering:</p>
<table><tr><td>
<?php
if(!strcasecmp($row['cse'],"yes"))
{
?>
<input type="radio" name="cse" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="cse" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="cse" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="cse" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>

<p>Information Technology:</p>
<table><tr><td>
<?php
if(!strcasecmp($row['it'],"yes"))
{
?>
<input type="radio" name="it" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="it" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="it" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="it" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>

<p>Instrumentation & Control Engineering:</p>
<table><tr><td>
<?php
if(!strcasecmp($row['ice'],"yes"))
{
?>
<input type="radio" name="ice" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="ice" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="ice" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="ice" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>

<p>Manufacturing Process & Automation Engineering:</p>
<table><tr><td>
<?php
if(!strcasecmp($row['mpae'],"yes"))
{
?>
<input type="radio" name="mpae" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="mpae" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="mpae" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="mpae" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>

<p>Biotechnology:</p>
<table><tr><td>
<?php
if(!strcasecmp($row['bt'],"yes"))
{
?>
<input type="radio" name="bt" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="bt" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="bt" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="bt" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>



<h1>Master of Technology (M.tech.)<hr></h1>

<p>Signal Processing:</p>
<table><tr><td>
<?php
if(!strcasecmp($row['sp'],"yes"))
{
?>
<input type="radio" name="sp" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="sp" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="sp" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="sp" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>

<p>Information Systems:</p>
<table><tr><td>
<?php
if(!strcasecmp($row['infos'],"yes"))
{
?>
<input type="radio" name="infos" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="infos" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="infos" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="infos" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>

<p>Process Control:</p>
<table><tr><td>
<?php
if(!strcasecmp($row['pc'],"yes"))
{
?>
<input type="radio" name="pc" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="pc" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="pc" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="pc" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>




<h2>SELECTION PROCEDURE</h2><br/>
<br/>

<p>Pre Placement Talk:</p>
<table><tr><td>
<?php
if(!strcasecmp($row['ppt'],"yes"))
{
?>
<input type="radio" name="ppt" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="ppt" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="ppt" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="ppt" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>

<p>Percentage Criteria: (e.g. 50% and above)</p><input name="percent" type="text" value="<?php echo $row['percent'] ?>" size="70" /><br/>

<p>Resume shortlisting:</p>
<table><tr><td>
<?php
if(!strcasecmp($row['resume_short'],"yes"))
{
?>
<input type="radio" name="resume_short" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="resume_short" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="resume_short" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="resume_short" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>


<p>Written Test:</p>
<table><tr><td>
<?php
if(!strcasecmp($row['test'],"yes"))
{
?>
<input type="radio" name="test" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="test" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="test" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="test" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>

<p>Type of Written Test: (Aptitude/Software/Hardware)</p><input name="testtype" type="text" value="<?php echo $row['testtype'] ?>" size="70" /><br/>

<p>Group Discussion</p>
<table><tr><td>
<?php
if(!strcasecmp($row['gd'],"yes"))
{
?>
<input type="radio" name="gd" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="gd" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="gd" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="gd" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>

<p>Technical Interview(s):</p>
<table><tr><td>
<?php
if(!strcasecmp($row['ti'],"yes"))
{
?>
<input type="radio" name="ti" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="ti" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="ti" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="ti" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>

<p>HR Interview:</p>
<table><tr><td>
<?php
if(!strcasecmp($row['hri'],"yes"))
{
?>
<input type="radio" name="hri" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="hri" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="hri" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="hri" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>

<p>Others:</p><input name="others" type="text" value="<?php echo $row['others'] ?>" size="70" /><br/>
<p>Bond or Service Contract:</p>
<table><tr><td>
<?php
if(!strcasecmp($row['bond'],"yes"))
{
?>
<input type="radio" name="bond" checked="checked" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="bond" value="no" /></td><td>no</td></tr></table><br/>
<?php

}
else
{
?>
<input type="radio" name="bond" value="yes" /></td><td width="70">yes</td><td><input type="radio" name="bond" checked="checked" value="no" /></td><td>no</td></tr></table><br/>
<?php
}
?>

<p>If yes, Deatils of bond: </p><textarea name="bonddetails" rows="10" cols="60" ><?php echo $row['bonddetails'] ?></textarea>

<p>Expected number of days required for declaration of result: </p><input name="result" type="text" value="<?php echo $row['result'] ?>" size="70"/><br/><br/>







<h2>INFRASTRUCTURE REQUIRED</h2><br/>

<p>Number of Days required for recruitment: </p><input name="days" type="text" value="<?php echo $row['days'] ?>" size="70"/>

<p>Number of Executives visiting the campus: </p><input name="executives" type="text" value="<?php echo $row['executives'] ?>" size="70"/>

<p>Number of rooms needed for conducting the interviews : </p><input name="rooms" type="text" value="<?php echo $row['rooms'] ?>" size="70"/>

<p>Others(please specify): </p><textarea name="otherinfra" rows="10" cols="60" ><?php echo $row['otherinfra'] ?></textarea>




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
				</div>
				</div>

			
			
				
		</div><!-- end page-content -->
		
		
	</div><!-- end page-container -->

</body>

</html>
