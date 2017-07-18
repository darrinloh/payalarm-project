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
		
		
		<h2>Search</h2>
			<a href="account.php">Back to database</a>
			</div>
			<div class="cleaner"></div>
                        
			
            <div class="cleaner divider"></div>

			<div class="col no_margin_right" id="Table" style="width:830px">
		<?php
		include 'dbh.php';
		
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
		
		function filterTable($query){
			$con1 = mysqli_connect("localhost", "root", "", "customerdata");
			$filter_Result=mysqli_query($con1,$query);
			return $filter_Result;
		}
		$search = $_POST['search'];
		$query= "SELECT * FROM $name WHERE CONCAT(`name`, `amount`, `email`, `contact`, `due_date`, `remarks`) LIKE '%".$search."%'";
		$search_result = filterTable($query);
		
		

		
		echo "<style>";
		
		echo ".data {word-wrap:break-word; width:108px; }";
		echo "table {table-layout:fixed; width:850px}";
		echo ".rem {word-wrap:break-word; width:150px;  }";
		echo ".edit{ width:20px;  }";
		echo "</style>";

		echo "<table border=4 style='table-layout:fixed'>
		
		<tr style='color:red;background-color:none'>
		<th class='data' ><a href='account.php?msg=name'>Name</a></th>
		<th class='data'><a href='account.php?msg=amount'>Amount</a></th>
		<th class='data'><a href='account.php?msg=email'>Email</a></th>
		<th class='data'><a href='account.php?msg=contact'>Contact</a></th>
		<th class='data'><a href='account.php?msg=due_date'>Due Date</a></th>
		<th class='rem'>Remarks</th>
		</tr>";
		
		
		
		while($record=mysqli_fetch_array($search_result)){
			echo "<form action=moddata.php method=POST>";
			echo "<tr style:'height:auto'>";
			echo "<td class='data' style='Font-weight:bold'>" . $record['name'] . "</td>";
			echo "<td class='data'>" . $record['amount'] . "</td>";
			echo "<td class='data'>" . $record['email'] . "</td>";
			echo "<td class='data'>" . $record['contact'] . "</td>";
			echo "<td class='data'>" . $record['due_date'] . "</td>";
			echo "<td class='rem'>" . $record['remarks'] . "</td>";
			echo "<input type=hidden name=hidden value=" . $record['name'] . ">";
			echo "<td class'='edit';>" . "<input type=submit name=delete value=delete>" . "</td>";
			echo "</form>";
			echo "<form action=edit.php method=POST>";
			echo "<input type=hidden name=hid value=" . $record['id'] . ">";
			echo "<td class='edit'>" . "<input type=submit name=edit value=edit>" . "</td>";
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