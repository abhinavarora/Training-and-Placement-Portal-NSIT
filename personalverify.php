<?php session_start(); ?>
<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
{
echo "User Authentication Required";
echo '<meta http-equiv="Refresh" content="2;
URL=http://tnp11.nsitonline.in">';
die();} 
$gender=$_POST['gender'];
$dob=$_POST['sday'] . "/" . $_POST['smonth'] . "/" . $_POST['syear'];


$presnt_add=$_POST['presnt_add'];
$perm_add=$_POST['perm_add'];
$father_name=$_POST['father_name'];
$father_occ=$_POST['father_occ'];
$mother_name=$_POST['mother_name'];
$mother_occ=$_POST['mother_occ'];
$father_cntct=$_POST['father_cntct'];

$intern_comp=$_POST['intern_comp'];
$intern_title=$_POST['intern_title'];
$extra_co=$_POST['extra_co'];


$con = mysql_connect("localhost","nsitonli_potter","Rj9868045066");
				 if(!$con)
				 {
				  die('Could not connect: ' . mysql_error());
				 }
	  mysql_select_db("nsitonli_trndpl",$con);
$username = $_SESSION['username'];


	  $sql="UPDATE student SET  gender = '$gender', dob = '$dob', presnt_add = '$presnt_add', perm_add = '$perm_add', 
                father_name = '$father_name', father_occ = '$father_occ', mother_name = '$mother_name', mother_occ = '$mother_occ', father_cntct = '$father_cntct', intern_comp = '$intern_comp', intern_title = '$intern_title', extra_co = '$extra_co' WHERE rollnum = '$username' ";

	if (!mysql_query($sql,$con))
	  { 
	   die('Error: ' . mysql_error());
	  }
               
	  echo '<script type="text/javascript">alert("Your Profile has been Successfully Updated!!");</script>';
			echo '<meta http-equiv="Refresh" content="0;
			URL=student.php">';


 mysql_close($con);
?>

