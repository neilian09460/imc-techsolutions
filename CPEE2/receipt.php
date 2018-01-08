<?php
require('fpdf181/fpdf.php');
include ('db.php');
session_start();

if(isset($_POST['checkout'])){
	 $name = $_SESSION['first_name'];
        $user_id = $_SESSION['user_id'];
        $curr_time = 'CURRENT_TIMESTAMP';
        $new_order = "INSERT INTO `transaction`(`transaction_id`, `user_id`, `first_name`,`transaction_time`) 
                     VALUES (NULL,'$user_id','$name',$curr_time)";
        $new_order_query = mysqli_query($con,$new_order);

        $select_order_id = "SELECT `transaction_id` FROM `transaction` WHERE `user_id`='$user_id'  AND `transaction_time` = $curr_time";
        $select_order_id_query = mysqli_query($con,$select_order_id);
        $row = mysqli_fetch_assoc($select_order_id_query);
        $order_id = $row['transaction_id'];
        $_SESSION['transaction_id'] = $order_id;
        $first_name = $_SESSION['first_name'];
        $query = "SELECT * FROM cart WHERE user_id = '$user_id'"; 
        $result = mysqli_query($con,$query);
        $row = mysqli_num_rows($result);

        for($i = 0; $i < $row; $i++){
            $rows = $result->fetch_assoc();
            $query = "INSERT INTO `transaction_details`(`details_id`, `transaction_id`,`first_name`, `product_id`, `product_name`, `qty`, `price`, `user_id`, `timestamp`) VALUES (NULL,'$order_id','$first_name','".$rows['product_id']."','".$rows['product_name']."','".$rows['qty']."','".$rows['price']."',
                    '".$rows['user_id']."',$curr_time)";

            $res = mysqli_query($con,$query);
        }

        $query = "DELETE FROM cart WHERE user_id='$user_id'";
        $result = mysqli_query($con,$query);

	if(!isset($_SESSION['email'])){
	header("Location: index.php");
	} else {
		$email = $_SESSION['email'];
		$user_id = $_SESSION['user_id'];
		$query = "SELECT * FROM `user_info` WHERE user_id='$user_id'";
		$user_query = mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($user_query);
		$name = $row['first_name'];
		$transno = $_SESSION['transaction_id'];
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$date = date('m/d/Y');

	$pdf = new FPDF('P','mm','A4');

	$pdf->AddPage();
	$pdf->Image('img/icon-1.jpg',10,10,35,0,'JPG');


	$pdf->SetFont('Arial','B',14);//company name
	$pdf->Cell(130 ,0,' ',0,0);
	$pdf->Cell(59 ,10,'Transaction ID: ' .$transno,0,1);
	$pdf->Cell(130 ,0,' ',0,0);
	$pdf->Cell(59 ,10,'User Name: ' .$name,0,1);

	$pdf->SetFont('Times','B',30);//company name
	$pdf->Cell(34,0,' ',0,0);
	$pdf->Cell(60 ,5,'TechSolutions',0,0);

	$pdf->SetFont('Arial','B',14);//company name
	$pdf->Cell(36 ,0,' ',0,0);
	$pdf->Cell(59 ,10,'Date: ' .$date,0,1);
	$pdf->Cell(59 ,0,'
		_________________________________________________
		__________________'	,0,1);

	$pdf->SetFont('Arial','B',12);//content
	$pdf->Cell(59 ,5,' '	,0,1);
	$pdf->Cell(80 ,10,'Products',0,0);
	$pdf->Cell(75 ,10,' '	,0,0);
	$pdf->Cell(60 ,10,'Amount',0,1);
	$transaction_id =  $_SESSION['transaction_id'];
	$query = "SELECT * FROM `transaction_details` WHERE `transaction_id` = '$transaction_id' and `user_id` = '$user_id'";
	$rows = mysqli_query($con,$query);
	$a = 50;
	$total = 0;
	if(mysqli_num_rows($rows) > 0){
		while($row1 = mysqli_fetch_array($rows)){
			$pdf->SetY($a);
			$pdf->SetX(10);
			$pdf->Cell(87 ,15,$row1['product_name']);
			$pdf->Cell(73 ,15);
			$pdf->Cell(60 ,15,$row1['price']);
			$price = $row1['price'];
			$a+=8;
			$total += $price;
		}
	}	

	$pdf->Cell(59 ,100,''	,0,1);
	$pdf->Cell(59 ,5,'_______________________________________________________________________________'	,0,1);
	$pdf->Cell(140 ,5,' '	,0,0);
	$pdf->Cell(64 ,5,'Total:' .$total,0,1);


	$pdf->Output();

	}

}

        
?>
