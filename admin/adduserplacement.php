<?php session_start();
		if($_SESSION['auth']!=1)
			header("Location:index.php");		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Add User Placements</title>
	<div style="background-image:url('../images/bigLoader.gif');"></div>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="INDEX,FOLLOW" />
	<link rel="stylesheet" type="text/css" href="css/template.css" />
	<script type="text/javascript" src="../js/jquery-1.2.6.js"></script>
	<script type="text/javascript">
	var num=1;
	function isNumeric(val) {
    var numeric = true;
    var chars = "0123456789";
    var len = val.length;
    var char = "";
    for (i=0; i<len; i++) { char = val.charAt(i); if (chars.indexOf(char)==-1) { numeric = false; } }
    return numeric;
}
	function getinfo()
	{
	num=1;
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
xmlhttp.open("GET","getinfo.php?c="+company,true);
xmlhttp.send();
	}
	

function firstcall()
{
var total = document.getElementById('total').value;
	if (total==0 || !isNumeric(total))
	{
	document.getElementById("messg").innerHTML='';
	 document.getElementById("d1").innerHTML=""
	alert('Please Enter a Valid Number!');
	return;
	}
	document.getElementById('total').disabled=true
	document.getElementById('comp').disabled=true
	 document.getElementById("messg").innerHTML='<p style="font-size:18px;font-weight:normal;">Enter Student Roll Numbers:</p>';
	addstudents(num);
}	
	
function addstudents(lc)
{
	var total = document.getElementById('total').value;
	 document.getElementById("d"+lc).innerHTML="<img src='../images/bigLoader.gif' alt='Loading'/>"
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
	var str= xmlhttp.responseText;
    document.getElementById("d"+lc).innerHTML=xmlhttp.responseText;;
    }
  }
xmlhttp.open("GET","getfields.php?total="+total+"&lc="+lc,true);
xmlhttp.send();
num++;
}

document.onkeypress = function()
{
    if( window.event.keyCode == 13 ) // enter key
    {
        return false; // this will prevent bubbling ( sending it to children ) the event!
    }
}
function checkform()
{
document.getElementById('total').disabled=false
	document.getElementById('comp').disabled=false
	return true;
}
</script>
</head>
	<body>
	<div id="page-container">
		<div id="branding">
			<h1>PlaceComm <span>| Administrator</span></h1>
		</div><!-- end branding -->
		<div id="page-content" class="clearfix">
			
			<h1>Add User Placements</h1>
			<h2></h2>
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
<li  class="current"><a href="adduserplacement.php">Add User Placements</a></li>
<li><a href="listplacmnt.php">View User Placements</a></li>
<li><a href="addmessage.php">Send Message</a></li>
<li><a href="listmessage.php">View Message</a></li>
<li><a href="uploadcontent.php">Upload Content</a></li>
<li><a href="viewuploads.php">View Uploads</a></li>
<li><a href="addcompany.php">Add Company</a></li>
<li><a href="listcompany.php">View Company List</a></li>
<li><a href="companyplacements.php">View Company Placements</a></li>
<li><a href="registrations.php">View Registrations</a></li>
<li><a href="company.php">Create Company Login</a></li>
<li><a href="companyloginlist.php">Company Login List</a></li>
<li><a href="contacts.html">Contacts</a></li>
<li><a href="logout.php">Logout</a></li>
				</ul>				
				</div>
					
				<div id="form-block"><form action="addplacements.php" name="myform" onSubmit="return checkform();" method="post">
		<p style="font-size:18px;font-weight:normal;"><br />		<a href="adduserplacementcsv.php" >Add user placements by uploading csv file</a>		<br /><br />Select a Company to add User Placements:
	&nbsp;&nbsp;
	<select name="company" id="comp" onChange='getinfo();' style="width:50%;font-size:16px;">
<option value="NULL" selected="selected">Select Company</option>
<option value="NULL">-----------</option>
<?php 
$_SESSION["fieldcount"]=1;	 
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die('Could not connect: ' . mysql_error());
mysql_select_db("nsitonli_trndpl", $con);
$result = mysql_query("SELECT * FROM company ORDER BY name");
while($row = mysql_fetch_array($result))
	echo '<option value="'.$row[name].'">'.$row[name].'</option>'; 
?>
</select></p><p style="font-size:17px;font-weight:normal;">
<span id="information"></span></p>	</form>
<script type="text/javascript">
	$(document).ready(function(){
		$(window).scroll(function(){
			if  ($(window).scrollTop() == $(document).height() - $(window).height() && num>=2){
			addstudents(num);
			}
		}); 
		
	});
	</script>

				</div>
				</div>
				</div>
				</div><br /><br />
				</body>
				</html>