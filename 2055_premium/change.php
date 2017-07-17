<?php
session_start();	

include 'dbh.php';

if(isset($_POST['pass'])){
	$newPwd= $_POST['newPw'];
	$hid=$_SESSION['id'];
	$changePwd="UPDATE user SET pwd='$newPwd' WHERE id='$hid'";
	$res1=mysqli_query($conn, $changePwd);
	
	if($res1){
		$_SESSION['temp']="pass";							
		$page = "home.php";
	}	
}

elseif(isset($_POST['delete'])){
	$hid = $_POST['hid'];
	
	
	$nameOfUser = "SELECT uid FROM user WHERE id=$hid";
	$nameQuery = mysqli_query($conn,$nameOfUser);
	$row = mysqli_fetch_assoc($nameQuery);
	$name = $row["uid"];
	
	$delData ="DROP TABLE $name";
	$delQuery1=mysqli_query($con1,$delData);
	if($delQuery1){
	
	}
	
	
	$delUser="DELETE FROM user WHERE id=$hid";
	$delQuery = mysqli_query($conn,$delUser);
	if($delQuery){
		
		unset($_SESSION["temp"]);
		session_destroy();
		
	}
}
	
header("Location:home.php");

?>