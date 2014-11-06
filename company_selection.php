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
<form id="values" action="company_selectionverify.php" method="post" enctype="multipart/form-data">
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

<p>Expected number of days required for declaration of result: </p><input name="result" type="text" value="<?php echo $row['result'] ?>" size="70"/>










<?php
 mysql_close($con);
?>

<table cellspacing="30">
<tr><td>
<a href="company_branch.php"><img src="back.jpg" /></a></td><td>
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
