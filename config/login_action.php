<?php

$error=''; 

include "koneksi.php";
if(isset($_POST['submit']))
{               
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $level      = $_POST['level'];
                    
    $query = mysqli_query($connection, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($query) == 0)
    {
        $error = "Username or Password is invalid";
    }
    else
    {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['username']=$row['username'];
        $_SESSION['level'] = $row['level'];
        
        if($row['level'] == "Administrator" && $level=="1")
        {
            
            header("Location: ../index.php");
        }
        // else if($row['level'] =="Dosen" && $level=="2")
        // {
        //     header("Location: hallecturer.php");
        // }
        // else if($row['level'] == "Mahasiswa" && $level=="3")
        // {
            
        //     header("Location: halstudent.php");
        // }
        // else
        // {
        //     $error = "Failed Login";
        // }
    }
}
            
?>