<?php session_start(); ?>
<?php if (!isset($_SESSION['username']) || !isset($_SESSION['fname']) || !isset($_SESSION['login']) || $_SESSION['login']!=1)
header("Location:index.php");
if (!isset($_GET['cont']))
header("Location:index.php");
?>
<?
$fullpath="admin/".$_GET['cont'];
header('Content-disposition: attachment; filename='.$fullpath);
header('Content-type: application/octet-stream');
readfile($fullpath);
?>