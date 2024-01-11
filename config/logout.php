<?php   
session_start(); //to ensure you are using same session

$_SESSION['username']='';

unset($_SESSION['username']);

session_unset();
session_destroy();
header('Location:login.php');

?>