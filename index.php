<?php session_start(); 
if (isset($_SESSION['username']) && isset($_SESSION['fname']) && isset($_SESSION['login']) && $_SESSION['login']=1)
{
echo '<meta http-equiv="Refresh" content="0;
URL=home.php">';
die();}

if (isset($_SESSION['username']) && isset($_SESSION['name']) && isset($_SESSION['login']) && $_SESSION['login']=1)
{
echo '<meta http-equiv="Refresh" content="0;
URL=companyview.php">';
die();}
 ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Training & Placement, NSIT</title>
<meta name="google-site-verification" content="p2f5glfRtVL_I46w5vMGcROgM0GNYM1vWt8VjjRjI0w" />
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Training & Placement, NSIT" />
<meta name="keywords" content="training, placement, NSIT, NSIT Delhi, netaji subhas institute of technology, DIT" />

<link rel="stylesheet" type="text/css" href="css/template.css" />

<style type="text/css">
.menutitle{
cursor:pointer;
border-bottom: 1px solid #cdcdcd;
background-color: #f2f2e8;
	display: block;
	font:bold 1.24em Arial, Tahoma, sans-serif;
	color: #33393c;
	text-decoration: none;
	padding: 8px 10px 8px 15px;
	height: 1%;
	
}


.menutitle:hover
{
background-color: #e6e6d2;
}
.submenu{
border-bottom: 1px solid #cdcdcd;
}
a.sub
{
cursor:pointer;
background-color: #f2f2e8;
	display: block;
	font: normal 1.2em Arial, Tahoma, sans-serif;
	color: #33393c;
	text-decoration: none;
	padding: 8px 10px 8px 15px;
	height: 1%;}
a.sub:hover
{
background-color: #e6e6d2;
}

#current div
{
background-image: url('../back/white.jpg');
}
</style>
	
	<script type="text/javascript">

function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {
    alert(alerttxt);return false;
    }
  else
    {
    return true;
    }
  }
}
function validate_form(thisform)
{
with (thisform)
  {
  if (validate_required(username,"Userame must be filled out!")==false)
  {username.focus();return false;}
if (validate_required(password,"Password must be filled out!")==false)
  {password.focus();return false;} 
    }
}
</script>
<script type="text/javascript">

