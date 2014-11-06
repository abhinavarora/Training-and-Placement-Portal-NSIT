<?php
session_start();
		if($_SESSION['auth']!=1)
			header("Location:index.php");		
?>
<!DOCTYPE html PUBLIC "-//W4C//DTD XHTML 1.0 Strict//EN" "http://www.w4.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w4.org/1999/xhtml">
<head>
	<title>Add user</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="INDEX,FOLLOW" />
	<link rel="stylesheet" type="text/css" href="css/template.css" /></head>
<body>
	<div id="page-container">
		<div id="branding">
			<h1>PlaceComm <span>| Administrator</span></h1>
		</div><!-- end branding -->
		<div id="page-content" class="clearfix">
			
			<h1>Add User</h1>
			<h2></h2>
			<div class="inner-box clearfix">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="800px" id="AutoNumber1">
  <tr>
    <td width="80%" valign= "top">

				<div id="form-block">
					<form method="post" action="insert.php">
					<label for="field_1">First Name *</label>
					<input type="text" name="fname" rows="4" cols="4" id="field_1" class="short" >
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_2">Last name *</label>
					<input type="text" name="lname" rows="4" cols="4" id="field_2" class="short">
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_4">Branch *</label>
					<select name="branch" id="field_4" class="short" />
					<option value="BT">BT</option>
					<option value="COE">COE</option>
					<option value="ECE">ECE</option>
					<option value="ICE">ICE</option>
					<option value="IT">IT</option>
					<option value="MPAE">MPAE</option>
					<option value="SP">SP</option>
					<option value="IS">IS</option>
					<option value="PC">PC</option>
					</select>
					<br/>
					<label for="field_5">Roll number *</label>
					<input type="text" rows="4" name="rollnum" cols="4" id="field_5" ></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_45">Password *</label>
					<input type="password" rows="4" cols="4" name="password" id="field_45" ></input>
					<em><!--Insert info about field here--></em>
					<label for="field_46">BE Percentage With Drop *</label>
					<input type="text" rows="4" cols="4" name="be_percentdrop" id="field_46"></input>															<label for="field_44">Gender *</label>					Male<input type="radio" name="gender" value="Male" checked="checked" style="width:50px;" id="field_44"> 					Female<input type="radio" name="gender" value="Female" id="field_44" style="width:50px;" />					<em><!--Insert info about field here--></em>					<br/>
								<label for="field_47">Category *</label>					<select name="category" id="field_47" class="short" />					<option value="GEN">GEN</option>					<option value="SC">SC</option>					<option value="ST">ST</option>					<option value="OBC">OBC</option>					<option value="PH">PH</option>					<option value="DEF">DEF</option>					</select>					<em><!--Insert info about field here--></em>					<br/>
					<label for="field_6">BE Percentage Without Drop *</label>
					<input type="text" rows="4" cols="4" name="be_percent" id="field_6"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_7">Year I Percentage *</label>
					<input type="text" rows="4" cols="4" name="yr1_percent" id="field_7"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_8">Year II Percentage *</label>
					<input type="text" rows="4" cols="4" id="field_8" name="yr2_percent"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_9">Year III Percentage </label>
					<input type="text" rows="4" cols="4" id="field_9" name="yr4_percent"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_10">Semester: 1 Percentage *</label>
					<input type="text" rows="4" cols="4" id="field_10" name="sem1_percent"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_11">Semester: 2 Percentage *</label>
					<input type="text" rows="4" cols="4" id="field_11" name="sem2_percent"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_12">Semester: 4 Percentage *</label>
					<input type="text" rows="4" cols="4" id="field_12" name="sem4_percent"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_14">Semester: 4 Percentage *</label>
					<input type="text" rows="4" cols="4" id="field_14" name="sem4_percent"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_14">Semester: 5 Percentage *</label>
					<input type="text" rows="4" cols="4" name="sem5_percent" id="field_14"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_15">Semester: 6 Percentage *</label>
					<input type="text" rows="4" cols="4" name="sem6_percent" id="field_15"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_16">Backlogs *</label>
					<input type="text" rows="4" cols="4" name="backs" id="field_16"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_17">Contact *</label>
					<input type="text" rows="4" cols="4" name="cntct" id="field_17"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_18">Email *</label>
					<input type="text" rows="4" cols="4" name="email" id="field_18"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_19">Intern Company</label>
					<input type="text" rows="4" cols="4" name="intern_comp" id="field_19"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_20">Intern Title</label>
					<input type="text" rows="4" cols="4" name="intern_title" id="field_4"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_21">Class X Percentage </label>
					<input type="text" rows="4" cols="4" name="x_percent" id="field_21"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_22">Class X Science Percentage </label>
					<input type="text" rows="4" cols="4" name="x_s_percent" id="field_22"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_24">Class X Maths Percentage </label>
					<input type="text" rows="4" cols="4" name="x_m_percent" id="field_24"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_24">Class XII Percentage </label>
					<input type="text" rows="4" cols="4" name="xii_percent" id="field_24"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_25">Class XII PCM Percentage </label>
					<input type="text" rows="4" cols="4" name="xii_pcm_percent" id="field_25"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_26">Class XII Maths Percentage </label>
					<input type="text" rows="4" cols="4" name="xii_m_percent" id="field_26"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_27">Father's Name </label>
					<input type="text" rows="4" cols="4" name="father_name" id="field_27"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_28">Mother's Name</label>
					<input type="text" rows="4" cols="4" name="mother_name" id="field_28"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_29">Father's occupation</label>
					<input type="text" rows="4" cols="4" name="father_occ" id="field_29"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_40">Mother's Occupation</label>
					<input type="text" rows="4" cols="4" name="mother_occ" id="field_40"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_41">Father Contact</label>
					<input type="text" rows="4" cols="4" name="father_cntct" id="field_41"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_42">Alternate Contact</label>
					<input type="text" rows="4" cols="4" name="alt_cntct" id="field_42"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_44">Alternate E-mail</label>
					<input type="text" rows="4" cols="4" name="alt_email" id="field_44"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_44">Present Address *</label>
					<input type="text" rows="4" cols="4" name="presnt_add" id="field_44"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_45">Permanenet Address *</label>
					<input type="text" rows="4" cols="4" name="perm_add" id="field_45"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_46">Date Of Birth *</label>
					<input type="text" rows="4" cols="4" name="dob" id="field_46"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_48">AIEEE Rank </label>
					<input type="text" rows="4" cols="4" name="aiee_rnk" id="field_48"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_49">CEE Rank</label>
					<input type="text" rows="4" cols="4" name="cee_rnk" id="field_49"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_40">IIT Rank</label>
					<input type="text" rows="4" cols="4" name="iit_rnk" id="field_40"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_41">Extra Curricular</label>
					<input type="text" rows="4" cols="4" name="extra_co" id="field_41"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_42">X Year </label>
					<input type="text" rows="4" cols="4" name="x_year" id="field_42"></input>
					<em><!--Insert info about field here--></em>
					<br/>
					<label for="field_44">XII Year</label>
					<input type="text" rows="4" cols="4" name="xii_year" id="field_42"></input>
					<em><!--Insert info about field here--></em>
					<br/>

					<input type="submit" name="submit" class="submit" value="Submit form"  />
					<input type="reset" class="submit reset" value="Reset form"  />
				</form>
				</div>
</td>
    <td width="20%" valign="top"><div id="sidebar">
<br/>	<ul>
<li class="head">Main Menu</li>
<li><a href="index.php">Home</a></li>
<li class="current"><a href="adduser.php">Add User</a></li>
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
<li><a href="companyplacements.php">View Company Placements</a></li>
<li><a href="registrations.php">View Registrations</a></li>
<li><a href="company.php">Create Company Login</a></li>
<li><a href="companyloginlist.php">Company Login List</a></li>
<li><a href="contacts.html">Contacts</a></li>
<li><a href="logout.php">Logout</a></li>
				</ul>				
				</div>
</td></tr>
</table>
			
			</div>

		</div><!-- end page-content -->
		
		<div id="page-footer">
			
			<p><strong>NSIT Placement Management Portal|<a href="webteam.html">Webteam</a></p>
				
		</div><!-- end page-footer -->
		
	</div><!-- end page-container -->

</body>


</html>
