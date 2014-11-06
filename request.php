<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php if (!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} 
if ($_SERVER["REQUEST_METHOD"] <> "POST") 
 die("You can only reach this page by posting from the html form");
 
?>
<head>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Training & Placement, NSIT" />
</head>
<body>

	
<?php

if($_POST['resume']== "NULL")
	{
	echo '<script type="text/javascript">alert("Please select a Resume!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=resume.php">';
					die();
	}
	if($_POST['submit']== "Upload")
	{
		if ($_FILES["file"]["error"] == 4)
				{ echo '<script type="text/javascript">alert("Please select a file to upload!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=resume.php">';
					die();}
					
		elseif ($_FILES["file"]["type"] != "application/pdf")
				{
				echo '<script type="text/javascript">alert("Only a .Pdf file can be uploaded!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=resume.php">';
					die();
					}
		elseif ($_FILES["file"]["size"] > 512000)		
					{ echo '<script type="text/javascript">alert("Maximum upload size is 512 kilobytes!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=resume.php">';
					die();}
					
		else
				{
				$username=$_SESSION['username'];
				$rollnum=substr($username,0,3);
				$branch=substr($username,3,2);
				$branch=strtoupper($branch);
				$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				if (!$con)
					{
					die('Could not connect: ' . mysql_error());
						}
				mysql_select_db("nsitonli_trndpl", $con);
				$result = mysql_query("SELECT * FROM resume WHERE rollnum='$username'");
				$row = mysql_fetch_array($result);
				$addfield=$_POST[resume]."_address";
				if($row[$_POST[resume]]==1)	
					{
					unlink($row[$addfield]);
					}
				$sha1_hash = sha1(rand(0,999)); 
				$code = substr($sha1_hash, 10,7);
				$address="uploads/resumes/".$branch."/".$rollnum."_".$_POST[resume]."_".$code.".pdf";
				if(move_uploaded_file($_FILES["file"]["tmp_name"],$address))
					{ 
					$sql= "UPDATE resume SET ".$addfield. "= '".$address."', ".$_POST[resume]. "= '1' WHERE rollnum = '".$username."'";
					if (!mysql_query($sql,$con))
						{
							die('Error: ' . mysql_error());
						}
						mysql_close($con);
					echo '<script type="text/javascript">alert("Resume successfully uploaded!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=resume.php">';
					die();
					}
				}
				
		}
elseif($_POST['submit']=='Delete')
		{
		$username=$_SESSION['username'];
		$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				if (!$con)
					{
					die('Could not connect: ' . mysql_error());
						}
				mysql_select_db("nsitonli_tnp12", $con);
				$result = mysql_query("SELECT * FROM resume WHERE rollnum='$username'");
				$row = mysql_fetch_array($result);
			$addfield=$_POST[resume]."_address";
			if(unlink($row[$addfield]))
				{
				$sql= "UPDATE resume SET ".$addfield. "= '', ".$_POST[resume]. "= '0' WHERE rollnum = '".$username."'";
					if (!mysql_query($sql,$con))
						{
							die('Error: ' . mysql_error());
						}
					mysql_close($con);
				echo '<script type="text/javascript">alert("Resume successfully deleted!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=resume.php">';
					die();
				}
		}
elseif($_POST['submit']=='View')
		{
		$username=$_SESSION['username'];
		$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				if (!$con)
					{
					die('Could not connect: ' . mysql_error());
						}
				mysql_select_db("nsitonli_tnp12", $con);
				$result = mysql_query("SELECT * FROM resume WHERE rollnum='$username'");
				$row = mysql_fetch_array($result);
			$addfield=$_POST[resume]."_address";
			echo '<p><a href="resume.php" onClick="window.open ('."'".$row[$addfield]."', "."'mywindow')".'">Click here</a> to view your resume!</p>';
			echo '<meta http-equiv="Refresh" content="120;
					URL=resume.php">';
		}
elseif($_POST['submit']=='Apply')
{
if($_POST['company']== "NULL")
	{
	echo '<script type="text/javascript">alert("Please select a Company!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=home.php">';
					die();
	}
	
$username=$_SESSION['username'];
		$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				if (!$con)
					{
					die('Could not connect: ' . mysql_error());
						}
				mysql_select_db("nsitonli_tnp12", $con);
	$result = mysql_query("SELECT * FROM resume WHERE rollnum='$username'");
				$row = mysql_fetch_array($result);
				$addfield=$_POST[resume]."_address";
				$resumeaddress=$row[$addfield];
	$sql= "INSERT INTO companyapply (company_name, student_rollnum, resume) VALUES ('".$_POST['company']."', '".$username."', '".$resumeaddress."')";
	if (!mysql_query($sql,$con))
						{
							die('Error: ' . mysql_error());
						}
						mysql_close($con);
	echo '<script type="text/javascript">alert("Successfully Applied for '.$_POST['company'].'!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=home.php">';
					die();
	}
?>