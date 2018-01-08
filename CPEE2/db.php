<?php
$con = new mysqli('localhost','id4168532_imc','123456','id4168532_siscom');
if($con->connect_errno){
	echo "Connection failed " . $con->connect_error;
} else {
	//echo "Connected Successfully";
}
?>