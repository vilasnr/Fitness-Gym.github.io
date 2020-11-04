<?php
$con=mysqli_connect("localhost","root","","fit_gym",3307);
session_start();
if(!isset($_SESSION['is_adminlogin'])){
if(isset($_POST['a_login'])){
	$a_user=$_POST['a_user'];
	$a_pass=$_POST['a_pass'];
	$query="select * from admin_tb where a_user='$a_user' and a_pass='$a_pass'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
        $_SESSION['is_adminlogin'] = true;
        $_SESSION['a_user'] = $a_user;
		header("Location:dashboard.php");
	
}
	else
    {
        echo "<script>alert(' username /password is not match')</script>";
        echo "<script>window.open('admin.html','_self')</script>";
    }
	}
}else{
	echo "<script> location.href='dashboard.php'; </script>";
}

?>