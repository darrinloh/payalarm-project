<?php
	session_start();
	include 'dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$confirm = $_POST['password'];


$sql = "INSERT INTO user (uid, pwd) VALUES ('$uid','$pwd')";

$result = mysqli_query($conn,$sql);

$con1 =mysql_connect("localhost","root","");

mysql_select_db("customerdata",$con1);

$hey = "CREATE TABLE $uid (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(50) NOT NULL,
amount INT NOT NULL,
email VARCHAR(50) NOT NULL,
contact INT(20) UNSIGNED,
due_date VARCHAR(15),
remarks VARCHAR(50)
)";
$res1=mysql_query($hey,$con1);


header("Location: index.php");


