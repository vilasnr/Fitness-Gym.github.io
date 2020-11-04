<?php
$con=mysqli_connect("localhost","root","","fit_gym",3307);
session_start();
if(!isset($_SESSION['is_login'])){
if(isset($_POST['m_login'])){
	$m_email=$_POST['m_email'];
	$m_password=$_POST['m_password'];
	$query="select * from memberregister_tb where m_email='$m_email' and m_password='$m_password'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['is_login'] = true;
        $_SESSION['m_email'] = $m_email;
		header("Location:userprofile1.php");
	
}
	else
    {
        echo "<script>alert(' username /password is not match')</script>";
        echo "<script>window.open('login.html','_self')</script>";
    }
	}
}else{
	echo "<script> location.href='userprofile1.php'; </script>";
}

?>