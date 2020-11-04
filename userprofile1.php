<?php
include('db_connect.php');
session_start();
if($_SESSION['is_login']){
$m_email = $_SESSION['m_email'];
}else{

  echo "<script>location.href='login.html'</script>";
}
$sql = "SELECT m_address, m_name, m_contact, m_email  FROM memberregister_tb WHERE m_email = '$m_email'";
$result = $conn->query($sql);
if($result->num_rows == 1){
$row = $result->fetch_assoc();
$m_contact = $row['m_contact'];
$m_name = $row['m_name'];
$m_address = $row['m_address'];

}


if(isset($_REQUEST['nameupdate'])){
  if(($_REQUEST['m_contact'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
   $m_contact = $_REQUEST["m_contact"] ;
   $sql = "UPDATE memberregister_tb SET m_contact = '$m_contact' WHERE m_email = '$m_email'";
   if($conn->query($sql) == TRUE){
   // below msg display on form submit success
   $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
   } else {
   // below msg display on form submit failed
   $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
      }
    }
   }
?>


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">

 <link rel="stylesheet" href="css/bootstrap.min.css">

 
 <link rel="stylesheet" href="css/all.min.css">
 <link rel="stylesheet" href="css/font-awesome.min.css">
 <link rel="stylesheet" href="css/aos.css">
 <link rel="stylesheet" href="css/custom.css">

<title>fitness gym </title>    
</head>
<body>

<nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="userprofile.php">fitness gym</a></nav>


<div class="container-fluid" style="margin-top:40px;">
<div class="row">
<nav class="col-sm-2 bg-light sidebar py-5" > <!--start sidebar 1 column-->

<div class=sidebar-sticky>
<ul class="nav flex-column">
<li class="nav-item"><a class="nav-link" href="userprofile1.php"><i class="fas fa-user"></i>profile</a></li>
<li class="nav-item"><a class="nav-link" href="cpass1.php"><i class="fas fa-key"></i>change password</a></li>
<li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>logout</a></li>

</ul>
</div>
</nav><!--end sidebar 1 st column-->
<div class="col-sm-6 mt-5"><!--start profile area 2nd column-->
<form action="" method="POST" class="ms">
    <div class="form-group">
      <label for="m_email">Email</label>
      <input type="email" class="form-control" name="m_email" id="m_email" value="<?php echo $m_email ?>" readonly>
    </div>
    <div class="form-group">
      <label for="m_name">Name</label>
      <input type="text" class="form-control" name="m_name" id="m_name" value="<?php echo $m_name ?>" readonly>
    </div>
    <div class="form-group">
      <label for="m_contact">Contact</label>
      <input type="text" class="form-control" name="m_contact" id="m_contact" value="<?php echo $m_contact ?>" >
    </div>
    <div class="form-group">
      <label for="m_address">Address</label>
      <input type="text" class="form-control" name="m_address" id="m_address" value="<?php echo $m_address ?>" readonly>
    </div>
    
    <button type="submit" class="btn btn-danger" name="nameupdate">Update</button>
    <?php if(isset($passmsg)) {echo $passmsg; } ?>
    </form>

</div><!--end profile area 2nd column-->

</div>
</div>
     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/aos.min.js"></script>
     <script src="js/popper.min.js"></script>
     <script src="js/all.min.js"></script>



</body>
</html>    

     
    
    

