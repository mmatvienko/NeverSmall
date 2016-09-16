<!DOCTYPE html> 
<html> 
<head> 
	<title>Add a friend's</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0-beta.1/jquery.mobile-1.3.0-beta.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/mainjs.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<script src="http://code.jquery.com/mobile/1.3.0-beta.1/jquery.mobile-1.3.0-beta.1.min.js"></script>
</head> 

<body> 
	<div data-role="page" >

		<?php 
		require'logged.php';
require 'url_vs_sesh.php';
include 'functions.php';

		include'leftpanel.php';
		 include'rightpanel.php'; 
		?>
					<div data-role="header">
						<a href="#leftpanel">Menu</a>
					<h1>Add a friend's</h1>
						<a href="#rightpanel">Me</a>
					</div>

	<div data-role="content">
		<?php
$exist= 0;
if(isset($_POST['submit'])){
	$want_user=$_POST['user'];
	$want_woname=$_POST['workout'];
	$workout_name=$_POST['workout'];
	$result=mysqli_query($con,"SELECT * FROM users WHERE user='$want_user'");
	$row = mysqli_fetch_array($result);
	$want_last= $row['lastname'];
		$want_user_db=str_replace(".", "", $want_user);
		$want_user_db=$want_user_db.$want_last;
		$want_wo=$want_user_db.'_'.$want_woname;
	$org_user=$_GET['view'];
	$result=mysqli_query($con,"SELECT * FROM users WHERE user='$org_user'");
	$row = mysqli_fetch_array($result);
	$org_last= $row['lastname'];
		$org_user_db=str_replace(".", "", $org_user);
		$org_user_db=$org_user_db.$org_last;
		$org_woname=$org_user_db.'_'.$want_woname;
	$con=mysqli_connect("localhost","marchome_marc","password","marchome_woex");
		$check = mysqli_query($con,"SELECT * FROM $want_wo");
		if($check==false){
			$exist = 1;
		}elseif($check==true){
		mysqli_query($con, "CREATE TABLE $org_woname AS (SELECT * FROM $want_wo);");
	$con=mysqli_connect("localhost","marchome_marc","password","marchome_checkfinish");
		$want_chk=$want_user_db.'_checkfinish';
		$org_chk=$org_user_db.'_checkfinish';
		mysqli_query($con, "INSERT INTO $org_chk SELECT * FROM $want_chk WHERE name='$workout_name'");
	$con=mysqli_connect("localhost","marchome_marc","password","marchome_creation_date");
		$want_crt=$want_user_db.'_creation_date';
		$org_crt=$org_user_db.'_creation_date';
		mysqli_query($con, "INSERT INTO $org_crt SELECT * FROM $want_crt WHERE name='$workout_name'");
			$exist = 2;
		}




$con=mysqli_connect("localhost","marchome_marc","password","marchome_workout");
}
?>
		<div id="exist"><?php
			if($exist==2){
				echo"<span id='sccmsg'>The workout has been added!</span>";
			}
			elseif($exist==1){
				echo"<span id='errmsg'>That workout name hasn't been found!</span>";
			}
		?></div>
	<form method="POST" action=<?php echo 'friends_workout.php?view='.$user; ?>>
		<label>Friend's username: </label>
		<input type="text" name="user"><br>
		<label>Name of workout (case sensitive): </label>
		<input type="text" name="workout"><br>
		<input id="button" type="submit" name="submit" value="Add" />
	</form>

	</div>
	</div>
</body>
</html>
