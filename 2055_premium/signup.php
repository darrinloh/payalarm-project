<?php

include 'dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];


echo $uid."<br>";
echo $pwd."<br>";

$sql = "INSERT INTO user (uid, pwd) VALUES ('$uid','$pwd')";

$result = mysqli_query($conn,$sql);

header("Location: index.php");


