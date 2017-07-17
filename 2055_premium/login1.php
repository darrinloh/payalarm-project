<?php
session_start();
include 'dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd'";
$result = mysqli_query($conn,$sql);

if(!$row=mysqli_fetch_assoc($result)){
	$_SESSION["temp"]="error1";
	header("location:index.php");
	exit;
}
else{
	$_SESSION['id']=$row['id'];
	header("Location:home.php");
}




