<?php session_start();
	if($_SESSION['auth']!=1)
	header("Location:index.php");
if ($_SERVER["REQUEST_METHOD"] <> "POST") 
{ echo '<meta http-equiv="Refresh" content="0;
URL=index.php">';
 die();
}
require_once('../recaptchalib.php');
$privatekey = "6Ld02boSAAAAAD7JpMAhD-VPDlHoGv3r7_BBLtqU";
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
	$_SESSION['error']=$resp->error;
	echo '<meta http-equiv="Refresh" content="0;
URL=uploadcontent.php">';
die();
}?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
<title>Upload Content</title>	
<body>
<?php 
$name=$_POST['name'];
	if ($_FILES["file"]["size"] > 2048000)		
					{ echo '<script type="text/javascript">alert("Maximum upload size is 2 Megabytes!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=uploadcontent.php">';
					die();}
if (file_exists("adminuploads/" . $_FILES["file"]["name"]))
      {
	echo '<script type="text/javascript">alert("'.$_FILES["file"]["name"].' already exists!");</script>';
	echo '<meta http-equiv="Refresh" content="0;URL=uploadcontent.php">';
	die();    
	 }
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "adminuploads/" . $_FILES["file"]["name"]);
	  $address="adminuploads/" . $_FILES["file"]["name"];
	  $con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				if (!$con)
					{
					die('Could not connect: ' . mysql_error());
						}
				mysql_select_db("nsitonli_trndpl", $con);
				date_default_timezone_set('Asia/Calcutta');
				$present = mktime();
				$size=round($_FILES["file"]["size"]/1024,2);
				$size.= " kb";
	$sql="INSERT INTO uploads (name, address, date, size)
VALUES
('$name','$address','$present','$size')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  mysql_query("UPDATE student SET upload_counter = upload_counter+1");
  mysql_close($con);
echo '<script type="text/javascript">alert("'.$_FILES["file"]["name"].' successfully uploaded!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=uploadcontent.php">';
  ?>
