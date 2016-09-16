<?php
ini_set('session.cookie_httponly', true);
include 'functions.php';
session_start();
$user=$_SESSION['zuser'];
$last=$_SESSION['last'];
$userdb=str_replace(".", "", $user);
$userdb=$userdb.$last;
$con=mysqli_connect("localhost","marchome_marc","password","marchome_log");
$regular = $_SERVER['REMOTE_ADDR'];
$proxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
$time = $_SERVER['REQUEST_TIME'];
$time = date('r', $time);
$login="false";
$namw=$userdb."_log";
mysqli_query($con,"INSERT INTO $namw (regular, proxy, time, login) VALUES ('$regular','$proxy','$time','$login')");

setcookie(safe("user"),$user,time()-31536000);
setcookie(safe("password"),$password,time()-31536000);
session_destroy();
header("Location: index.php");
?>