/***********************************************
* Switch Menu script- by Martial B of http://getElementById.com/
* Modified by Dynamic Drive for format & NS4/IE4 compatibility
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

var persistmenu="yes" //"yes" or "no". Make sure each SPAN content contains an incrementing ID starting at 1 (id="sub1", id="sub2", etc)
var persisttype="sitewide" //enter "sitewide" for menu to persist across site, "local" for this page only

if (document.getElementById){ //DynamicDrive.com change
document.write('<style type="text/css">\n')
document.write('.submenu{display: none;}\n')
document.write('</style>\n')
}

function SwitchMenu(obj){
	if(document.getElementById){
	var el = document.getElementById(obj);
	var ar = document.getElementById("masterdiv").getElementsByTagName("span"); //DynamicDrive.com change
		if(el.style.display != "block"){ //DynamicDrive.com change
			for (var i=0; i<ar.length; i++){
				if (ar[i].className=="submenu") //DynamicDrive.com change
				ar[i].style.display = "none";
			}
			el.style.display = "block";
		}else{
			el.style.display = "none";
		}
	}
}

function get_cookie(Name) { 
var search = Name + "="
var returnvalue = "";
if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) { 
offset += search.length
end = document.cookie.indexOf(";", offset);
if (end == -1) end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}

function onloadfunction(){
if (persistmenu=="yes"){
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=get_cookie(cookiename)
if (cookievalue!="")
document.getElementById(cookievalue).style.display="block"
}
}

function savemenustate(){
var inc=1, blockid=""
while (document.getElementById("sub"+inc)){
if (document.getElementById("sub"+inc).style.display=="block"){
blockid="sub"+inc
break
}
inc++
}
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=(persisttype=="sitewide")? blockid+";path=/" : blockid
document.cookie=cookiename+"="+cookievalue
}

if (window.addEventListener)
window.addEventListener("load", onloadfunction, false)
else if (window.attachEvent)
window.attachEvent("onload", onloadfunction)
else if (document.getElementById)
window.onload=onloadfunction

if (persistmenu=="yes" && document.getElementById)
window.onunload=savemenustate

</script>

</head>

<body>


	<div id="page-container">

	<div id="branding">
	
<img src="banner/tnp2.jpg" width="100%" height="150"/>	
</div><!-- end branding -->
				
		<div id="page-content" class="clearfix">
			
			
			
			<h2>Welcome to the Homepage of the Training and Placement Cell, Netaji Subhas Institute of Technology.</h2>
			<div class="inner-box clearfix">
			
				<div id="sidebar">
				
					<ul id='sidebar' class="main">
						<li class="head">Main Menu</li>
						
<div id="masterdiv">

	<div class="menutitle" id="current" onclick="window.location='index.php'">Home</div>
	<div onclick="SwitchMenu('sub1')"><a class="menutitle" href="why_nsit.html">Why NSIT</a></div>
	<span class="submenu" id="sub1">
		<a class="sub" href="history.html">History</a>
		 <a class="sub" href="student.html">Students</a>
		 <a class="sub" href="courses.html">Courses Offered</a>
		 <a class="sub" href="faculty.html">Faculty & Research</a>
		 <a class="sub" href="alumni.html">Alumni</a>
	
	</span>

	<div class="menutitle" onclick="SwitchMenu('sub2')">Placements</div>
	<span class="submenu" id="sub2">
		 <a class="sub" href="procedure.html">Procedure</a>
		 <a class="sub" href="policy.html">Policy</a>
		 <a class="sub" href="NSIT-Recruitment-Brochure-2010-11.pdf" target="_blank">Brochure</a>
	</span>
	<div class="menutitle" onclick="window.location='recruiters.html'">Our Past Recruiters</div>	
	
	<div class="menutitle" onclick="SwitchMenu('sub3')">Contact Us</div>
	<span class="submenu" id="sub3">
		 <a class="sub" href="map.html">Map</a>
		 <a class="sub" href="team.html">Team</a>
	</span>

</div>
						<br/><br/>
<li>
<form action="companyverifylogin.php" onsubmit="return validate_form(this)" method="post">
<div class="back">

<h2> Company Login :</h2><br/><b>Username: </b><br/><input type="text" name="username" value = "" style='width:80%'>

<b>Password: </b><br/><input type="password" name="password" value = "" style='width:80%'>
<input name="login" type="submit" style='width:80%; cursor: pointer;' value="Login">
<input type="hidden" name="loginID"
value="company">
</div>
</form>
</li>
<br/><br/>						
<li><form action="verifylogin.php" onsubmit="return validate_form(this)" method="post"><div class="back"><h2> Student Login : </h2><br/><b>Username: </b><br/><input type="text" name="username" value = "" style='width:80%'><b>Password: </b><br/><input type="password" name="password" value = "" style='width:80%'><input name="login" type="submit" style='width:80%; cursor: pointer;' value="Login"><input type="hidden" name="loginID"value="student"></div></form></li>
</ul>
			
				
				</div>
			
				<div id="form-block">
<style>
.messagestyle{
	font-family:Arial;
	font-size:11px;
	color:white;
	background-color:#888888;
	text-align:center;
	position:absolute;
	bottom:0px;
	vertical-align:middle;
	margin:0px;
	line-height:15px;
	height:17px;
}

</style>
<p>Click <a href="NSIT-Recruitment-Brochure-2011-12.pdf" target="_blank">here</a> to view our Recruitment Brochure.</p><br/>
<script>

// Slideshow with with lamellar effect
// by Peter Gehrig


var pictures = [
    { src : 'images/image1.jpg'},
    { src : 'images/image2.jpg'},
    { src : 'images/image3.jpg'},
    
    { src : 'images/image21.jpg'},
    { src : 'images/image5.jpg'},
    { src : 'images/image6.jpg'},
    { src : 'images/image7.jpg'},
    { src : 'images/image8.jpg'},
    { src : 'images/image9.jpg'},
    { src : 'images/image10.jpg'},
    { src : 'images/image11.jpg'},
    { src : 'images/image12.jpg'},
{ src : 'images/image4.jpg'},
    { src : 'images/image13.jpg'},
    { src : 'images/image14.jpg'},
    { src : 'images/image15.jpg'},
    { src : 'images/image16.jpg'},
    { src : 'images/image17.jpg'},
    { src : 'images/image18.jpg'},
    { src : 'images/image19.jpg'},
    { src : 'images/image20.jpg'},
    
    { src : 'images/image24.jpg'},
    { src : 'images/image23.jpg'},
    { src : 'images/image22.jpg'}
];

var target_url="_blank"

var x_slices=12

var slideshow_width=600

var slideshow_height=600

var message_height=17


var pause=2
</script>
<script src="js/slideshow-lamellar.js"></script>				</div>
				</div>

			
			
	
	<p style="text-align:center;font-weight:lighter; font-size:15px;font-family:Harlow Solid Italic;">
	Designed by Abhinav Arora, Tapan Goyal, Rahul Jain & Saurabh Kushwaha
	</p>
		</div><!-- end page-content -->
				
	</div><!-- end page-container -->
<br />

</body>

</html>
