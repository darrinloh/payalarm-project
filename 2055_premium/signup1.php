<?php
	session_start();
	include 'dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$confirm = $_POST['password'];

$checkUser = "SELECT uid FROM user";
$checkRes = mysqli_query($conn, $checkUser);
$_SESSION["temp"]="error0";
$page ="";
	if(mysqli_num_rows($checkRes)>0){
		while($row = mysqli_fetch_assoc($checkRes)){
		if($row["uid"] == $uid){
		$_SESSION["temp"] ="error1";
			}
		}
	}

	
	
	if($_SESSION["temp"]=="error1"){
		$page="signup.php";
	}
	elseif(strlen(trim($uid)) <1 || strlen($pwd) <6){
		$_SESSION["temp"]= "error2";
		$page="signup.php";
	}
	elseif(is_numeric($uid)){
		$_SESSION["temp"]= "error3";
		$page="signup.php";
	}
	elseif(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pwd)){
		$_SESSION["temp"]= "error3";
		$page="signup.php";
	}
	elseif($pwd != $confirm){
		$_SESSION["temp"]= "error4";
		$page="signup.php";
	}
	elseif($_SESSION["temp"]=="error0"){
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
		remarks VARCHAR(200),
		day INT(2) UNSIGNED,
		mon INT(2) UNSIGNED,
		year INT(10) UNSIGNED
		)";
		$res1=mysql_query($createTable,$con1);
		if($res1){
			$page ="index.php";
		}
	}
	

header("Location:$page");






