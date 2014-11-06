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
{echo '<script type="text/javascript">alert("Please select a Company to Deregister!");</script>';
echo '<meta http-equiv="Refresh" content="0;
					URL=company_apply.php">';
					die();}
$company = $_POST['company'];
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
 
 if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
 mysql_select_db("nsitonli_trndpl", $con);
date_default_timezone_set('Asia/Calcutta');
$present = mktime();
$result= mysql_query("SELECT * FROM company WHERE name='$company'");
$row = mysql_fetch_array($result);
if($present > $row['close_date'])
{
echo '<script type="text/javascript">alert("You can not cancel your application for '.$company.' as its registerations are not open now!");</script>';
echo '<meta http-equiv="Refresh" content="0;
					URL=cancel_application.php">';
					die();
}

$result = mysql_query("DELETE FROM companyapply WHERE company_name='$company' AND student_rollnum ='$_SESSION[username]'");
$result= mysql_query("SELECT * FROM student WHERE rollnum='$_SESSION[username]'");

	$row = mysql_fetch_array($result);

	$file = 'company_applications/'.$company.'/'.$row[fname].$row[lname].'_'.$row[rollnum].'_'.$row[be_percentdrop].'.pdf';
unlink($file);
	echo '<script type="text/javascript">alert("Your application for '.$company.' has successfully been canceled!");</script>';
echo '<meta http-equiv="Refresh" content="0;
					URL=cancel_application.php">';
					die();