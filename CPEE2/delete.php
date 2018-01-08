<?php
	require ('db.php');
	$query = "SELECT * FROM cart ORDER BY cart_time";
	$result = mysqli_query($con,$query);

	$id = $_GET['cart-id'];
	$result = mysqli_query($con, "DELETE FROM cart WHERE cart_id=$id");
	header('Location: cart.php');
?>