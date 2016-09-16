<?php
include 'connect_to_mysql.php';
$result = mysqli_query($con,"SELECT * FROM users ORDER BY id");
echo'<table>';
echo'<tr><td>#</td><td>First Name</td><td>Last Name</td><td>Username</td></tr>';
while($row = mysqli_fetch_array($result)){
echo'<tr>';
echo'<td>';
echo $row['id'];
echo'</td>';
echo'<td>';
echo $row['firstname'];
echo'</td>';
echo'<td>';
echo $row['lastname'];
echo'</td>';
echo'<td>';
echo $row['user'];
echo'</td>';
echo'</tr>';
}
echo'</table>';

if(isset($_POST['search'])){
$user=  $_POST['user'];
$result = mysqli_query($con,"SELECT * FROM users WHERE user='$user'");
while($row = mysqli_fetch_array($result)){
$last= $row['lastname'];
	}
	$user_db=str_replace(".", "", $user);
$user_db=$user_db.$last;
$con=mysqli_connect("localhost","marchome_marc","password","marchome_log");
$namw= $user_db."_log";
$result = mysqli_query($con,"SELECT * FROM $namw");
echo'<table>';
echo'<tr><td>regular</td><td>proxy</td><td>time</td><td>login</td></tr>';
while($row = mysqli_fetch_array($result)){
echo'<tr>';
echo'<td>';
echo $row['regular'];
echo'</td>';
echo'<td>';
echo $row['proxy'];
echo'</td>';
echo'<td>';
echo $row['time'];
echo'</td>';
echo'<td>';
echo $row['login'];
echo'</td>';
echo'</tr>';
}
echo'</table>';

}
?>
<style type="text/css">
td{
	border: 1px black solid;
}
table{
	border: 1px black solid;
	text-align: center;
	margin: 0 auto;
}
</style>
<form method='POST' action='5044529331.php'>
<label>user: </label>
<input type='password' name='user'>
<input type='submit' value='search' name='search'>
</form>
