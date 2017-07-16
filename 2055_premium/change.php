<?php
session_start();	

include 'dbh.php';

if(isset($_POST['pass'])){
	$newPwd= $_POST['newPw'];

	$changePwd="UPDATE user SET pwd='$newPwd' WHERE id='$_SESSION[id]";
	$res1=mysqli_query($conn, $changePwd);
	
	if($	res1){
		echo "change password and email script here";
		//$page = "home.php";
	}	
}
	
//header("Location : $page");

?>