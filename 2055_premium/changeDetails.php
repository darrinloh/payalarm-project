<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PayAlarm - Change account details</title>
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
        
        <div class="col no_margin_right" style="width:830px">
		
		
		<h2>Change Account Details</h2>
		
		<form action="change.php" method="post">
			Enter new password<input type="text" name="newPw" placeholder="New Password">
			<input type="submit" name="pass" value="Change password">
			<br><br>
		
			Enter new email address<input type="text" name="newEmail" placeholder="New Email Address">
			<input type="submit" name="email" value="Change email">
			<br><br>
		</form>
		
		
		
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