<?php session_start();
	if($_SESSION['auth']!=1)
	header("Location:index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
<script type="text/javascript">
	function getplacements()
	{
var company = document.getElementById('comp').value;
if (company=="NULL")
  { 
  alert('Please select a Company!');
  document.getElementById("information").innerHTML="";
  return;
  }
 document.getElementById("information").innerHTML="<img src='../images/bigLoader.gif' alt='Loading'/>"
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("information").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getplacements.php?c="+company,true);
xmlhttp.send();
	}
	</script>
<title>View Company Placements</title>	
<div style="background-image:url('../images/bigLoader.gif');"></div>
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
		<h1>Company Placements</h1>
		<h2><span>View Placements By Company</h2>
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
<li class="current"><a href="companyplacements.php">View Company Placements</a></li>
<li><a href="registrations.php">View Registrations</a></li>
<li><a href="company.php">Create Company Login</a></li>
<li><a href="companyloginlist.php">Company Login List</a></li>
<li><a href="contacts.html">Contacts</a></li>
<li><a href="logout.php">Logout</a></li>
		</ul>			
		</div><div id="table-block">
		<p style="font-size:18px;font-weight:normal;">
		Select a Company to add User Placements:
		&nbsp;&nbsp;	
		<select name="company" id="comp"  style="width:35%;font-size:16px;">
		<option value="NULL" selected="selected">Select Company</option>
		<option value="NULL">-----------</option>
		<?php $_SESSION["fieldcount"]=1;	
		$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066")
		or die('Could not connect: ' . mysql_error());
		mysql_select_db("nsitonli_trndpl", $con);
		$result = mysql_query("SELECT * FROM company ORDER BY name");
		while($row = mysql_fetch_array($result))
		echo '<option value="'.$row[name].'">'.$row[name].'</option>';
		?></select></p><br />
		<input type="button" name="View" Value="View Company Placements" onClick="getplacements();" style="width:30%;font-size:14px;" >
		<br />
		<p style="font-size:17px;font-weight:normal;">
		<span id="information"></span></p>
		</div>
				</div>
				</div>
				</div>
				</body>
				</html>