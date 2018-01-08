<?php
	require ('db.php');
	$query = "SELECT * FROM product ORDER BY product_id ASC";
	$result = mysqli_query($con,$query);

	$id = $_GET['prod-id'];
	$result = mysqli_query($con, "DELETE FROM product WHERE product_id=$id");
	header('Location: admin-product-list.php');
?>