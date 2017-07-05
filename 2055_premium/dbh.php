<?php

$conn = mysqli_connect("localhost", "root", "", "payalarmlogin");



if (!$conn){
	die("Connection failed: ".mysqli_connect_error()); //remove when uploading to website
}



?>
