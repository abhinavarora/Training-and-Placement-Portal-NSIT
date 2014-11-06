<?php
session_start();
	if($_SESSION['auth']!=1)
		 header("Location:index.php");
$val = $_GET['id'];
	$con=mysql_connect("localhost","nsitonli_potter","Rj9868045066");
	mysql_select_db("nsitonli_trndpl",$con);
$q1 = "SELECT * FROM student WHERE sid= ".$val;
$res1 = mysql_query($q1) or die("Error1: ".mysql_error());
$row = mysql_fetch_array($res1);
	$q="UPDATE student SET fname='".$_POST['fname'].
			    "', lname='".$_POST['lname'].
			    "', gender='".$_POST['gender'].
			    "', stud_category = '".$_POST['category'].
			    "', branch='".$_POST['branch'].
			    "', dob='".$_POST['dob'].
			    "', rollnum='".$_POST['rollnum'].
			    "', be_percentdrop='".$_POST['be_percentdrop'].
			    "', be_percent = '".$_POST['be_percent'].
			    "', x_percent = '".$_POST['x_percent'].
			    "', x_s_percent = '".$_POST['x_s_percent'].
			    "', x_m_percent= '".$_POST['x_m_percent'].
			    "', xii_percent= '".$_POST['xii_percent'].
			    "', xii_pcm_percent= '".$_POST['xii_pcm_percent'].
			    "', xii_m_percent= '".$_POST['xii_m_percent'].
			    "', x_year= '".$_POST['x_year'].
			    "', xii_year='".$_POST['xii_year'].
			    "', yr1_percent='".$_POST['yr1_percent'].
			    "', yr2_percent='".$_POST['yr2_percent'].
			    "', yr3_percent='".$_POST['yr3_percent'].
                      "', sem1_percent='".$_POST['sem1_percent'].
				"', sem2_percent='".$_POST['sem2_percent'].
				"', sem3_percent='".$_POST['sem3_percent'].
				"', sem4_percent='".$_POST['sem4_percent'].
				"', sem5_percent='".$_POST['sem5_percent'].
				"', sem6_percent='".$_POST['sem6_percent'].
				"', email='".$_POST['email'].
				"', alt_email='".$_POST['alt_email'].
				"', presnt_add='".$_POST['presnt_add'].
				"', perm_add='".$_POST['perm_add'].
				"', father_name='".$_POST['father_name'].
				"', father_occ ='".$_POST['father_occ'].
				"', mother_name='".$_POST['mother_name'].
				"', mother_occ='".$_POST['mother_occ'].
				"', father_cntct='".$_POST['father_cntct'].
				"', backs='".$_POST['backs'].
				"', cntct='".$_POST['cntct'].
				"', alt_cntct='".$_POST['alt_cntct'].
				"', cee_rnk='".$_POST['cee_rnk'].
				"', aiee_rnk='".$_POST['aiee_rnk'].
				"', iit_rnk='".$_POST['iit_rnk'].
				"', intern_comp='".$_POST['intern_comp'].
				"', intern_title='".$_POST['intern_title'].
				"', extra_co='".$_POST['extra_co'];
if($_POST['password'] != $row['password'] )
			$q = $q."', password='".md5($_POST['password'])."' where sid=".$val;
else
	$q = $q."' WHERE sid=".$val;
echo "Redirecting....."; 
//echo $q;	
$res=mysql_query($q) or die("Query Error:".mysql_error());
?>
<script type="text/javascript">
window.location = "users.php"
</script>


