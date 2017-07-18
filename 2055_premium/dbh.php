<?php

$conn = mysqli_connect("localhost", "root", "", "payalarmlogin");


$con1 = mysqli_connect("localhost", "root", "", "customerdata");

if (!$conn || !$con1){
	die("Connection failed: ".mysqli_connect_error()); //remove when uploading to website
}

function

?>
