<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PayAlarm - Accounts</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "tooplate_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	
<script src="js/prototype.js" type="text/javascript"></script>
<script src="js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
<script src="js/lightbox.js" type="text/javascript"></script>

</head>

<body>

<div id="tooplate_wrapper">
	<div id="tooplate_header">		
    	<div id="site_title"><h1><a href="#">PayAlarm</a></h1></div>
						<!-- NOTICE=IF ACCOUNT IS LOGGED IN, RETURN TO HOME, ELSE RETURN TO INDEX(LOGIN PAGE) -->

		
       <div id="tooplate_menu" class="ddsmoothmenu">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="account.php"  class="withsub">Account</a>
                    <ul>
                        <li><a href="changeDetails.php" class="last">Change details</a></li>
                        <li><span class="bottom"></span></li>
                   </ul>
				   <li><a href="contact.php">About Us</a></li>
				   <li><a href="faq.html" target="_blank">FAQ</a></li>
              	</li>
            <br style="clear: left" />
        </div> <!-- END of menu -->
    </div> <!-- END of header-->

    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
        
        <div class="col no_margin_right" id="AddCustomer" style="width:830px">
		
		<h2>Customer details and Accounts</h2>
			<form action="moddata.php" method="POST">
				<b>Add New Customer:</b><br>
				<input type="text" name="name" placeholder="Name">
				<input type="text" name="amount" placeholder="Amount">
				<input type="text" name="email" placeholder="Email">
				<input type="text" name="contact" placeholder="Contact">
				<input type="text" name="due_date" placeholder="Due Date">
				<input type="text" name="remarks" placeholder="Remarks">
				
				<input type="submit" name="add" value="Add">
			</form>
			</div>
			<div class="cleaner"></div>
                        
            <div class="cleaner divider"></div>

			<div class="col no_margin_right" id="Table" style="width:830px">
		<?php
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
		mysql_select_db("hello",$con1);
		$sql= "SELECT * FROM $name";
		$myData = mysql_query($sql, $con1);												//diff file end
		echo "<table border=4>
		<tr style='color:red;background-color:none'>
		<th style='width:400px'>Name</th>
		<th style='width:400px'>Amount</th>
		<th style='width:400px'>Email</th>
		<th style='width:400px'>Contact</th>
		<th style='width:400px'>Due Date</th>
		<th style='width:400px'>Remarks</th>
		</tr>";
		while($record=mysql_fetch_array($myData)){
			echo "<form action=moddata.php method=POST>";
			echo "<tr>";
			echo "<td style='Font-weight:bold'>" . $record['name'] . "</td>";
			echo "<td>" . $record['amount'] . "</td>";
			echo "<td>" . $record['email'] . "</td>";
			echo "<td>" . $record['contact'] . "</td>";
			echo "<td>" . $record['due_date'] . "</td>";
			echo "<td>" . $record['remarks'] . "</td>";
			echo "<td>" . "<input type=hidden name=hidden value=" . $record['name'] . "></td>";
			echo "<td>" . "<input type=submit name=delete value=delete>" . "</td>";
			echo "</form>";
			echo "<form action=edit.php method=POST>";
			echo "<td>" . "<input type=hidden name=hid value=" . $record['id'] . "></td>";
			echo "<td>" . "<input type=submit name=edit value=edit>" . "</td>";
			echo "</tr>";
			echo "</form>";
		}
		echo "</table>";
		
		mysqli_close($con);
		?>
		<br><br><br>
		
		<p style="text-align:center"> <a href="account.php#site_title" ">Click Here to go to the top of the page!</a></p>
		</div>
		
	
		
		<div class="cleaner divider"></div>

        
        <div class="cleaner"></div>
    </div> <!-- END of main -->
   <div id="tooplate_footer">
 
        <div class="col center">
        	<h4>Ask us anything!</h4>
          	<p>Contact us for enquiries at <a href="mailto:info@company.com">info@company.com</a></p>
			<br>
			<p>	Copyright © 2017 PayAlarm</p>
        </div>
        
    	<div class="cleaner"></div>
    </div> <!-- END of footer -->
</div> <!-- END of wrapper -->

</body>
</html>