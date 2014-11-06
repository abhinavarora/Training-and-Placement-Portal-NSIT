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
<form id="values" action="company_compensationverify.php" method="post" enctype="multipart/form-data">
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

<p>Any further Details: </p><textarea name="mdetails" rows="10" cols="60" ><?php echo $row['mdetails'] ?></textarea>





<?php
 mysql_close($con);
?>

<table cellspacing="30">
<tr><td>
<a href="company_job.php"><img src="back.jpg" /></a></td><td>
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
