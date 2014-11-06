<?php
session_start();
		if($_SESSION['auth']!=1)
			 header("Location:admin/index.php");?>
<?php

if (!isset($_GET['c']))
{
echo '<meta http-equiv="Refresh" content="0;URL=../index.php">';
die();
}
$company=$_GET['c'];
function recursiveDelete($str){
        if(is_file($str)){
            return @unlink($str);
        }
        elseif(is_dir($str)){
            $scan = glob(rtrim($str,'/').'/*');
            foreach($scan as $index=>$path){
                recursiveDelete($path);
            }
            return @rmdir($str);
        }
    }
	$path='../company_applications/'.$company;
if(recursiveDelete($path))
{
echo '<script type="text/javascript">alert("Data for '.$company .'has been cleared from the server!");</script>';

	echo '<meta http-equiv="Refresh" content="0;

	URL=registrations.php">';

	die();

}
?>