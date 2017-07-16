<?php
	session_start();
	include 'dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$confirm = $_POST['password'];

$checkUser = "SELECT uid FROM user";
$checkRes = mysqli_query($conn, $checkUser);
$error =0;
	if(mysqli_num_rows($checkRes)>0){
		while($row = mysqli_fetch_assoc($checkRes)){
		if($row["uid"] == $uid){
		$error =1;
			}
		}
	}
	//$specialChar="`~!@#$%^&*(){}[]-_+=\|?/<>,.';:";
	
	if($error==1){
	echo"<script>alert('Username is already taken');
	window.location.href='signup.php'</script>";
}
	elseif(strlen(trim($uid)) <1 || strlen($pwd) <6){
		$error=2;
	}
	elseif(is_numeric($uid)){
		$error=3;
	}
	elseif(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pwd)){
		$error=3;
	}
	

if($error==2){
	echo"<script>alert('Username or Password not long enough');
	window.location.href='signup.php'</script>";
	
	
}
elseif($error==3){
	echo"<script>alert('Username must contain letters and password cannot contain special characters'); 
	window.location.href='signup.php'</script>";
	
	
}
elseif($pwd != $confirm){
	echo"<script>alert('Password and Confirm Password are not the same');
	window.location.href='signup.php'</script>";
}

elseif($error==0){
$sql = "INSERT INTO user (uid, pwd) VALUES ('$uid','$pwd')";

$result = mysqli_query($conn,$sql);

$con1 =mysql_connect("localhost","root","");

mysql_select_db("customerdata",$con1);

$createTable = "CREATE TABLE $uid (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(50) NOT NULL,
amount INT NOT NULL,
email VARCHAR(50) NOT NULL,
contact INT(20) UNSIGNED,
due_date VARCHAR(15),
remarks VARCHAR(50)
)";
$res1=mysql_query($createTable,$con1);
	if($res1){
	echo "<script>alert('Your sign up was successful!');
	window.location.href='index.php'</script>";
	}
}

echo"$error";






