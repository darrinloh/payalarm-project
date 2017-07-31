<?php
session_start();

if(isset($_POST['days']) && $_POST['days'] == 1){
$_SESSION["ref"] = 1;
}

elseif(isset($_POST['days']) && $_POST['days'] == 7){
$_SESSION["ref"] = 2;
}

elseif(isset($_POST['days']) && $_POST['days'] == 30){
$_SESSION["ref"] = 3;
}
elseif(isset($_POST['days']) && $_POST['days'] == 0){
$_SESSION["ref"] = 0;
}

header("location: home.php#notifications");