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
	$con1 = mysqli_connect("localhost", "root","","customerdata");
	
	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$amount = $_POST['amount'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$due_date = $_POST['due_date'];
		$remarks = $_POST['remarks'];
		
		$d=(int)substr($due_date,0,2);    //date
		$m=(int)substr($due_date,3,2);		//month
		$y=(int)substr($due_date,6);			//year
		$leftover=substr($due_date,10);
		$test1=substr($due_date,2,1);
		$test2=substr($due_date,5,1);
		
		$error = 0;
		
		$check = "SELECT name FROM $nameOfUser";
		$checkRes=mysqli_query($con1,$check);
		
		while($row = mysqli_fetch_assoc($checkRes)){
		if($row["name"] == $name){
			$error=3;
		}
	}
		if($error==0){
		if($test1 != '/' || $test2 != '/' || $leftover !=''){ 	 
			$error = 1;
		}
		}
	
		if($error ==0){
			if($y%4 ==0){
				if($m == 02 && ($d<1 || $d>28)){
				$error = 2;
				}			
			}
			if($d<1 || $d >31){
				$error = 2;			
			}
			
			if($m<1 || $m >12){
				$error = 2;			
			}
			if($y<0){
				$error = 2;			
			}
		}
				
		if($error == 0){
		$AddQuery = "INSERT INTO $nameOfUser (name, amount, email, contact, due_date, remarks) VALUES ('$name','$amount', '$email', '$contact', '$due_date', '$remarks')";

		$result1 = mysqli_query($con1,$AddQuery);
		$page="account.php";
		}
		elseif($error==1){
			$page="account.php?msg=wrong";
		}
		elseif($error==2){
			$page="account.php?msg=wrong1";
		}
		elseif($error==3){
			$page="account.php?msg=wrong2";
		}
	}
	
	if(isset($_POST['delete'])){
		$name1= $_POST['hidden'];
		
		$DeleteQuery = "DELETE FROM $nameOfUser WHERE name='$name1'";
		
		$result2=mysqli_query($con1, $DeleteQuery);
		$page="account.php";
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
		$page="account.php";
	}
	header("Location: $page");