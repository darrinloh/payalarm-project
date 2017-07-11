<?php
	session_start();

	$con = mysqli_connect("localhost","root","","payalarmlogin");
	$sql = "SELECT id, uid FROM user";
	$result = mysqli_query($con, $sql);	
	
	while($row = mysqli_fetch_assoc($result)){
		if($row["id"] == $_SESSION['id']){
			$nameOfUser = $row["uid"];
		}
	}
	$con1 = mysqli_connect("localhost", "root","","hello");
	
	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$amount = $_POST['amount'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$due_date = $_POST['due_date'];
		$remarks = $_POST['remarks'];

		$AddQuery = "INSERT INTO $nameOfUser (name, amount, email, contact, due_date, remarks) VALUES ('$name','$amount', '$email', '$contact', '$due_date', '$remarks')";

		$result1 = mysqli_query($con1,$AddQuery);
		header("Location: account.php");
	}
	
	if(isset($_POST['delete'])){
		$name1= $_POST['hidden'];
		
		$DeleteQuery = "DELETE FROM $nameOfUser WHERE name='$name1'";
		
		$result2=mysqli_query($con1, $DeleteQuery);
		header("Location: account.php");
	}
	if(isset($_POST['save_changes'])){
		
		$name2 = $_POST['name'];
		$amount2 = $_POST['amount'];
		$email2 = $_POST['email'];
		$contact2 = $_POST['contact'];
		$due_date2 = $_POST['due_date'];
		$remarks2 = $_POST['remarks'];
		
		$EditQuery = "UPDATE $nameOfUser SET name='$name2', amount='$amount2', email='$email2', contact='$contact2',due_date='$due_date2',remarks='$remarks2' WHERE id='$_POST[uid]'";
		
		mysqli_query($con1,$EditQuery);
		header("Location: account.php");
	}