<?php
	session_start();
	include 'dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$confirm = $_POST['password'];

//NEWWWWWWWWWWWWW CHECKING IF PASSWORD AND CONFIRM PASSWORD SAME
if(!$pwd == $confirm){
	echo "<script type='text/javascript'>alert('Passwords do not match!')</script>";
	header("Location : signup.php");
}


echo $uid."<br>";
echo $pwd."<br>";

$sql = "INSERT INTO user (uid, pwd) VALUES ('$uid','$pwd')";

$result = mysqli_query($conn,$sql);

$sql1 = "CREATE TABLE customerdata1(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(30) NOT NULL,
Amount INT(6) NOT NULL,
Due Date datetime NOT NULL)";

$conn1 = mysqli_connect("localhost","root","","");
$result1 = mysqli_query($conn1,$sql1);




header("Location: index.php");


