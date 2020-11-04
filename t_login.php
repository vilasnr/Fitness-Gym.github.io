<?php 


$r_email = $_POST['r_email'];
$r_password = $_POST['r_password'];


// Create Connection
  $conn = new mysqli('localhost','root','','fit_gym', 3307);
  if($conn->connect_error) {
    die("connection failed");
   }
    else{

if(isset($_POST['r_email'])){
    
    $r_email=$_POST['r_email'];
    $r_password=$_POST['r_password'];
    
    $sql="select * from trainerregister_tb where r_email='".$r_email."'AND r_password='".$r_password."' limit 1";
    
    $result=mysql_query($sql);
    
    if(mysql_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
  }
}
?>