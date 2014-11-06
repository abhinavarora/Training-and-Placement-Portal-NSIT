<?php
session_start();
		if($_SESSION['auth']!=1)
			 header("Location:index.php");?>
<?php

if (!isset($_GET['c']))
{
echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
die();
}
$company=$_GET['c'];
$zip = new ZipArchive();
if ($zip->open($company.".zip", ZIPARCHIVE::CREATE) !== TRUE) {
die ("Could not open archive. Contact Webmaster.");
}
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("../company_applications/".$company."/"));
foreach ($iterator as $key=>$value) {
$zip->addFile(realpath($key), $key) or die ("ERROR: Could not add file: $key <br />COntact Webmaster!");
}
$zip->close();

Header ("Content-disposition: attachment; filename=".$company.".zip");
Header("Content-type: application/octet-stream");
readfile($company.".zip");
header("Pragma: no-cache");
header("Expires: 0");
unlink($company.".zip");
?>