<?php

include 'dbh.php';

$username =$_SESSION['uid'];

$sql = "SELECT * FROM $username";
$res1 = mysqli_query($con1,$sql);


$today = date_create();

echo "<style>";

echo ".data {word-wrap:break-word; width:108px; }";
echo ".contact {width:40px}";
echo "table {table-layout:fixed; width:850px}";
echo ".rem {word-wrap:break-word; width:140px;}";
echo ".send_reminder {width:65px;}";

echo "</style>";

while($row = mysqli_fetch_array($res1)){
	$d=$row["day"];
	$m=$row["mon"];
	$y=$row["year"];
	
	$due=date_create_from_format("d-m-Y","$d-$m-$y");
	$dif = date_diff($today,$due);
	$diff = $dif->format("%r%a");   // signed integer difference between todays date and due date
	

		if($_SESSION["ref"] == 1){
			if($diff <2 && $diff >=0){
				echo "<form action=moddata.php method=POST>";
				echo "<tr style:'height:auto'>";
					echo "<td class='data' style='Font-weight:bold'>" . $row['name'] . "</td>";
					echo "<td class='data'>" . $row['amount'] . "</td>";
					echo "<td class='data'>" . $row['email'] . "</td>";
					echo "<td class='data'>" . $row['contact'] . "</td>";
					echo "<td class='data'>" . $row['due_date'] . "</td>";
					echo "<td class='rem'>" . $row['remarks'] . "</td>";
					echo "<input type=hidden name=hidden value=" . $row['name'] . ">";
				echo "<input type=hidden name=hidden_amount value=" . $row['amount'] . ">";
				echo "<input type=hidden name=hidden_number value=" . $row['contact'] . ">";
				echo "<td class'='data'>" . "<input type=submit name=send_from_home value=send>" . "</td>";
				echo "</form>";
				echo "</tr>";
			}
			
		}
		elseif($_SESSION["ref"] == 2){
			if($diff <8 && $diff >=0){
				echo "<form action=moddata.php method=POST>";
				echo "<tr style:'height:auto'>";
					echo "<td class='data' style='Font-weight:bold'>" . $row['name'] . "</td>";
					echo "<td class='data'>" . $row['amount'] . "</td>";
					echo "<td class='data'>" . $row['email'] . "</td>";
					echo "<td class='data'>" . $row['contact'] . "</td>";
					echo "<td class='data'>" . $row['due_date'] . "</td>";
					echo "<td class='rem'>" . $row['remarks'] . "</td>";
					echo "<input type=hidden name=hidden value=" . $row['name'] . ">";
				echo "<input type=hidden name=hidden_amount value=" . $row['amount'] . ">";
				echo "<input type=hidden name=hidden_number value=" . $row['contact'] . ">";
				echo "<td class'='data'>" . "<input type=submit name=send_from_home value=send>" . "</td>";
				echo "</form>";
				echo "</tr>";
			}
			
		}
		elseif($_SESSION["ref"] == 3){
			if($diff <31 && $diff >=0){
				echo "<form action=moddata.php method=POST>";
				echo "<tr style:'height:auto'>";
					echo "<td class='data' style='Font-weight:bold'>" . $row['name'] . "</td>";
					echo "<td class='data'>" . $row['amount'] . "</td>";
					echo "<td class='data'>" . $row['email'] . "</td>";
					echo "<td class='data'>" . $row['contact'] . "</td>";
					echo "<td class='data'>" . $row['due_date'] . "</td>";
					echo "<td class='rem'>" . $row['remarks'] . "</td>";
					echo "<input type=hidden name=hidden value=" . $row['name'] . ">";
				echo "<input type=hidden name=hidden_amount value=" . $row['amount'] . ">";
				echo "<input type=hidden name=hidden_number value=" . $row['contact'] . ">";
				echo "<td class'='data'>" . "<input type=submit name=send_from_home value=send>" . "</td>";
				echo "</form>";
				echo "</tr>";
			}
		}
		else{
			if($diff ==0){
				echo "<form action=moddata.php method=POST>";
				echo "<tr style:'height:auto'>";
					echo "<td class='data' style='Font-weight:bold'>" . $row['name'] . "</td>";
					echo "<td class='data'>" . $row['amount'] . "</td>";
					echo "<td class='data'>" . $row['email'] . "</td>";
					echo "<td class='data'>" . $row['contact'] . "</td>";
					echo "<td class='data'>" . $row['due_date'] . "</td>";
					echo "<td class='rem'>" . $row['remarks'] . "</td>";
					echo "<input type=hidden name=hidden value=" . $row['name'] . ">";
				echo "<input type=hidden name=hidden_amount value=" . $row['amount'] . ">";
				echo "<input type=hidden name=hidden_number value=" . $row['contact'] . ">";
				echo "<td class'='data'>" . "<input type=submit name=send_from_home value=send>" . "</td>";
				echo "</form>";
				echo "</tr>";
			}
			
		}
	
		
}


?>

