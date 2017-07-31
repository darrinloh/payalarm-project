	<?php
session_start();
if (!isset($_SESSION["id"]))
   {
      header("location: index.php");
   }
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
    	<div id="site_title"><h1><a href="redirect.php">PayAlarm</a></h1></div>
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
				   <li><a href="logout.php">Log Out</a></li>
              	</li>
            <br style="clear: left" />
        </div> <!-- END of menu -->
    </div> <!-- END of header-->

    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
        
        <div class="col no_margin_right" id="AddCustomer" style="width:830px">
		
		
		<h2>Customer details and Accounts</h2>
			<form action="moddata.php" method="POST" id="mod">
				<b>Add New Customer:</b><br>
				<input type="text" name="name" placeholder="Name">
				<input type="text" name="amount" placeholder="Amount(Numbers only)">
				<input type="text" name="email" placeholder="Email">
				<input type="text" name="contact" placeholder="Contact(Numbers only)">
				<input type="text" name="due_date" placeholder="Due Date(dd/mm/yyyy)">
				<textarea style="font-family:arial" rows="6" cols="50" name="remarks" form="mod" placeholder="Remarks(max 250 characters)(NOTE: Advised to put currency of amount at the beginning)"></textarea>
				
				<input type="submit" name="add" value="Add">
			</form>
			<?php
				if (isset($_SESSION["temp"]) && $_SESSION["temp"] == 'wrong') {
					echo "<div style='color:red'><b>Incorrect date format</b></div>";
				}
				elseif(isset($_SESSION["temp"]) && $_SESSION["temp"] == 'wrong1'){
					echo "<div style='color:red'><b>Incorrect date</b></div>";
				}
				elseif(isset($_SESSION["temp"]) && $_SESSION["temp"] == 'wrong2'){
					echo "<div style='color:red'><b>Name already taken(Try to add identifiers to the back of the name eg. Michael and Michael 2</b></div>";
				}
				elseif(isset($_SESSION["temp"]) && $_SESSION["temp"] == 'wrong3'){
					echo "<div style='color:red'><b>Amount or Contact must only contain numbers</b></div>";
				}
				if (isset($_SESSION["temp"])){
					unset($_SESSION["temp"]);
				}
				
					
				?>
				
			<b>Search for certain customers</b><br>
			<form name="form1" method="POST" action=search1.php>
			<input name="search" type="text" size="20">
			<input type="submit" name="Submit" value="Search" />
			</form>
			</div>
			<div class="cleaner"></div>
                        
			
            <div class="cleaner divider"></div>

			<div class="col no_margin_right" id="Table" style="width:830px">
		<?php
			include 'dbh.php';
			

		if (isset($_GET["msg"])){
			if ($_GET['msg'] == 'name'){	
			
				$sql = "SELECT * FROM $_SESSION[uid] ORDER BY name";
			}
			
			elseif ($_GET['msg'] == 'amount'){
				$sql= "SELECT * FROM $_SESSION[uid] ORDER BY amount";
			}
			
			elseif ($_GET['msg'] == 'email'){
				$sql= "SELECT * FROM $_SESSION[uid] ORDER BY email";
			}
			elseif ($_GET['msg'] == 'contact'){
				$sql= "SELECT * FROM $_SESSION[uid] ORDER BY contact";
			}
			elseif ($_GET['msg'] == 'due_date'){
				$sql= "SELECT * FROM $_SESSION[uid] ORDER BY year,mon,day";
			}
			elseif ($_GET['msg'] == 'remarks'){
				$sql= "SELECT * FROM $_SESSION[uid] ORDER BY remarks";
			}
			
	
		}
		else{
			$sql = "SELECT * FROM $_SESSION[uid] ORDER BY name";
			
		}
		$myData = mysqli_query($con1, $sql);	
		
		echo "<style>";
		
		echo ".data {word-wrap:break-word; width:108px; }";
		echo ".send_reminder {width:65px;}";

		echo ".date {width:80px;}";
		echo ".contact {width:75px}";
		echo "table {table-layout:fixed; width:850px}";
		echo ".rem {word-wrap:break-word; width:140px;}";

		echo "</style>";

		echo "<table border=4 style='table-layout:fixed'>
		
		<tr style='color:blue;background-color:none'>
		<th class='data' ><a href='account.php?msg=name'>Name</a></th>
		<th class='data'><a href='account.php?msg=amount'>Amount</a></th>
		<th class='data'><a href='account.php?msg=email'>Email</a></th>
		<th class='contact'><a href='account.php?msg=contact'>Contact</a></th>
		<th class='date'><a href='account.php?msg=due_date'>Due Date</a></th>
		<th class='rem'><a href='account.php?msg=remarks'>Remarks</a></th>
		<th class='send_reminder'>Send </br>Reminder</th>
		</tr>";
		
		
		if($myData)
		while($record=mysqli_fetch_array($myData)){
			echo "<form action=moddata.php method=POST>";
			echo "<tr style:'height:auto'>";
			echo "<td class='data' style='Font-weight:bold'>" . $record['name'] . "</td>";
			echo "<td class='data'>" . $record['amount'] . "</td>";
			echo "<td class='data'>" . $record['email'] . "</td>";
			echo "<td class='contact'>" . $record['contact'] . "</td>";
			echo "<td class='date'>" . $record['due_date'] . "</td>";
			echo "<td class='rem'>" . $record['remarks'] . "</td>";
			echo "<input type=hidden name=hidden value=" . $record['name'] . ">";
			echo "<td class'='data'>" . "<input type=submit name=send value=send>" . "</td>";
			echo "<td class'='data'>" . "<input type=submit name=delete value=delete>" . "</td>";
			echo "</form>";
			echo "<form action=edit.php method=POST>";
			echo "<input type=hidden name=hid value=" . $record['id'] . ">";
			echo "<td class='data	'>" . "<input type=submit name=edit value=edit>" . "</td>";
			echo "</tr>";
			echo "</form>";
		}
		echo "</table>";
		
	
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