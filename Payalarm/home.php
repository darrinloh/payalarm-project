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
<title>PayAlarm - Homepage</title>
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
				 
				   <li><a href="faq.html" target="_blank">FAQ</a></li>
				   <li><a href="logout.php">Log Out</a></li>
              	</li>
            <br style="clear: left" />
        </div> <!-- END of menu -->
    </div> <!-- END of header-->

    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
         <div class="col two_third" style="width:830px; text-align:center">
		<h1 style="color:blue; font-family:Georgia; "><u><b>HOME PAGE</b></u>	</h1>	
		 <p> Welcome to your very own PayAlarm account! We hope you enjoy your experience!</p>

		<?php 
		 if (isset($_SESSION["temp"]) && $_SESSION["temp"] == 'pass') {
			echo"<script>alert('Password successfully changed!')</script>";
			$_SESSION["temp"]="";				//reset the temp variable
		}
		?>
		 </div>
		 
		 
		<div class="cleaner"></div> 
		<div class="cleaner divider"></div> 
		
        <div class="col two-third" id="notifications">
        	<div class="padding_right">
                <h2>Notifications and Updates</h2>
				Choose the minimum number of days to the due date for a customer's data to be displayed at the home page. The default option is "Due Today"
				<form action="refresh.php" method="post">
					<select name="days">
						<option value="0" <?php if($_SESSION['ref'] == "0"){ echo "selected"; } ?>>Due today</option>
						<option value="1" <?php if($_SESSION['ref'] == "1"){ echo "selected"; } ?>>1 day</option>
						<option value="7" <?php if($_SESSION['ref'] == "2"){ echo "selected"; } ?>>7 days</option>
						<option value="30" <?php if($_SESSION['ref'] == "3"){ echo "selected"; } ?>>30 days</option>
					  </select> 
					<input type="submit" name="Submit" value="Refresh">
				</form>
				<br>
				<?php
				echo "<table border=2 style='table-layout:fixed; width:600px'>
					<tr style='color:blue;background-color:none'>
						<th class='data' >Name</th>
						<th class='data'>Amount</th>
						<th class='data'>Email</th>
						<th class='data'>Contact</th>
						<th class='data'>Due Date</th>
						<th class='rem'>Remarks</th>
						<th class='send_reminder'>Send </br>Reminder</th>
					</tr>";
					include 'notifications.php';
				echo "</table>";

				

				?>
				
                </div>
				<div class="cleaner"></div>
                        
           
            
        </div>
        
        <div class="col one_third no_margin_right">
            <h3>Services</h3>
            <ul class="tooplate_list">
            	<li><a href="account.php#AddCustomer">Add new customer detail entry</a></li>

				<li><a href="home.php#overdue">Skip to overdue payments</a></li>
                </ul>
            
            <div class="cleaner divider"></div>	
            
            
        </div>
       <div class="cleaner divider"></div>
       <div class="cleaner"></div>
	   
	   <div class="col two-third" id="overdue">
        	<div class="padding_right">
                <h2 style="color:red" ><strong>Overdue Payments</strong></h2>

				<br>
				<?php
				echo "<table border=2 style='table-layout:fixed; width:600px'>
					<tr style='color:red;background-color:none'>
						<th class='data' >Name</th>
						<th class='data'>Amount</th>
						<th class='data'>Email</th>
						<th class='data'>Contact</th>
						<th class='data'>Due Date</th>
						<th class='rem'>Remarks</th>
						<th class='send_reminder'>Send </br>Reminder</th>
					</tr>";
					include 'overdue.php';
				echo "</table>";

				

				?>
				
				
                </div>
		</div>
		  <div class="cleaner"></div>
		    <div class="cleaner divider"></div>
			
			<p style="text-align:center"> <a href="home.php#site_title" >Click Here to go to the top of the page!</a></p>
    </div> <!-- END of main -->
    <div id="tooplate_footer">
 
        <div class="col center">
        	<h4>Ask us anything!</h4>
          	<p>Contact us for enquiries at <a href="mailto:samuellohjw@gmail.com">samuellohjw@gmail.com</a></p>
			<br>	Copyright © 2017 PayAlarm</p>
        </div>
        
    	<div class="cleaner"></div>
    </div> <!-- END of footer -->
</div> <!-- END of wrapper -->

</body>
</html>