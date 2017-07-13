<?php
session_start();
	$con = mysqli_connect("localhost","root","","payalarmlogin");				//diff file begin
		$sql = "SELECT id, uid FROM user";
		$result = mysqli_query($con, $sql);
		
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				if($row["id"] == $_SESSION['id']){
					$name = $row["uid"];
				}
			}
		}
$con1 = mysql_connect("localhost","root","");
mysql_select_db("customerdata",$con1);
if (isset($_GET["msg"])){
	
			if ($_GET['msg'] == 'name'){	
			echo "hi";
				$sql = "SELECT * FROM test1 ORDER BY name";
			}
			
			elseif ($_GET['msg'] == 'amount'){
				$sql= "SELECT * FROM $name ORDER BY amount";
			}
			
			$sorting = mysql_query($sql, $con1);
			if($sorting){
				echo"yay";
			}
		
		}
		
		//header("Location:account.php");
