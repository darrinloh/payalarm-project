<?php
if(isset($_SESSION["temp"])){
	if($_SESSION["temp"] == "error1"){
		echo"<script>alert('Username is already taken')</script>";
	}
	elseif($_SESSION["temp"] == "error2"){
		echo"<script>alert('Username or Password not long enough')</script>";
	}
	elseif($_SESSION["temp"] == "error3"){
		echo"<script>alert('Username must contain letters and password cannot contain special characters')</script>";			
	}
	elseif($_SESSION["temp"] == "error4"){
		echo"<script>alert('Password and Confirm Password do not match')</script>";			
	}



	$_SESSION["temp"]="";			//reset temp variable	
}

	?>