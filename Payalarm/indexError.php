<?php
if(isset($_SESSION["temp"])){
	if($_SESSION["temp"] == "error0"){
		echo "<script>alert('Your sign up was successful!')</script>";
	}
	elseif($_SESSION["temp"] == "error1"){
		$msg="Incorrect Username or Password";
		//echo"$msg";
	}
	
	unset($_SESSION["temp"]);
	
	
}