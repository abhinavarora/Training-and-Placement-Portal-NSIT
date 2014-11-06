<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php if (!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();}
if($_POST['company']== "NULL")
{echo '<script type="text/javascript">alert("Please select a Company to Apply!");</script>';
echo '<meta http-equiv="Refresh" content="0;
					URL=company_apply.php">';
					die();}
if($_POST['resume']== "NULL")
	{	
	echo '<script type="text/javascript">alert("Please select a Resume!");</script>';
	echo '<meta http-equiv="Refresh" content="0;
	URL=company_apply.php">';
	die();	}	
$company = $_POST['company'];
$resume = $_POST['resume'];
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
 
 if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
 mysql_select_db("nsitonli_trndpl", $con);
 

$q = "SELECT * FROM student WHERE rollnum = '".$_SESSION['username']."'";
$res = mysql_query($q) or die("Error: ".mysql_error());
if(mysql_num_rows($res) == 1)
$srow = mysql_fetch_array($res);
else
{echo '<script type="text/javascript">alert("Processing Error! Contact Technical Support.23");</script>';					echo '<meta http-equiv="Refresh" content="0;					URL=company_apply.php">';					die();
}
$q = "SELECT * FROM company WHERE name LIKE '".$company."'";
$res = mysql_query($q) or die("Error: ".mysql_error());
if(mysql_num_rows($res) == 1)
	$crow = mysql_fetch_array($res);
else
{
echo '<script type="text/javascript">alert("Processing Error! Contact Technical Support.");</script>';					echo '<meta http-equiv="Refresh" content="0;					URL=company_apply.php">';					die();
}
$check = 1;
$q = "SELECT * FROM companyapply WHERE company_name = '".$company."' AND student_rollnum = '".$_SESSION['username']."'";
$res = mysql_query($q) or die("Error".mysql_error());
$val = mysql_num_rows($res);if($val >= 1)
{
$reason = "You Have Already Registered for ".$company."!\\n";
$check = 0;
}
else
{
$reason = "Registration Failed! Reason being:\\n";
if($crow['cut_off'] > $srow['be_percentdrop'])
{
$check = 0;
$reason = $reason."# Your Percentage is less than Company Cut-off.\\n";
}
if($crow['backs_allowed'] < $srow['backs'])
{
$check = 0;
$reason = $reason."# You have more Backs than allowed by the Company.\\n";
}
if(stripos($crow['branches_allowed'],trim($srow['branch'])) === false)
{
$check = 0;
$reason = $reason."# Your branch is not allowed for the Company.\\n";
}
$q = "SELECT * FROM placement WHERE roll_num = '".$_SESSION['username']."'";
$res = mysql_query($q) or die("Error: ".mysql_error());
if(mysql_num_rows($res) == 1)
	$prow = mysql_fetch_array($res);
else
{
echo '<script type="text/javascript">alert("Processing Error! Contact Technical Support.");</script>';					echo '<meta http-equiv="Refresh" content="0;					URL=company_apply.php">';					die();
}
if($prow['job_1'])
{
$check = 0;
$reason = $reason."# You have been already placed in a Dream Company.\\n";
}
else if($prow['job_2'] && ($crow['grade'] != 'Dream'))
{
$check = 0;
$reason = $reason."# You have been placed in an A++ company, you can apply only for a Dream Company.\\n";
}
else if($prow['job_3'] && ($crow['grade'] == 'A+' || $crow['grade'] == 'A'))
{
$check = 0;
	$reason = $reason."# You have been placed in an A+ company, you can apply only for an A++ or a Dream Company.\\n";
}
else if($prow['job_4'] && ($crow['grade'] == 'A'))
{
$check = 0;
	$reason = $reason."# You have been placed in an A company, you can apply only in an A, an A++ or a Dream Company.\\n";
}}
if($check == 1)
{ 	$resume_result = mysql_query("SELECT * FROM resume WHERE rollnum='$_SESSION[username]'");
	$resrow = mysql_fetch_array($resume_result);
				$addfield=$resume."_address";
				$resumeaddress=$resrow[$addfield];
	$q = "INSERT INTO companyapply(company_name,student_rollnum) VALUES ('$company','$_SESSION[username]')";
 	$res = mysql_query($q) or die("Error:".mysql_error());
	$file =$resumeaddress;
	$result= mysql_query("SELECT * FROM student WHERE rollnum='$_SESSION[username]'");
	$row = mysql_fetch_array($result);
	$newfile = 'company_applications/'.$company.'/'.$row[fname].$row[lname].'_'.$row[rollnum].'_'.$row[be_percentdrop].'.pdf';
	copy($file, $newfile);
	echo '<script type="text/javascript">alert("You have successfully registered for '.$company.'!");</script>';
	echo '<meta http-equiv="Refresh" content="0;
	URL=company_apply.php">';
	die();
}
else
{
echo '<script type="text/javascript">alert("'.$reason.'");</script>';
	echo '<meta http-equiv="Refresh" content="0;
	URL=company_apply.php">';
	die();
}	
?>