<?php
require 'db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="css/style.css" rel="stylesheet" id="theme-stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.css" rel="stylesheet">

	<!-- jQuery library -->
	<script src="js/jquery-3.1.1.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	
	<?php
    if(!isset($_SESSION['email'])){
        header("Location: index.php");
    }
    ?>
    <?php
        $query = "SELECT * FROM `user_info` WHERE email = '".$_SESSION['email']."'";
        $result = mysqli_query($con,$query) or die($query->error);
        $row = $result->fetch_assoc()
    ?>
	<div id="header">
		<div class="text-right" style="margin-right: 50px; padding-top: 15px; font-size: 1.3em;">
			<a href="user-profile.php"><i class="fa fa-user" style="color: white;"></i><span class="hidden-xs text-uppercase" style="color: white;"> <?php echo $row['first_name']; ?></span></a>
			<a href="logout-user.php" style="margin-left: 30px; color: white;">Logout</a>
		</div>
		
		<!-- <div class="text-right" id="logout"><a href="logout-user.php">Logout</a></div> -->
	</div>

	<div id="container">
		<div class="sidebar">
			<ul id="nav">
				<li><a class="selected" href="admin-dashboard.php">History</a></li>
				<li><a href="admin-product-list.php">Products List</a></li>
				<li><a href="#">User List</a></li>
				<li><a href="admin-product-add.php">Add new products</a></li>
			</ul>
		</div>
		<div class="content">
			<table class="table table-striped">
				<h2 class="text-left">User Lists</h2>
				<thead>
					<tr>
						<th width="100">User ID </th>
						<th width="200">First Name </th>
						<th width="200">Last Name </th>
						<th width="300">Email </th>
						<th width="200">Password </th>
						<th width="100">Action </th>
					</tr>
				</thead>

				<?php
				$query = $con->query("SELECT * FROM `user_info` ");
				while($row = $query->fetch_assoc()){	
				?>	

				<tbody>
					<tr>
						<th><?php echo $row['user_id']?></th>
						<th><?php echo $row['first_name']?></th>
						<th><?php echo $row['last_name']?></th>
						<th><?php echo $row['email']?></th>
						<th><?php echo $row['password']?></th>
						<th><a onclick="return confirm('Do you want to delete this data?')" href="admin-user-delete.php?user-id=<?php echo $row['user_id']?>" value="<?php echo $row['user_id']?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a></th>
					</tr>
				</tbody>
				<?php } ?>
			</table>
		</div>
	</div>

</body>
</html>