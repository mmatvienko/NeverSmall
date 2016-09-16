<?php
include 'functions.php';
	
	if(isset($_COOKIE[safe('user')])){
	$conw=mysqli_connect("localhost","marchome_marc","password","marchome_workout");
	$username=$_COOKIE[safe('user')]; 
	$checkw=mysqli_query($conw, "SELECT * FROM users WHERE safeuser='$username'");
	
	while($row=mysqli_fetch_assoc($checkw)){
	$_SESSION['user']=$row['user'];
	$_SESSION['last']=$row['lastname'];
}
}
?>
