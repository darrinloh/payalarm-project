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
		
		$check = "SELECT name FROM $nameOfUser WHERE name='$name'";
		$checkRes=mysqli_query($con1,$check);
		if(mysqli_num_rows($checkRes) > 0){
		$error=3;
		}
		
		if($error==0){
		if($test1 != '/' || $test2 != '/' || $leftover !=''){ 	 
			$error = 1;
		}
		}
		if(!is_numeric($contact) || !is_numeric($amount)){
			$error=4;
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
			$_SESSION["temp"]="wrong";
		}
		elseif($error==2){
			$_SESSION["temp"]="wrong1";
		}
		elseif($error==3){
			$_SESSION["temp"]="wrong2";
		}
		elseif($error==4){
			$_SESSION["temp"]="wrong3";
		}
		$page="account.php";

	}
	
	
	elseif(isset($_POST['delete'])){
		$name1= $_POST['hidden'];
		
		$DeleteQuery = "DELETE FROM $nameOfUser WHERE name='$name1'";
		
		$result2=mysqli_query($con1, $DeleteQuery);
		$page="account.php";
	}
	elseif(isset($_POST['save_changes'])){
		
		$name2 = $_POST['name'];
		$amount2 = $_POST['amount'];
		$email2 = $_POST['email'];
		$contact2 = $_POST['contact'];
		$due_date2 = $_POST['due_date'];
		$remarks2 = $_POST['remarks'];
		$hid = $_POST['hid'];
		
		$d=(int)substr($due_date2,0,2);    //date
		$m=(int)substr($due_date2,3,2);		//month
		$y=(int)substr($due_date2,6);			//year
		$leftover=substr($due_date2,10);
		$test1=substr($due_date2,2,1);
		$test2=substr($due_date2,5,1);
		
		$error = 0;
		$check = "SELECT name FROM $nameOfUser WHERE id='$hid'";
		$checkRes=mysqli_query($con1,$check);
		$row = mysqli_fetch_assoc($checkRes);	
	
		if($name2 == $row['name']){			//name unchanged
		}
		else{
			$check1 = "SELECT name FROM $nameOfUser WHERE name='$name2'";
			$checkRes1=mysqli_query($con1,$check1);
			if(mysqli_num_rows($checkRes1) > 0){
				$error =3;
			}
	
		}
		if(!is_numeric($contact2) || !is_numeric($amount2)){
			$error=4;
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

		if($error==0){
			$EditQuery = "UPDATE $nameOfUser SET name='$name2', amount='$amount2', email='$email2', contact='$contact2',due_date='$due_date2',remarks='$remarks2' WHERE id='$hid'";
		
			$edit_res=mysqli_query($con1,$EditQuery);
		
			$page="account.php";
		}
		elseif($error!=0){
			$_SESSION['POST'] = $hid;
			if($error==1){
				$_SESSION["temp"]="wrong";
			}
			elseif($error==2){
				$_SESSION["temp"]="wrong1";
			}
			elseif($error==3){
				$_SESSION["temp"]="wrong2";
			}
			elseif($error==4){
				$_SESSION["temp"]="wrong3";
			}
			$page="edit.php";
		}
	}
	
	
	
	elseif(isset($_POST['send'])){
	    
		$from = "PayAlarm";
		$baseurl ="https://mx.fortdigital.net";
		$name = $_POST['hidden'];
		$message = "Payment is overdue.";
		$to = $_POST['hidden_number'];
		
		// auth call
		$url = "$baseurl/http/send-message?username=test&password=test&to=$to&from=PayAlarm&message=Hi+$name!+Your+payment+is+due.";
 
		// do auth call
		$ret = file($url);
 
		// explode our response. return string is on first line of the data returned
		$sess = explode(":",$ret[0]);
		
		//echo $sess[0];
		if($sess[0] == "OK"){
 
			$sess_id = trim($sess[1]); // remove any whitespace
			$url = "$baseurl/http/send-message?session_id=$sess_id&to=$to&message=$message";
 
			// do sendmsg call
			$ret = file($url);
			$send = explode(":",$ret[0]);
 
			if ($send[0] == "ID") {
				echo "successnmessage ID: ". $send[1];
			}
			else {
				echo "send message failed";
			}
		}
		else {
			echo "Authentication failure: ". $ret[0];
		}
		$page="account.php";
	}
	
	include 'UpdateDueDate.php';
	//echo"$error";
	header("Location: $page");
