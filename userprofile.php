<?php
include('db_connect.php');
session_start();
if($_SESSION['is_login']){
$r_email = $_SESSION['r_email'];
}else{

  echo "<script>location.href='trainerlogin.html'</script>";
}
$sql = "SELECT r_address, r_name, r_contact, r_email FROM trainerregister_tb WHERE r_email = '$r_email'";
$result = $conn->query($sql);
if($result->num_rows == 1){
$row = $result->fetch_assoc();
$r_contact = $row['r_contact'];
$r_name = $row['r_name'];
$r_address = $row['r_address'];
}


if(isset($_REQUEST['nameupdate'])){
  if(($_REQUEST['r_contact'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
   $r_contact = $_REQUEST["r_contact"] ;
   $sql = "UPDATE trainerregister_tb SET r_contact = '$r_contact' WHERE r_email = '$r_email'";
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
<li class="nav-item"><a class="nav-link" href="userprofile.php"><i class="fas fa-user"></i>profile</a></li>
<li class="nav-item"><a class="nav-link" href="cpass.php"><i class="fas fa-key"></i>change password</a></li>
<li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>logout</a></li>

</ul>
</div>
</nav><!--end sidebar 1 st column-->
<div class="col-sm-6 mt-5"><!--start profile area 2nd column-->
<form action="" method="POST" class="ms">
    <div class="form-group">
      <label for="r_email">Email</label>
      <input type="email" class="form-control" name="r_email" id="r_email" value="<?php echo $r_email ?>" readonly>
    </div>
    <div class="form-group">
      <label for="r_name">Name</label>
      <input type="text" class="form-control" name="r_name" id="r_name" value="<?php echo $r_name ?>"  readonly>
    </div>
    <div class="form-group">
      <label for="r_contact">contact</label>
      <input type="tel" class="form-control" name="r_contact" id="r_contact" value="<?php echo $r_contact ?>" >
    </div>
    <div class="form-group">
      <label for="r_address">Address</label>
      <input type="text" class="form-control" name="r_address" id="r_address" value="<?php echo $r_address ?>" readonly>
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