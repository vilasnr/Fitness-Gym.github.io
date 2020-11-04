
<html>
<head>
<title></title>
</head>
<body>
<div class="main-class">
<h1>list of table</h1>
<div class="center-div">
<div class="table-responsive">
<table>
<thead>
<tr>
<th>r_login_id</th>
<th>r_name</th>
<th>r_email</th>
<th>r_password</th>
<th>r_contact</th>
<th>operation</th>
</tr>
</thead>
<tbody>
<?php
include 'db_connect.php';
$selectquery="select * from trainerregister_tb";
$query= mysqli_query($conn, $selectquery);
$nums= mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
	?>
	<tr>
<td><?php echo $res['r_login_id']; ?></td>
<td><?php echo $res['r_name']; ?></td>
<td><?php echo $res['r_email']; ?></td>
<td><?php echo $res['r_password'];?></td>
<td><?php echo $res['r_contact'];?></td>
<td><i class="fa fa-edit" aria-hidden="true"></i></td>
<td><i class="fa fa-trash" aria-hidden="true"></i></td>
</tr>
<?php	
}
?>

</tbody>
</table>
</div>
</div>

</div>
</body>
</html>
