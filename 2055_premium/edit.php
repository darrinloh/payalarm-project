<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PayAlarm - Edit Customer Details</title>
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
				   <li><a href="logout.php">Log Out</a></li>
              	</li>
            <br style="clear: left" />
        </div> <!-- END of menu -->
    </div> <!-- END of header-->

    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
        
        <div class="col no_margin_right" style="width:830px">
		
		
		<h2>Edit</h2>
		
		<?php
		$con = mysqli_connect("localhost","root","","payalarmlogin");
		$sql = "SELECT id, uid FROM user";
		$result = mysqli_query($con, $sql);
		
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				if($row["id"] == $_SESSION['id']){
					$name = $row["uid"];
				}
			}
		}
		if(!empty($_SESSION['POST'])){
			$hid= $_SESSION['POST'];
			$_SESSION['POST'] = "";
			}
		else{
			$hid= $_POST['hid'];
		}
		$con1 = mysqli_connect("localhost","root","", "customerdata");
		$sql1= "SELECT * FROM $name";
		$myData = mysqli_query($con1, $sql1);
			
		if(mysqli_num_rows($myData)>0){
			while($row = mysqli_fetch_assoc($myData)){
				if($row["id"] == $hid){
					$name = $row["name"];
					$amount = $row["amount"];
					$email = $row["email"];
					$contact = $row["contact"];
					$due_date = $row["due_date"];
					$remarks = $row["remarks"];
				}
			}
		}
		
		
		
		echo "<form action=moddata.php method=POST id=edit>";
		echo	"<input type=text name=name placeholder='Name' value='$name'>";
		echo	"<input type=text name=amount placeholder='Amount(Numbers only)' value='$amount'>";
		echo	"<input type=text name=email placeholder='Email' value='$email'>";
		echo	"<input type=text name=contact placeholder='Contact(Numbers only)' value='$contact'>";
		echo	"<input type=text name=due_date placeholder='Due Date' value='$due_date'>";
		echo	"<textarea style='font-family:arial' rows='6' cols='50' name='remarks' form='edit' placeholder='Remarks(max 250 characters)' >$remarks</textarea>";
		echo	"<input type=hidden name=hid value='$hid'>";
		echo	"<br>";
		echo	"<input type=submit name=save_changes value='Save Changes'>";
		echo "</form>";
	
		if (isset($_GET["msg"]) && $_GET["msg"] == 'wrong') {
			echo "<div style='color:red'><b>Incorrect date format</b></div>";
		}
		elseif(isset($_GET["msg"]) && $_GET["msg"] == 'wrong1'){
			echo "<div style='color:red'><b>Incorrect date</b></div>";
		}
		elseif(isset($_GET["msg"]) && $_GET["msg"] == 'wrong2'){
			echo "<div style='color:red'><b>Name already taken(Try to add identifiers to the back of the name eg. Michael and Michael 2</b></div>";
		}
		elseif(isset($_GET["msg"]) && $_GET["msg"] == 'wrong3'){
				echo "<div style='color:red'><b>Amount or Contact must only contain numbers</b></div>";
		}
	
		
		mysqli_close($con);
		?>
		
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