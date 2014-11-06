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
<form id="values" action="company_contactverify.php" method="post" enctype="multipart/form-data">
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

<p>Website: </p><input name="website" type="text" value="<?php echo $row['website'] ?>" size="70"/>


<?php
 mysql_close($con);
?>

<table cellspacing="30">
<tr><td></td><td>
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
