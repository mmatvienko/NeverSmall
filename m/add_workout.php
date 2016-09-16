<!DOCTYPE html> 
<html> 
<head> 
	<title>Page Title</title> 
	
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

	<?php
$existalready =0;
$k=0;
		if(isset($_POST['day'])){
			$y=$k+1;
	echo"<p id='sccmsg'>Day $y has been added</p>";
		}
				
		if($existalready==1){
			echo"<p id='errmsg'> This workout already exists!</p>";
			}

	 if($existalready==2){
	echo"<p id='sccmsg'> Your workout has been added!</p>";
		}
	?>
<?php
include 'functions.php';

	if(isset($_POST['day'])){
		if(!isset($_SESSION['day'])){
		$_SESSION['day']=0;
		$_SESSION['nme']=sfmsg($_POST['name']);
		$_SESSION['wek']=sfmsg($_POST['weeks']);

	}
	
	$k=$_SESSION['day'];

	for($i=0;$i<100;$i++){
		if(isset($_POST["set$i"])){
			$setarray[$i] = $_POST["set$i"];
			//echo $setarray[$i]."<br />";
			$exercisearray[$i] = $_POST["exercise$i"];
			//echo $exercisearray[$i]."<br />";
	}
}

		$_SESSION["seta$k"]=$setarray ;
		$_SESSION["exercisea$k"]=$exercisearray;	
		$_SESSION['k']=$k;
		$_SESSION['day']++;
	}


?>
<?php
if(isset($_POST['submit'])){
$date = date("Y-m-d");

$name=$_POST['name'];
$weeks=$_POST['weeks'];
$last = $_SESSION['last'];
$user=$_SESSION['user'];
$user_db=str_replace(".", "", $user);
$user_db=$user_db.$last;

$con=mysqli_connect("localhost","marchome_marc","password","marchome_creation_date");
$namw= $user_db."_creation_date";
$result = mysqli_query($con, "SELECT * FROM $namw WHERE name='$name'");
$row=mysqli_fetch_array($result);
$foundname = $row['name'];
if($name!=$foundname){

mysqli_query($con,"INSERT INTO $namw (id,name,weeks) 
VALUES ('','$name','$weeks')");
//checks for longest array
$k=$_SESSION['k'];

for ($y=0; $y<=$k ;$y++) { 
	$le=count($_SESSION["seta$y"]);
	
	$z=$y;
	$le1=count($_SESSION["seta$z"]);
	if($le1>$le){
		$_SESSION['large']=$le1;

	}
	elseif($le1==$le){
		$_SESSION['large']=$le1;
	}

}

//echo $_SESSION['large'].'is the longest length of an array'."<br />";
$stringz="";
$stringx="";
$con=mysqli_connect("localhost","marchome_marc","password","marchome_woex");
for($we=0;$we<$_SESSION['large'];$we++){

$qw=",exercise$we VARCHAR(30)";
$er= ",set$we VARCHAR(30)";

$stringz=$stringz.$qw.$er;

}
for($we=1;$we<$_SESSION['large'];$we++){
$as=",exercise$we";
$df=",set$we";
//is used for naming the collumns to assign the new exercises
$stringx=$stringx.$as.$df;
}

$namw=$user_db."_"."$name";
$sql = "CREATE TABLE $namw
(
id INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id)
$stringz
)";
mysqli_query($con,$sql);

$sadd="";
//now assign all the fields a value
	for ($i=0; $i<=$k ; $i++) { 
		$length= count($_SESSION["seta$i"]);
		$array=$_SESSION["seta$i"];
		$array1=$_SESSION["exercisea$i"];
			for ($x=0; $length>$x ; $x++) { 
				$add= ","."'".$array1[$x]."'".","."'".$array[$x]."'";
				$sadd=$sadd.$add;
			}
			$_SESSION["$i"] =$sadd;
			$sadd="";
	}

	for ($i=0; $i<=$k; $i++) { 
		//echo $_SESSION["$i"]."<br />";
}

for($i=0; $i<=$k; $i++){
$zxc=$_SESSION[$i];

mysqli_query($con,"INSERT INTO $namw (id,exercise0,set0$stringx) 
VALUES (''$zxc)");

}
$togo = 7*$weeks;
//maybe remove seems useless now if remove  the table on workout.php wont work
$con=mysqli_connect("localhost","marchome_marc","password","marchome_checkfinish");
$namw= $user_db."_checkfinish";
mysqli_query($con,"INSERT INTO $namw (id,name,daysleft,doneclick,done) 
VALUES ('','$name','$togo','0','no')");
$dayhj=date("Y-m-d");
$con=mysqli_connect("localhost","marchome_marc","password","marchome_done");
$namw= $user_db."_done";
mysqli_query($con,"INSERT INTO $namw VALUES ('','$dayhj',' added another workout')");
mysqli_close($con);
	$existalready=2;
	}
}
else{
	$existalready=1;
}
?>

<div id="stopflow" >
	<form method='POST' action=<?php $user=$_SESSION['user']; echo"add_workout.php?view=$user"?> data-ajax="false">
	<table id='centertable'>
		<thead>
			<tr>
			<td id="centertxt">
				<label for="name">Name of your workout: </label>
		
				<input type="text" name="name" value=<?php if(!isset($_SESSION['nme'])){echo'';} else{echo $_SESSION['nme'];}?>>
			</td>
			</tr>

		</thead>
		<tr id="centr">
			<td>
				<label for="example">Fill the forms below in like this:</label>
			</td>
		</tr>
		<tr id="centr">
			<td id="centr">
				<label ><i>Exercise: Exercise(Reps) e.g. Curls(6-8)<i></label> <br/><label ><i>Sets: Amount of sets e.g. 3<i></label> 
			</td>
		</tr>
		<tr id="centr">
			<td>
				<label>For how many weeks would you like to do this workout: </label><input type="text" name="weeks" value=<?php if(!isset($_SESSION['wek'])){echo'';} else{echo $_SESSION['wek'];}?>>
				<br /><label><a href=<?php $user= $_GET['view']; echo'help.php?view='.$user; ?>>Having trouble creating a workout? Look at the help page.</a></label>
				<br /><label><a href=<?php $user= $_GET['view']; echo'friends_workout.php?view='.$user; ?>>Has a friend recommended a workout? Add it here!</a></label>

			</td>
		</tr>
			<table id="table_to_add">

			</table>


		</table>
	<div id="buttons_right">

	
	<input id="button" type="button" value="Add an exercise">
	<input id="button1" type="submit" value="Add this day to the list" name="day">
	<input id="button2" type="submit" value="Submit" name="submit">
	</div>
	</form>


</div>

		</div>
	</div>
	<script type="text/javascript" src="js/create_element.js"></script>
</body>
</html>
