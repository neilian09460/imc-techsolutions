<?php
require 'db.php';
session_start();

if(isset($_REQUEST["addToProduct"])){
    $p_id = $_REQUEST["product_id"];
    $user_id = $_SESSION["user_id"];
    $query = "SELECT * FROM `cart` WHERE product_id = '$p_id' and user_id = '$user_id'";
    $result = mysqli_query($con,$query);
    $count = mysqli_num_rows($result);
    if($count > 0 ){ 
        echo "<div class='alert alert-warning' style='width: 100%;'
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b>Product is already added in the cart!</b>
            </div>";
    } else {
        $query = "SELECT * FROM `product` WHERE product_id = '$p_id'";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
            $prod_id = $row['product_id'];
            $prod_name = $row['product_name'];
            $qty = $row['qty'];
            $price = $row['price'];
        $query1 = "INSERT INTO `cart` (`cart_id`, `product_id`, `product_name`, `user_id`, `qty`, `price`, `cart_time`) VALUES (NULL, '$prod_id', '$prod_name', '$user_id', '$qty', '$price', CURRENT_TIMESTAMP)";
        if(mysqli_query($con,$query1)){
        	echo "<div class='alert alert-success' style='width: 100%;'
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<b>Product is added in the cart!</b>
			</div>";
        }
    }
}


if(isset($_REQUEST["search"])){
    $keyword = $_POST["keyword"];
    $query = "SELECT * FROM `product` WHERE product_name LIKE '%$keyword%'";
}

?>		