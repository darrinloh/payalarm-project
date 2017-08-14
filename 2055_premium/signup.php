<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PayAlarm - A simple payment tracking system!</title>
<meta name="keywords" content="payment, simple, system, tracking, payalarm, pay " />
<meta name="description" content="A simple payment system for anyone to use" />


<link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

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
    	<div id="site_title"><h1><a href="index.php">PayAlarm</a></h1></div>
        <div id="tooplate_menu" class="ddsmoothmenu">
            
            <br style="clear: left" />
        </div> <!-- END of menu -->
    </div> <!-- END of header-->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
    	       
        <div class="col center fp_services" style="width:660px">	
            <img src="images/login.png" alt="login" />

			<form action="signup1.php" method="POST" style="float:right">
			<h2><b>Sign Up!</b></h2> 	 	
            <p>Enter your New Username and Password</p>
				Username:<input type="text" name="uid" placeholder="Username"><p>(Note: Username must contain <b>at least 1 alphabet</b>)</p>
				<br><br>
				Password:<input type="password" name="pwd" placeholder="Password"><br><p>(Note: Password length must be <b>6 or more</b> and <b>cannot contain special characters</b>)</p>
				<br><br>
				Confirm Password:<input  type="password" name="password" placeholder="Confirm Password"><br>
				<br><br>
				Payee's Name:<input type="text" name="payee" placeholder="Payee"><p>(Note:Your customers <b>will see this</b> when you notify them with the automatic sms)</p>
				<br><br>
				<input type="submit" value="Sign Up">
			</form>
			
			<?php
			include 'errorCheck1.php';
			?>

			
		</div>
		
        
        <div class="cleaner"></div>

        <div class="cleaner divider"></div>
   
    </div> <!-- END of main -->
    <div id="tooplate_footer">
 
        <div class="col center">
        	<h4>Ask us anything!</h4>
          	<p>Contact us for enquiries at <a href="mailto:info@company.com">info@company.com</a></p>
			<br>
			<p>Copyright © 2017 PayAlarm</p>
        </div>
        
    	<div class="cleaner"></div>
       
    </div> <!-- END of footer -->
</div> <!-- END of wrapper -->

</body>
</html>