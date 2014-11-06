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
URL=adduserplacementcsv.php">';
die();
}?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
<title>Upload CSV</title>	
<body>
<?php 
$name=$_POST['comp'];
	if ($_FILES["file"]["size"] > 2048000)		
					{ echo '<script type="text/javascript">alert("Maximum upload size is 2 Megabytes!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=adduserplacementcsv.php">';
					die();}
if (file_exists("admincsv/" . $_FILES["file"]["name"]))
      {
	echo '<script type="text/javascript">alert("'.$_FILES["file"]["name"].' already exists!");</script>';
	echo '<meta http-equiv="Refresh" content="0;URL=adduserplacementcsv.php">';
	die();    
	 }
/* 
if (filetype("admincsv/" .$_FILES["file"]["type"])!= "application/vnd.ms-excel"||filetype("admincsv/" .$_FILES["file"]["type"])!= "text/csv")
     {
	echo '<script type="text/javascript">alert("'.$_FILES["file"]["name"].' is not of valid filetype!");</script>';
	echo '<meta http-equiv="Refresh" content="0;URL=adduserplacementcsv.php">';
	die();    
	 }
*/
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "admincsv/" . $_FILES["file"]["name"]);
	  $address="admincsv/" . $_FILES["file"]["name"];
	  
	  $con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				if (!$con)
					{
					die('Could not connect: ' . mysql_error());
					}
				mysql_select_db("nsitonli_trndpl", $con);
				
$result = mysql_query("SELECT * FROM company WHERE name ='".$name."' ");
while($row = mysql_fetch_array($result))
  {
  $cgrade=$row['grade'];
  }
  
if($cgrade=='A')
	{$job='job_4';}
else if($cgrade=='A+')
	{$job='job_3';}
else if($cgrade=='A++')
	{$job='job_2';}
else if($cgrade=='Dream')
	{$job='job_1';}
	
$row = 1;	
if (($handle = fopen("admincsv/" . $_FILES["file"]["name"], "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
        $num = count($data);
		
		mysql_query("UPDATE placement SET ".$job."= '".$name."' WHERE roll_num='".$data[0]."' ");
		$row++;

//		echo $data[0] . "<br />\n";
 //       echo $cgrade."<br />\n";
//		echo $name."<br />\n";
//		echo $_FILES["file"]["type"];
        
    }
    fclose($handle);
	}
	else
	{
	echo "testfalse";
	}
				
				
	/*$sql="INSERT INTO uploads (name, address, date, size)
VALUES
('$name','$address','$present','$size')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  /*mysql_query("UPDATE student SET upload_counter = upload_counter+1");*/
  mysql_close($con);
echo '<script type="text/javascript">alert("'.$_FILES["file"]["name"].' successfully uploaded!");</script>';
					echo '<meta http-equiv="Refresh" content="0;
					URL=adduserplacementcsv.php">';
  ?>
