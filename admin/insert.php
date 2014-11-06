<?php
session_start();
		if($_SESSION['auth']!=1)
			 header("Location:index.php");
$con=mysql_connect("localhost","nsitonli_potter","Rj9868045066") or die("could not connect");
mysql_select_db("nsitonli_trndpl",$con);
$password=md5($_POST['password']);
$q = "insert into student (`sid`,`fname`,`lname`,`gender`,`stud_category`,`branch`,`dob`,`rollnum`,`password`,`be_percentdrop`,`be_percent`,`x_percent`,`x_s_percent`,`x_m_percent`";

$q = $q.",`xii_percent`,`xii_pcm_percent`,`xii_m_percent`,`x_year`,`xii_year`,`yr1_percent`,`yr2_percent`,`yr3_percent`,`sem1_percent`";

$q = $q.",`sem2_percent`,`sem3_percent`,`sem4_percent`,`sem5_percent`,`sem6_percent`,`email`,`alt_email`,`presnt_add`,`perm_add`,`father_name`,";

$q = $q."`father_occ`,`mother_name`,`mother_occ`,`father_cntct`,`backs`,`cntct`,`alt_cntct`,`cee_rnk`,`aiee_rnk`,`iit_rnk`,`intern_comp`,`intern_title`";

$q = $q.",`extra_co`,`message_counter`) VALUES(NULL,'$_POST[fname]','$_POST[lname]','$_POST[gender]','$_POST[category]','$_POST[branch]','$_POST[dob]',";

$q = $q."'$_POST[rollnum]','$password','$_POST[be_percentdrop]','$_POST[be_percent]','$_POST[x_percent]','$_POST[x_s_percent]','$_POST[x_m_percent]','$_POST[xii_percent]',";

$q = $q."'$_POST[xii_pcm_percent]','$_POST[xii_m_percent]','$_POST[x_year]','$_POST[xii_year]','$_POST[yr1_percent]','$_POST[yr2_percent]',";

$q = $q."'$_POST[yr3_percent]','$_POST[sem1_percent]','$_POST[sem2_percent]','$_POST[sem3_percent]','$_POST[sem4_percent]','$_POST[sem5_percent]',";

$q = $q."'$_POST[sem6_percent]','$_POST[email]','$_POST[alt_email]','$_POST[presnt_add]','$_POST[perm_add]','$_POST[father_name]','$_POST[father_occ]',";

$q = $q."'$_POST[mother_name]','$_POST[mother_occ]','$_POST[father_cntct]','$_POST[backs]','$_POST[cntct]','$_POST[alt_cntct]','$_POST[cee_rnk]','$_POST[aiee_rnk]','$_POST[iit_rnk]',";

$q = $q."'$_POST[intern_comp]','$_POST[intern_title]','$_POST[extra_co]',0)"; 
mysql_query($q) or die(mysql_error());
mysql_query("INSERT INTO resume (rollnum)
VALUES ('$_POST[rollnum]')");
mysql_query("INSERT INTO placement (roll_num)
VALUES ('$_POST[rollnum]')");
mysql_close($con); ?>
<script type="text/javascript">
window.location = "users.php"
</script>
