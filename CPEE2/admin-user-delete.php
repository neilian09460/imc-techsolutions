<?php
	require ('db.php');
	$query = "SELECT * FROM user_info ORDER BY user_id ASC";
	$result = mysqli_query($con,$query);

	$id = $_GET['user-id'];
	$result = mysqli_query($con, "DELETE FROM user_info WHERE user_id=$id");
	header('Location: admin-user-list.php');
?>