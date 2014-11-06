<?php session_start(); ?>
<title>Testing</title>
<?php
if (!isset($_GET['r']))
{
echo '<meta http-equiv="Refresh" content="0;
URL=index.php">';
die();
} 
$_SESSION['login']=1;
$_SESSION['username']=$_GET['r'];
$_SESSION['fname']="Tester";
echo '<meta http-equiv="Refresh" content="0;
URL=home.php">';
die();
?>