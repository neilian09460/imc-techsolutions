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
        $row = $result->fetch_assoc();
    ?>
	<div id="header" style="margin-top: 0px; ">
		<div class="text-right" style="margin-right: 50px; padding-top: 15px; font-size: 1.3em;">
			<a href="user-profile.php"><i class="fa fa-user" style="color: white;"></i><span class="hidden-xs text-uppercase" style="color: white;"> <?php echo $row['first_name']; ?></span></a>
			<a href="logout-user.php" style="margin-left: 30px; color: white;">Logout</a>
		</div>
		<!-- <div class="text-right" id="logout"><a href="logout-user.php">Logout</a></div> -->
	</div>

	<div id="container">
		<div class="sidebar">
			<ul id="nav">
				<li><a  href="admin-dashboard.php">History</a></li>
				<li><a href="admin-product-list.php">Products List</a></li>
				<li><a href="admin-user-list.php">User List</a></li>
				<li><a class="selected" href="#">Add new products</a></li>
			</ul>
		</div>

		<?php
            // If form submitted, insert values into the database.
            if(isset($_POST['submit'])){
            	$cate = $_POST['category'];
                $pname = $_POST['product_name'];
                $pdesc = $_POST['product_desc'];
                $pprice = $_POST['product_price'];
                $pqty = $_POST['product_qty'];

                $filetmp = $_FILES["product_img"]["tmp_name"];
				$filename = $_FILES["product_img"]["name"];
				$filetype = $_FILES["product_img"]["type"];
				$filepath = "img/".$filename;

				move_uploaded_file($filetmp,$filepath);

                $query = "INSERT INTO `product` (category, product_name, product_desc, price, qty,product_img) VALUES ('$cate', '$pname', '$pdesc', '$pprice', '$pqty','$filename')";
                $result = mysqli_query($con,$query);

	        	if($result){
	                    echo "<div class='alert alert-success' id='success-alert' style='text-align: left; width: 100%; margin-left:250px; position:absolute;margin-top:80px;'>New product has been registered.</div>";
	                } else {
	                    echo "<div class='alert alert-danger' style='text-align: center; width: (100% - 250px); margin-left: 250px;'>Unable to register new product.</div>";
	                }
	            }                               
	        ?>
                

        <div class="content">
        	<table class="table table-striped">
        		<thead>
        			<tr>
        				<th><h2 class="text-left">New Product</h2><br /></th>
        			</tr>
        		</thead>
        	</table>

        	
        	
        	<form action="" method="POST" enctype="multipart/form-data">
        		<div class="text-left">
        			<div class="form-group" style="width: 200px;">
        				<label for="category">Category : </label>
        				<select class="form-control" id="category" name="category">
        					<option value="1">
				            	Mobile Application
				            </option>
				            <option value="2">
				                Computer Application
				            </option>
				            <option value="3">
				            	Drivers Utilities
				            </option value="4">
				            <option>
				            	Installers
				            </option>
				            <option value="5">
				            	Development Tutorials
				            </option>
				            <option value="6">
				            	Design Tutorials
				            </option>
        				</select>
        			</div>

        			<div class="form-group">
        				<label for="product_name">Product Name</label>
        				<input type="text" class="form-control" id="product_name" name="product_name" required>
        			</div>

        			<div class="form-group">
						<label for="product_desc">Product Description</label>
						<input type="text" class="form-control" id="product_desc" name="product_desc" required>
					</div>

					<div class="form-group">
						<label for="product_price">Price</label>
						<input type="text" class="form-control" id="product_price" name="product_price" required>
					</div>

					<div class="form-group">
						<label for="product_img">Product Image</label>
						<input type="file" class="form-control" id="product_img" name="product_img" required>
					</div>

					<button type="submit" name="submit" class="btn btn-default" style="border: 2px solid;">Submit</button>

        		</div>
        		
        	</form>
        </div>



	</div>

</body>
</html>