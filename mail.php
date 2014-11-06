<?php 


$fp = fopen("test.rtf", 'w+'); 
    
$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_trndpl",$con);
$cname = $_SESSION['name'];


$sqlselect="SELECT * from companyprofile WHERE username = 'Yahoo' "; 			
if(!mysql_query($sqlselect,$con))
	 {
	  die('Error: ' . mysql_error());
	 }
	 $result = mysql_query($sqlselect);
	 $row = mysql_fetch_array($result);



$str = "<html><head><body>
<h2><U>COMPANY CONTACT INFORMATION</U></h2>
<B>Name of the Firm : </B>".$row['cname']."<br/><B>Postal Address : </B>".$row['address']."<br/><B>City : </B>".$row['city']."<br/><B>State : </B>".$row['state'].
"<br/><B>Pin code : </B>".$row['pincode']."<br/><B>Contact Number : </B>".$row['contact']."<br/><B>Fax Number : </B>".$row['fax']."<br/><B>Website : </B>".$row['website'].
"<br/><br/><h2><U>HEAD OF DEPARTMENT CONTACT INFORMATION</U></h2>
<B>Name : </B>".$row['head_name']."<br/><B>Contact Number<br/>Mobile : </B>".$row['head_mobile']."<br/><B>Landline : </B>".$row['head_landline']."<br/><B>Email ID : </B>".$row['head_email'].
"<br/><br/><h2><U>HR CONTACT INFORMATION</U></h2>
<B>Name : </B>".$row['hr_name']."<br/><B>Designation : </B>".$row['hr_designation']."<br/><B>Contact Number<br/>Mobile : </B>".$row['mobile']."<br/><B>Landline : </B>".$row['landline']."<br/><B>Email ID : </B>".$row['email'].
"<br/><br/><h2><U>JOB PROFILE</U></h2>
<B>Job Designation : </B>".$row['job_desig']."<br/><B>Job Description : </B>".$row['job_describe']."<br/><B>Place of Posting : </B>".$row['place']."<br/><B>Tentative Joining Date : </B>".$row['date'].
"<br/><br/><h2><U>COMPENSATION</U></h2>
<h3><U>Bachelor of Engineering (B.E.)</U></h3>
<B>HRA : </B>".$row['hra']."<br/><B>Gross : </B>".$row['gross']."<br/><B>Others : </B>".$row['othercompensation']."<br/><B>Take Home : </B>".$row['takehome']."<B>Cost to Company : </B>".$row['cost']."<br/><B>Any further Details : </B>".$row['details'].
"<h3><U>Master of Technology (M.tech.)</U></h3>
<B>HRA : </B>".$row['mhra']."<br/><B>Gross : </B>".$row['mgross']."<br/><B>Others : </B>".$row['mothercompensation']."<br/><B>Take Home : </B>".$row['mtakehome']."<B>Cost to Company : </B>".$row['mcost']."<br/><B>Any further Details : </B>".$row['mdetails'].
"<br/><br/><h2><U>BRANCHES ALLOWED</U></h2>
<h3><U>Bachelor of Engineering (B.E.)</U></h3>
<B>Electronics and Communication Engineering : </B>".$row['ece']."<br/><B>Computer Engineering : </B>".$row['cse']."<br/><B>Information Technology : </B>".$row['it']."<br/><B>Instrumentation & Control Engineering : </B>".$row['ice']."<B>Manufacturing Process & Automation Engineering : </B>".$row['mpae']."<br/><B>Biotechnology : </B>".$row['bt'].
"<h3><U>Master of Technology (M.tech.)</U></h3>
<B>Signal Processing : </B>".$row['sp']."<br/><B>Information Systems : </B>".$row['infos']."<br/><B>Process Control : </B>".$row['pc'].
"<br/><br/><h2><U>SELECTION PROCEDURE</U></h2>
<B>Pre Placement Talk : </B>".$row['ppt']."<br/><B>Percentage Criteria : </B>".$row['percent']."<br/><B>Resume Shortlisting : </B>".$row['resume_short']."<br/><B>Written Test : </B>".$row['test']."<br/><B>Type of Written Test : </B>".$row['testtype']."<br/><B>Group Discussion : </B>".$row['gd']."<br/><B>Technical Interview(s) : </B>".$row['ti']."<br/><B>HR Interview : </B>".$row['hri']."<br/><B>Others : </B>".$row['others']."<br/><B>Bond or Service Contract : </B>".$row['bond']."<br/><B>Deatils of bond : </B>".$row['bonddetalis']."<br/><B>Expected number of days required for declaration of result : </B>".$row['result'].
"<br/><br/><h2><U>INFRASTRUCTURE REQUIRED</U></h2>
<B>Number of Days required for recruitment : </B>".$row['days']."<br/><B>Number of Executives visiting the campus : </B>".$row['executives']."<br/><B>Number of rooms needed for conducting the interviews : </B>".$row['rooms']."<br/><B>Other Requirements : </B>".$row['otherinfra'].
"</body></html>"; 
   fwrite($fp, $str); 

    fclose($fp); 
