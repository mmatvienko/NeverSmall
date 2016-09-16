<?php
require'logged.php';
require 'url_vs_sesh.php';
include("header.php");
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
	<table>
		<tr>
			<td id="left"><?php include'left.php';?></td>
			<td id="middle">

<div id='pagetitle'>Change your settings</div>
<hr width="75%" color="#ae161a"/>

<table id="settingstable">
	<thead><td>
		<div id="disabled">
<?php
echo'Name: '. $first.' '.$last.'<br />'.'User: '.$user.'<br />';

?>
</div>
</td></thead>
<tr><td>
<p id="settingstitle">Change your password</p>
<form method="POST" action= <?php echo "settings.php?view=$user" ?> >
<label for="oldpassword">Old Password: </label><input type="password" name="oldpass"><br />
<label for="password">New Password: </label><input type="password" name="pass"><br />
<label for="repassword">Confirm New Password: </label><input type="password" name="repass"><br />
<input id="button" type="submit" name="changepass" value="Change my password"/><br />
</form>
</td></tr>
<tr><td>
<p id="settingstitle">Update your maxes</p>
<form method="POST" action=<?php echo "settings.php?view=$user" ?>>
<label for="bench">Your new bench press weight: </label><input type="text" name="bench" value=<?php $result = mysqli_query($con,"SELECT maxbench FROM users WHERE user='$user'");
while($row = mysqli_fetch_array($result))
  {
  echo $row['maxbench'];}?>><br />
<label for="squat">Your new squat weight: </label><input type="text" name="squat" value=<?php $result = mysqli_query($con,"SELECT maxsquat FROM users WHERE user='$user'");
while($row = mysqli_fetch_array($result))
  {
  echo $row['maxsquat'];
  }
?>><br />
<input id="button" type="submit" name="changemax" value="Change my max"/>
</form>
</td></tr>
<tr><td>
<p id="settingstitle">Change your height and weight</p>

<form action=<?php echo "settings.php?view=$user" ?> method="POST">
	<label for="height">Your new height (in): </label><input type="text" name="height" value=<?php $result = mysqli_query($con,"SELECT height FROM users WHERE user='$user'");
while($row = mysqli_fetch_array($result))
  {

  echo $row['height'];

}?>><br />
<label for="weight">Your new weight: </label><input type="text" name="weight" value=<?php $result = mysqli_query($con,"SELECT weight FROM users WHERE user='$user'");
while($row = mysqli_fetch_array($result))
  {
  echo $row['weight'];
  }
?>><br />
<input id="button" type="submit" name="changehw" value="Change me"/>
</form>

<?php /*

</td></tr>
<tr><td>
<p id="settingstitle">Change who can't see your profile</p>
<form method="POST" action=<?php echo "settings.php?view=$user" ?>>
	<label for="users">Separate users with a space(john.b bob.j): </label>
	<input type="text" name="users" >
	<br />
	<input id="button" type="submit" name="seeme" value="Add"/>
</form>
</td></tr>
<tfoot>
<td>

 */?>


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
			echo'<p id=errmsg>Wrong old password.</p>';
		}
		elseif($repass==$pass){
			mysqli_query($con,"UPDATE users SET password='$pass'
			WHERE user='$user'");

			echo'<p id=sccmsg>Your password successfully been changed</p>';
		
			mysqli_close($con);

		}
		else{
			echo'<p id=errmsg>New passwords don\'t match.</p>';
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
			echo'<p id=sccmsg>Changes will be made soon...</p>';
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
			echo'<p id=sccmsg>Changes will be made soon...</p>';

}
///////////////////
/*
if(isset($_POST['seeme'])){
	$user = $_GET['view'];
	$userc=str_replace(".", "", $user);
	//$last = lcfirst($last);
	//echo $last;
	$userc=$userc.$last;
	$con_w_user=mysqli_connect("localhost","root","root","$userc");
	$entry=$_POST['users'];
	$entrx=explode(" ",$entry);

	for($i=0;isset($entrx[$i]); $i++){
		$vari= $entrx[$i];
		//echo $vari;
		mysqli_query($con_w_user,"INSERT INTO seeme (id, who) VALUES ('','$vari')");
	}
}*/
?>
</td>
</tfoot>
</table>


			</td>
			<td id="right"></td>
		</tr>
	</table>

</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/create_element.js"></script>
<script type="text/javascript" src="js/indexjs.js"></script>
</html>
