<?php
require'logged.php';
require 'url_vs_sesh.php';
include("header.php");
include 'functions.php';
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
<table>
<tr>
<td id="left"><?php include'left.php';?></td>
<td id= "middle">
	<div id='pagetitle'>Add a friend's workout</div>
	<hr width='75%' color='#ae161a'/>
	<table id="settingstable"><tr><td>
	<form method="POST" action=<?php echo 'friends_workout.php?view='.$user; ?>>
		<label>Friend's username: </label>
		<input type="text" name="user"><br>
		<label>Name of workout (case sensitive): </label>
		<input type="text" name="workout"><br>
		<input id="button" type="submit" name="submit" value="Add" />
	</form>
	</td></tr>
	<tr><td>
		<div id="exist"><?php
			if($exist==2){
				echo"<span id='sccmsg'>The workout has been added!</span>";
			}
			elseif($exist==1){
				echo"<span id='errmsg'>That workout name hasn't been found!</span>";
			}
		?></div>
	</td></tr>
	</table>
</td>

</tr>
</table>

