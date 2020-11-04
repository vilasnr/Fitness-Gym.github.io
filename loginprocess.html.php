<?php 
require_once('db_connect.php');
session_start();
    if(isset($_POST['r_login']))
    {
            $query="select * from trainerregister_tb where r_email='".$_POST['username']."' and r_password='".$_POST['Password']."'";
            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['UName'];
                header("location:wellcome.html");
            }
            else
            {
                header("location:index.php?Invalid= Please Enter Correct User Name and Password ");
            }
       }
    
    else
    {
        echo 'Not Working Now Guys';
    }

?>