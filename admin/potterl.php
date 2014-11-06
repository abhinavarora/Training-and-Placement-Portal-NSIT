<?php
session_start();
$_SESSION['auth']=1;
//echo "<img source='../images/edit.jpg'>";
header("Location:index.php");
?>