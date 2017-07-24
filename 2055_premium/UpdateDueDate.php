<?php

$sql= "SELECT * FROM $_SESSION[uid]";
$myData = mysqli_query($con1, $sql);
	
if(mysqli_num_rows($myData)>0){
	while($row = mysqli_fetch_assoc($myData)){
		
		
		$id = $row["id"];
		$due_date = $row["due_date"];
		$d=(int)substr($due_date,0,2);    //date
		$m=(int)substr($due_date,3,2);		//month
		$y=(int)substr($due_date,6);		//year

		$Update ="UPDATE $_SESSION[uid] SET day='$d',mon='$m',year='$y' WHERE id='$id'";
		
		mysqli_query($con1, $Update);
		
	}	
}



?>