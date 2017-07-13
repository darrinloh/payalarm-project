<?php
session_start();
include 'dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd'";
$result = mysqli_query($conn,$sql);

if(!$row=mysqli_fetch_assoc($result)){
	header("location:index.php?msg=failed");
}
else{
	$_SESSION['id']=$row['id'];
	header("Location:home.php");
}




