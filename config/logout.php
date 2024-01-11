<?php
session_start();

$_SESSION['id']='';
$_SESSION['username']='';
$_SESSION['name']='';


unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['name']);

session_unset();
session_destroy();
header('Location:../login.php');

?>