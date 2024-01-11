<?php   
session_start(); //to ensure you are using same session
var_dump($_SESSION);
// unset($_SESSION['username']);
// $_SESSION['username']='';

// session_unset();
// session_destroy();
// header('Location:login.php');

?>