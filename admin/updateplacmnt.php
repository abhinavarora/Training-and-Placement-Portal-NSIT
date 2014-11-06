<?php
session_start();
if($_SESSION['auth']!=1)
	 header("Location:index.php");
$con = mysql_connect('localhost','nsitonli_potter','Rj9868045066');
mysql_select_db('nsitonli_trndpl',$con);
$q = "UPDATE placement SET ";
if($_POST['job1'] != '')
$q = $q."job_1 = '".$_POST['job1']."'";else if($_POST['job1'] != ' ')$_POST['job1']=NULL;if(($_POST['job1'] != '')&&(($_POST['job2'] !='')||($_POST['job3'] !='')||($_POST['job4'] !='')))$q.=",";
if($_POST['job2'] != '')
$q = $q."job_2 = '".$_POST['job2']."'";else if($_POST['job2'] != ' ')$_POST['job2']=NULL;if(($_POST['job2'] != '')&&(($_POST['job3'] !='')||($_POST['job4'] !='')))$q.=",";
if($_POST['job3'] != '')
$q = $q." job_3 = '".$_POST['job3']."'";else if($_POST['job3'] != ' ')$_POST['job3']=NULL;if(($_POST['job3'] != '')&&($_POST['job4'] !=''))$q.=",";
if($_POST['job4'] != '')
$q = $q." job_4 = '".$_POST['job4']."'";else if($_POST['job4'] != ' ')$_POST['job4']=NULL;
$q = $q." WHERE roll_num = '".$_GET['id']."'";
mysql_query($q,$con) or die(mysql_error());
?>
<script type="text/javascript">
window.location = "listplacmnt.php"
</script>