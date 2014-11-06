<?php session_start(); ?>
<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['name']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=index.php">';
die();} 

$cname=$_POST['cname'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
$contact=$_POST['contact'];
$fax=$_POST['fax'];
$website=$_POST['website'];
$hr_name=$_POST['hr_name'];
$hr_designation=$_POST['hr_designation'];
$mobile=$_POST['mobile'];
$landline=$_POST['landline'];
$email=$_POST['email'];
$head_name=$_POST['head_name'];
$head_mobile=$_POST['head_mobile'];
$head_landline=$_POST['head_landline'];
$head_email=$_POST['head_email'];
$job_desig=$_POST['job_desig'];
$job_describe=$_POST['job_describe'];
$place=$_POST['place'];
$date=$_POST['day'] . "/" . $_POST['month'] . "/" . $_POST['year'];
$hra=$_POST['hra'];
$gross=$_POST['gross'];
$othercompensation=$_POST['othercompensation'];
$takehome=$_POST['takehome'];
$cost=$_POST['cost'];
$details=$_POST['details'];
$mhra=$_POST['mhra'];
$mgross=$_POST['mgross'];
$mothercompensation=$_POST['mothercompensation'];
$mtakehome=$_POST['mtakehome'];
$mcost=$_POST['mcost'];
$mdetails=$_POST['mdetails'];
$ece=$_POST['ece'];
$cse=$_POST['cse'];
$it=$_POST['it'];
$ice=$_POST['ice'];
$mpae=$_POST['mpae'];
$bt=$_POST['bt'];
$sp=$_POST['sp'];
$infos=$_POST['infos'];
$pc=$_POST['pc'];
$ppt=$_POST['ppt'];
$percent=$_POST['percent'];
$resume_short=$_POST['resume_short'];
$test=$_POST['test'];
$testtype=$_POST['testtype'];
$gd=$_POST['gd'];
$ti=$_POST['ti'];
$hri=$_POST['hri'];
$others=$_POST['others'];
$bond=$_POST['bond'];
$bonddetails=$_POST['bonddetails'];
$result=$_POST['result'];
$days=$_POST['days'];
$executives=$_POST['executives'];
$rooms=$_POST['rooms'];
$otherinfra=$_POST['otherinfra'];


$status=1;

$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_trndpl",$con);
$name = $_SESSION['name'];


	  $sql="UPDATE companyprofile SET cname = '$cname', address = '$address', city = '$city', state = '$state', pincode = '$pincode', contact = '$contact', fax = '$fax', 
                website = '$website', hr_name = '$hr_name', hr_designation = '$hr_designation', mobile = '$mobile', landline = '$landline', 
		email = '$email', head_email = '$head_email', job_desig = '$job_desig', job_describe = '$job_describe', place = '$place', date = '$date', hra = '$hra', 
                gross = '$gross', head_name = '$head_name', head_mobile = '$head_mobile', head_landline = '$head_landline', 
		othercompensation = '$othercompensation', takehome = '$takehome', cost = '$cost', details = '$details', mhra = '$mhra', mothercompensation = '$mothercompensation',
		mgross= '$mgross', mtakehome = '$mtakehome', mcost = '$mcost', mdetails = '$mdetails',
		ece = '$ece', cse = '$cse', it = '$it', ice = '$ice', mpae = '$mpae', bt = '$bt', sp = '$sp', infos = '$infos', pc = '$pc', ppt = '$ppt',
		percent = '$percent', resume_short = '$resume_short', test = '$test', testtype = '$testtype',
		gd = '$gd', ti = '$ti', hri = '$hri', others = '$others', 
		bond = '$bond', bonddetails = '$bonddetails', result = '$result', days = '$days', executives = '$executives', rooms = '$rooms', otherinfra = '$otherinfra', loginstatus = '$status' 
  
	


WHERE username = '$name' ";

	if (!mysql_query($sql,$con))
	  { 
	   die('Error: ' . mysql_error());
	  }



  
       
  $to = 'tapan.goyal05@gmail.com';
  $from = 'tnp11.nsitonline.in';
  $subject = 'CRF-' . $cname . " " . 'details';
  $body = "Details are:\r\n
Name of the Firm: $cname\r\nPostal Address: $address\r\nCity: $city\r\nState: $state\r\nPin code: $pincode\r\nContact Number: $contact\r\nFax Number: $fax\r\nWebsite: $website\r\nHR Name: $hr_name\r\nHR Designation: $hr_designation\r\nHR Mobile: $mobile\r\nHR Landline: $landline\r\nHR Email Id: $email\r\nHead Name: $head_name\r\nHead Mobile: $head_mobile\r\nHead Landline: $head_landline\r\nHead Email ID: $head_email\r\nJob Designation: $job_desig\r\nJob Description: $job_describe\r\nPlace of Posting: $place\r\nTentative Joining Date: $date\r\nHRA: $hra\r\nGross: $gross\r\nOthers: $othercompensation\r\nTake Home: $takehome\r\nCost to Company: $cost\r\nAny further Details: $details\r\nHRA: $mhra\r\nGross: $mgross\r\nOthers: $mothercompensation\r\nTake Home: $mtakehome\r\nCost to Company: $mcost\r\nAny further Details: $mdetails\r\nElectronics and Communication Engineering: $ece\r\nComputer Engineering: $cse\r\nInformation Technology: $it\r\nInstrumentation & Control Engineering: $ice\r
Manufacturing Process & Automation Engineering: $mpae\r\nBiotechnology: $bt\r\nSignal Processing: $sp\r\nInformation Systems: $infos\r\nProcess ntrol: $pc\r\nPre Placement Talk: $ppt\r\nPercentage Criteria: $percent\r\nResume Shortlisiting: $resume_short\r\nWritten Test: $test\r\nType of Written Test: $testtype\r\nGroup Discussion: $gd\r\nTechnical Interview(s): $ti\r\nHR Interview: $hri\r\nOthers: $others\r\nBond or Service Contract: $bond\r\nDeatils of bond: $bonddetails\r\nExpected number of days required for declaration of result: $result\r\nNumber of Days required for recruitment: $days\r\nNumber of Executives visiting the campus: $executives\r\nNumber of rooms needed for conducting the interviews: $rooms\r\nOthers: $otherinfra";
 
  if(mail($to, $subject, $body, "From: $from"))
     {
        echo ' ';
          }
  else
     {
        die('ERROR: Mail delivery error');
      }

  $to = 'tapan.goyal@yahoo.co.in';
  $from = 'tnp11.nsitonline.in';
  $subject = 'CRF-' . $cname . " " . 'details';
  $body = "Details are:\r\n
Name of the Firm: $cname\r\nPostal Address: $address\r\nCity: $city\r\nState: $state\r\nPin code: $pincode\r\nContact Number: $contact\r\nFax Number: $fax\r\nWebsite: $website\r\nHR Name: $hr_name\r\nHR Designation: $hr_designation\r\nHR Mobile: $mobile\r\nHR Landline: $landline\r\nHR Email Id: $email\r\nHead Name: $head_name\r\nHead Mobile: $head_mobile\r\nHead Landline: $head_landline\r\nHead Email ID: $head_email\r\nJob Designation: $job_desig\r\nJob Description: $job_describe\r\nPlace of Posting: $place\r\nTentative Joining Date: $date\r\nHRA: $hra\r\nGross: $gross\r\nOthers: $othercompensation\r\nTake Home: $takehome\r\nCost to Company: $cost\r\nAny further Details: $details\r\nHRA: $mhra\r\nGross: $mgross\r\nOthers: $mothercompensation\r\nTake Home: $mtakehome\r\nCost to Company: $mcost\r\nAny further Details: $mdetails\r\nElectronics and Communication Engineering: $ece\r\nComputer Engineering: $cse\r\nInformation Technology: $it\r\nInstrumentation & Control Engineering: $ice\r
Manufacturing Process & Automation Engineering: $mpae\r\nBiotechnology: $bt\r\nSignal Processing: $sp\r\nInformation Systems: $infos\r\nProcess ntrol: $pc\r\nPre Placement Talk: $ppt\r\nPercentage Criteria: $percent\r\nResume Shortlisiting: $resume_short\r\nWritten Test: $test\r\nType of Written Test: $testtype\r\nGroup Discussion: $gd\r\nTechnical Interview(s): $ti\r\nHR Interview: $hri\r\nOthers: $others\r\nBond or Service Contract: $bond\r\nDeatils of bond: $bonddetails\r\nExpected number of days required for declaration of result: $result\r\nNumber of Days required for recruitment: $days\r\nNumber of Executives visiting the campus: $executives\r\nNumber of rooms needed for conducting the interviews: $rooms\r\nOthers: $otherinfra";
 
 mail($to, $subject, $body, "From: $from");
  

 $to = 'tnpcell@nsitonline.in';
 $from = 'tnp11.nsitonline.in';
 $subject = 'CRF-' . $cname . " " . 'details';
 $body = "Details are:\r\n
Name of the Firm: $cname\r\nPostal Address: $address\r\nCity: $city\r\nState: $state\r\nPin code: $pincode\r\nContact Number: $contact\r\nFax Number: $fax\r\nWebsite: $website\r\nHR Name: $hr_name\r\nHR Designation: $hr_designation\r\nHR Mobile: $mobile\r\nHR Landline: $landline\r\nHR Email Id: $email\r\nHead Name: $head_name\r\nHead Mobile: $head_mobile\r\nHead Landline: $head_landline\r\nHead Email ID: $head_email\r\nJob Designation: $job_desig\r\nJob Description: $job_describe\r\nPlace of Posting: $place\r\nTentative Joining Date: $date\r\nHRA: $hra\r\nGross: $gross\r\nOthers: $othercompensation\r\nTake Home: $takehome\r\nCost to Company: $cost\r\nAny further Details: $details\r\nHRA: $mhra\r\nGross: $mgross\r\nOthers: $mothercompensation\r\nTake Home: $mtakehome\r\nCost to Company: $mcost\r\nAny further Details: $mdetails\r\nElectronics and Communication Engineering: $ece\r\nComputer Engineering: $cse\r\nInformation Technology: $it\r\nInstrumentation & Control Engineering: $ice\r
Manufacturing Process & Automation Engineering: $mpae\r\nBiotechnology: $bt\r\nSignal Processing: $sp\r\nInformation Systems: $infos\r\nProcess ntrol: $pc\r\nPre Placement Talk: $ppt\r\nPercentage Criteria: $percent\r\nResume Shortlisiting: $resume_short\r\nWritten Test: $test\r\nType of Written Test: $testtype\r\nGroup Discussion: $gd\r\nTechnical Interview(s): $ti\r\nHR Interview: $hri\r\nOthers: $others\r\nBond or Service Contract: $bond\r\nDeatils of bond: $bonddetails\r\nExpected number of days required for declaration of result: $result\r\nNumber of Days required for recruitment: $days\r\nNumber of Executives visiting the campus: $executives\r\nNumber of rooms needed for conducting the interviews: $rooms\r\nOthers: $otherinfra";

// mail($to, $subject, $body, "From: $from");
                
	  echo "<p>YOUR COMPANY PROFILE WAS SUCCESSFULLY UPDATED</p>" ;
			echo '<meta http-equiv="Refresh" content="2;
			URL=http://tnp11.nsitonline.in/companyview.php">';








 mysql_close($con);
?>

