<?php
session_start();

include "koneksi.php";

$username = $_POST["username"];
$p = md5($_POST["password"]);

$sql = "select * from users where username='".$username."' and password='".$p;
$hasil = mysqli_query ($kon,$sql);
$jumlah = mysqli_num_rows($hasil);


	if ($jumlah>0) {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["id"]=$row["id"];
		$_SESSION["username"]=$row["username"];
		$_SESSION["name"]=$row["name"];
		
	

		header("Location:index.php");
		
	}else {
		alert("Username atau password yang Anda masukkan salah!");
      return false;
	}
?>