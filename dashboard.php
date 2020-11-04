<?php
include('db_connect.php');
session_start();
if($_SESSION['is_adminlogin']){
$a_user = $_SESSION['a_user'];
}else{

  echo "<script>location.href='admin.html'</script>";
}
$sql = "SELECT  a_pass, a_user FROM admin_tb WHERE a_user = '$a_user'";
$result = $conn->query($sql);
if($result->num_rows == 1){
$row = $result->fetch_assoc();
$a_pass = $row['a_pass'];

}


if(isset($_REQUEST['nameupdate'])){
  if(($_REQUEST['a_pass'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
   $a_pass = $_REQUEST["a_pass"] ;
   $sql = "UPDATE admin_tb SET a_pass = '$a_pass' WHERE a_user = '$a_user'";
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
<li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-user"></i>Admin profile</a></li>
<li class="nav-item"><a class="nav-link" href="memberinfo.php"><i class="fas fa-key"></i>Member Information</a></li>
<li class="nav-item"><a class="nav-link" href="trainerinfo.php"><i class="fas fa-key"></i>Trainer Information</a></li>
<li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>logout</a></li>

</ul>
</div>
</nav><!--end sidebar 1 st column-->
<div class="col-sm-6 mt-5"><!--start profile area 2nd column-->
<form action="" method="POST" class="ms">
    <div class="form-group">
      <label for="a_user">Username</label>
      <input type="text" class="form-control" name="a_user" id="a_user" value="<?php echo $a_user ?>" readonly>
    </div>
    <div class="form-group">
      <label for="a_pass">Password</label>
      <input type="password" class="form-control" name="a_pass" id="a_pass" value="<?php echo $a_pass ?>" >
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