?>


<?php 
//to be successfull in useing this code you need to create a directory called upload
//on you ftp create a directory upload in wich copy the content of the zip file

$filename="CRF-" . $row['cname'];

//$filleant takes the value of the picture that was jut uploaded with the unique name to the ftp in the www.yourname.com/upload/upload
$fileatt = "test.rtf"; // Path to the file                  
$fileatt_type = "application/octet-stream"; // File Type 
//here i made the file that will be sent as attachment to have the name "CV_name_surname.doc" you can make it what format you like,
//i needed the doc format... and i'll modify this code to accept just doc file later...i'm really tired right now :D
$fileatt_name = $filename . ".doc"; // Filename that will be used for the file as the attachment 

//$email_from is the variable that gets the value, of the From: field that will appear in your received mail 
$email_from = "tnp11.nsitonline.in"; // Who the email is from 

 

//Here you define the subject of you message
$email_subject = "CRF-" . $row['cname']; // The Subject of the email 

//here you define the body of the message, the message itself
//you can modify the "post" textfield in sendmail.php to a textarea....
$email_message = ""; // Message that the email has in it 

//here you enter the e-mail address to wich you want the message to be sent
$email_to = "tapan.goyal05@gmail.com"; // Who the email is too 

//adds the e-mail address of the sender
$headers = "From: Placement@nsit.com"; 

$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
    
$headers .= "\nMIME-Version: 1.0\n" . 
            "Content-Type: multipart/mixed;\n" . 
            " boundary=\"{$mime_boundary}\""; 

$email_message .= "This is a multi-part message in MIME format.\n\n" . 
                "--{$mime_boundary}\n" . 
                "Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
               "Content-Transfer-Encoding: 7bit\n\n" . 
$email_message . "\n\n"; 



/********************************************** First File ********************************************/ 

$file = fopen($fileatt,'rb'); 
$data = fread($file,filesize($fileatt)); 
fclose($file); 


$data = chunk_split(base64_encode($data)); 

$email_message .= "--{$mime_boundary}\n" . 
                  "Content-Type: {$fileatt_type};\n" . 
                  " name=\"{$fileatt_name}\"\n" . 
                  //"Content-Disposition: attachment;\n" . 
                  //" filename=\"{$fileatt_name}\"\n" . 
                  "Content-Transfer-Encoding: base64\n\n" . 
                 $data . "\n\n" . 
                  "--{$mime_boundary}\n"; 
unset($data); 
unset($file); 
unset($fileatt);
unset($fileatt_type); 
unset($fileatt_name); 

/********************************************** End of File Config ********************************************/ 

// To add more files just copy the file section again, but make sure they are all one after the other! If they are not it will not work! 

$ok = @mail($email_to, $email_subject, $email_message, $headers); 
if($ok) { 
echo "<font face=verdana size=2>The file was successfully sent!</font>"; 
} else { 
die("Sorry but the email could not be sent. Please go back and try again!"); 
} 
?>
<p>&nbsp;</p>
</body>
</html>
