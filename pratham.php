<?php
$con=mysqli_connect("localhost","root","","fit_gym",3307);
session_start();
if(!isset($_SESSION['is_login'])){
if(isset($_POST['r_login'])){
	$r_email=$_POST['r_email'];
	$r_password=$_POST['r_password'];
	$query="select * from trainerregister_tb where r_email='$r_email' and r_password='$r_password'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
        $_SESSION['is_login'] = true;
        $_SESSION['r_email'] = $r_email;
		header("Location:userprofile.php");
	
}
	else
    {
        echo "<script>alert(' username /password is not match')</script>";
        echo "<script>window.open('trainerlogin.html','_self')</script>";
    }
	}
}else{
	echo "<script> location.href='userprofile.php'; </script>";
}

?>