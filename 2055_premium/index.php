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
    	<div id="site_title"><h1><a href="#">PayAlarm</a></h1></div>
		
						<!-- NOTICE=IF ACCOUNT IS LOGGED IN, RETURN TO HOME, ELSE RETURN TO INDEX(LOGIN PAGE) -->

        <div id="tooplate_menu" class="ddsmoothmenu">
		
            
            <br style="clear: left" />
        </div> <!-- END of menu -->
    </div> <!-- END of header-->
    
    <div id="tooplate_main_top"></div>
    <div id="tooplate_main">
    	       
        <div class="col center fp_services">
            <img src="images/login.png" alt="login" />
            <h2>Login</a></h2>
            <p>Enter your Username and Password</p>
			<form action="login1.php" method="POST">
				Username:<input type="text" name="uid" placeholder="Username">
				<br><br>
				Password:<input type="password" name="pwd" placeholder="Password">
				<br>
				<button type="submit">Login</button>
			</form>
			<p><small>New? <a style="cursor:pointer" href="signup.php ">Sign up now!</a></small></p>
		<?php
			if(!isset($_SESSION['id'])){
				echo "Your username or password is incorrect.";
			}
		?>
		</div>
		
		<div class="col one_third one_third_height fp_services">
			<img src="images/payment.jpg" style="margin-bottom:20px"/>
			<br>
			<br>
			<br>
			<h2 style="text-align:left ; width:220px ;font-size:30px; line-height:25px"> 
			To use our services, login first with your <strong>PayAlarm</strong> account first</h2>
		
          
        </div>
        
       

        <div class="cleaner divider"></div>
		
		<h2> What is PayAlarm?????</h2>
		
		<div class="col center" style="width:540px">
		<p><strong>PayAlarm</strong> is a web app of a simple payment tracking system to be used by a payee. In other words,it helps one to keep track of due payments from debtors!
		Some features include...<br>
		<strong>-automatic SMS system sent to the payer for regular reminders</strong><br>
		<strong>-an easy-to-use system to store payer's details</strong><br>
		Sign up now to get started!(Link above)</p>
		<br><br>
		<p>Click here for our <a href="faq.html" target="_blank"><strong>FAQ</strong></a>!</p>
		
		</div>
		
		 <div class="cleaner"></div>
   
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