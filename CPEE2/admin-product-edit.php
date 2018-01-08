<?php
	require 'db.php';
	session_start();

    if(!isset($_SESSION['email'])){
        header("Location: index.php");
    }
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
            $query = "SELECT * FROM `user_info` WHERE user_id = '".$_SESSION['user_id']."'";
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
				<li><a href="admin-user-list.php">User List</a></li>
				<li><a href="admin-product-add.php">Add new products</a></li>
			</ul>
		</div>

		<?php
            // If form submitted, insert values into the database.
            if(isset($_GET['prod-id'])){

            	$prod_id = $_GET['prod-id'];

                $query = "SELECT * FROM product WHERE product_id = '$prod_id'";
                $result = mysqli_query($con,$query) or die($query->error);

                $row = $result->fetch_assoc();
            }

            if(isset($_POST['submit'])){
                $pname = $_POST['product_name'];
                $pdesc = $_POST['product_desc'];
                $pprice = $_POST['product_price'];

                $filetmp = $_FILES["product_img"]["tmp_name"];
				$filename = $_FILES["product_img"]["name"];
				$filetype = $_FILES["product_img"]["type"];
				$filepath = "img/".$filename;

				move_uploaded_file($filetmp,$filepath);

                $query = "UPDATE product SET product_name = '$pname', product_desc = '$pdesc', price = '$pprice', product_img = '$filename' WHERE product_id = '$prod_id'";
                $result = mysqli_query($con,$query) or die($query->error);

                if($result){
                    echo "<div class='alert alert-success' id='success-alert' style='text-align: left; width: 100%; margin-left:250px; position:absolute;margin-top:80px;'>Product has been update.</div>";
                } else {
                    echo "<div class='alert alert-danger' style='text-align: center; width: (100% - 250px); margin-left: 250px;'>Product update failed.</div>";
                }
            }                              
        ?>

		<div class="content">
			<h2 class="text-left">Update product</h2>
			<form action="#" method="post" enctype="multipart/form-data">
				<div class="form-group text-left" >
					<label for="product_name">Product Name</label>
					<input type="text" class="form-control" id="product_name" value="<?php echo $row['product_name']?>" name="product_name" required>
				</div>
				<div class="form-group text-left">
					<label for="product_desc">Product Description</label>
					<input type="text" class="form-control" id="product_desc" value="<?php echo $row['product_desc']?>" name="product_desc" required>
				</div>
				<div class="form-group text-left">
					<label for="product_price">Price</label>
					<input type="text" class="form-control" id="product_price" value="<?php echo $row['price']?>" name="product_price" required>
				</div>
				<div class="form-group text-left">
					<label for="product_img">Product Image</label>
					<input type="file" class="form-control" id="product_img" name="product_img">
				</div>
  				<button type="submit" name="submit" class="btn btn-danger">Update</button>
  				<button type="submit" name="back" class="btn btn-info"><a href="admin-product-list.php">Back</button>
			</form>
		</div>
	</div>

</body>
</html>