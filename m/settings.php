<!DOCTYPE html> 
<html> 
<head> 
	<title>Settings</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0-beta.1/jquery.mobile-1.3.0-beta.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.0-beta.1/jquery.mobile-1.3.0-beta.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<script type="text/javascript" src="js/mainjs.js"></script>
</head> 

<body> 
	<div data-role="page">
		<?php 
		require'logged.php';
		require 'url_vs_sesh.php';
		include'leftpanel.php';
		 include'rightpanel.php'; 
		?>
		<div data-role="header">
			<a href="#leftpanel">Menu</a>
		<h1>Settings</h1>
			<a href="#rightpanel">Me</a>
		</div>
		<div data-role="content">
			<div data-role="listview">
<?php


if(isset($_POST['changepass'])){
$user = $_GET['view'];
	$oldpass=strip_tags($_POST['oldpass']);
		$salt1="curtainpeople";
		$salt1=md5($salt1);
		$salt2="bedbeats";
		$salt2=md5($salt2);
		$salt3="closetpillow";
		$salt3=md5($salt3);
		$oldpass=$salt3.$oldpass.$salt1;
		$oldpass=md5($oldpass.$salt2);

$pass=strip_tags($_POST['pass']);
		$salt1="curtainpeople";
		$salt1=md5($salt1);
		$salt2="bedbeats";
		$salt2=md5($salt2);
		$salt3="closetpillow";
		$salt3=md5($salt3);
		$pass=$salt3.$pass.$salt1;
		$pass=md5($pass.$salt2);

$repass=strip_tags($_POST['repass']);
		$salt1="curtainpeople";
		$salt1=md5($salt1);
		$salt2="bedbeats";
		$salt2=md5($salt2);
		$salt3="closetpillow";
		$salt3=md5($salt3);
		$repass=$salt3.$repass.$salt1;
		$repass=md5($repass.$salt2);

		 $result = mysqli_query($con,"SELECT password FROM users WHERE user='$user' AND password='$oldpass'");
		
		 $numrows= mysqli_num_rows($result);
		if($numrows != 1){
			echo'<li><span id=errmsg>Wrong old password.</span></li>';
			echo"<META HTTP-EQUIV='refresh' CONTENT='1; URL=settings.php?view=$user'>";
		}
		elseif($repass==$pass){
			mysqli_query($con,"UPDATE users SET password='$pass'
			WHERE user='$user'");

			echo'<li><span id=sccmsg>Your password successfully been changed</span></li>';
			echo"<META HTTP-EQUIV='refresh' CONTENT='1; URL=settings.php?view=$user'>";
		
			mysqli_close($con);

		}
		else{
			echo'<li><span id=errmsg>New passwords don\'t match.</span></li>';
			echo"<META HTTP-EQUIV='refresh' CONTENT='1; URL=settings.php?view=$user'>";
		}

}

if(isset($_POST['changemax'])){
	$user = $_GET['view'];
$userc=str_replace(".", "", $user);
$userc=$userc.$last;

$bench= $_POST['bench'];
$squat = $_POST['squat'];
$result = mysqli_query($con,"SELECT password FROM users WHERE user='$user'");
 $numrows= mysqli_num_rows($result);
		$time=date("Y-m-d");
	
		
			mysqli_query($con,"UPDATE users SET maxbench='$bench' 
			WHERE user='$user'");
			mysqli_query($con,"UPDATE users SET maxsquat='$squat' 
			WHERE user='$user'");
			$con_w_user=mysqli_connect("localhost","root","root","$userc");
			$con=mysqli_connect("localhost","marchome_marc","password","marchome_maxbench");
			$namw=$userc."_maxbench";
			mysqli_query($con,"INSERT INTO $namw (id, time, weight)
			VALUES ('', '$time','$bench')");
			$con=mysqli_connect("localhost","marchome_marc","password","marchome_maxsquat");
			$namw=$userc."_maxsquat";
			mysqli_query($con,"INSERT INTO $namw (id, time, weight)
			VALUES ('', '$time','$squat')");
			echo'<li><span id=sccmsg>Changes will be made soon...</span></li>';
			echo"<META HTTP-EQUIV='refresh' CONTENT='1; URL=settings.php?view=$user'>";
			$dayhj=date("Y-m-d");
			$con=mysqli_connect("localhost","marchome_marc","password","marchome_done");
			$namw=$userc."_done";
			mysqli_query($con,"INSERT INTO $namw VALUES ('','$dayhj',' changed his bench and squat max to: $bench & $squat')");
			mysqli_close($con);

		


}
/////////////
if(isset($_POST['changehw'])){
	$weight = $_POST['weight'];
	$height = $_POST['height'];
	$user = $_GET['view'];
	$userc=str_replace(".", "", $user);
	$userc=$userc.$last;	
	$time=date("Y-m-d");
			mysqli_query($con,"UPDATE users SET weight='$weight' 
			WHERE user='$user'");
			mysqli_query($con,"UPDATE users SET height='$height' 
			WHERE user='$user'");
			$con=mysqli_connect("localhost","marchome_marc","password","marchome_maxsquat");
			$namw=$userc."_weight";
			mysqli_query($con,"INSERT INTO $namw (id, time, weight)
			VALUES ('', '$time','$weight')");
			$con=mysqli_connect("localhost","marchome_marc","password","marchome_maxsquat");
			$namw=$userc."_height";
			mysqli_query($con,"INSERT INTO $namw (id, time, height)
			VALUES ('', '$time','$height')");
			$dayhj=date("Y-m-d");
			$con=mysqli_connect("localhost","marchome_marc","password","marchome_done");
			$namw=$userc."_done";
			mysqli_query($con,"INSERT INTO $namw VALUES ('','$dayhj',' changed his height and weight max to: $height & $weight')");
			echo'<li><span id=sccmsg>Changes will be made soon...</span></li>';
			echo"<META HTTP-EQUIV='refresh' CONTENT='1; URL=settings.php?view=$user'>";

}

?>
			<li>
<p id="settingstitle">Change your password</p>
<form method="POST" action= <?php echo "settings.php?view=$user" ?> >
<label for="oldpassword">Old Password: </label><input type="password" name="oldpass">
<label for="password">New Password: </label><input type="password" name="pass">
<label for="repassword">Confirm New Password: </label><input type="password" name="repass">
<input id="button" type="submit" id="button" name="changepass" value="Change my password"/>
</form>
</li>
<li>
<p id="settingstitle">Update your maxes</p>
<form method="POST" action=<?php echo "settings.php?view=$user" ?>>
<label for="bench">Your new bench press weight: </label><input type="text" name="bench" value=<?php $result = mysqli_query($con,"SELECT maxbench FROM users WHERE user='$user'");
while($row = mysqli_fetch_array($result))
  {
  echo $row['maxbench'];}?>>
<label for="squat">Your new squat weight: </label><input type="text" name="squat" value=<?php $result = mysqli_query($con,"SELECT maxsquat FROM users WHERE user='$user'");
while($row = mysqli_fetch_array($result))
  {
  echo $row['maxsquat'];
  }
?>>
<input id="button" type="submit" id="button" name="changemax" value="Change my max"/>
</form>
</li>
<li>
<p id="settingstitle">Change your height and weight</p>

<form action=<?php echo "settings.php?view=$user" ?> method="POST">
	<label for="height">Your new height (in): </label><input type="text" name="height" value=<?php $result = mysqli_query($con,"SELECT height FROM users WHERE user='$user'");
while($row = mysqli_fetch_array($result))
  {

  echo $row['height'];

}?>>
<label for="weight">Your new weight(lbs): </label><input type="text" name="weight" value=<?php $result = mysqli_query($con,"SELECT weight FROM users WHERE user='$user'");
while($row = mysqli_fetch_array($result))
  {
  echo $row['weight'];
  }
?>>
<input id="button" type="submit" id="button" name="changehw" value="Change my stats"/>
</form>
</div>
		</div>
	</div>
</body>
</html>
