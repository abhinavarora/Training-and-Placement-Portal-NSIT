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
<form id="values" action="company_branchverify.php" method="post" enctype="multipart/form-data">
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






<?php
 mysql_close($con);
?>

<table cellspacing="30">
<tr><td>
<a href="company_compensation.php"><img src="back.jpg" /></a></td><td>
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
