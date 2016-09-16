<?php
	require 'logged.php';
//require'url_vs_sesh.php';
include("header.php");
include 'functions.php';
$user=$_GET['view'];
$last=$_SESSION['last'];
$user_db=str_replace(".", "", $user).$last;
?>

<link rel="stylesheet" type="text/css" href="style/style.css">
<form method="POST" action=<?php "notes.php?view=".$_SESSION['user']."" ?>>
<table id="maint">
<tr>
<td id="left"><?php include 'left.php'; ?></td>
<td id="middle">
	<br />
	<div id='pagetitle'>Write some random stuff down</div>
	<hr width='75%' color='#ae161a'/><br />
	<?php 
	if($_GET['view']==$_SESSION['zuser']){
		echo'<textarea name = "notes" id="notes" type ="text" >';
	}
		if($_GET['view']!==$_SESSION['zuser']){
		echo'<label name = "notes" id="notes" type ="text" >';
	}
	$con = mysqli_connect("localhost","marchome_marc","password","marchome_notes");
 	$namw=$user_db."_notes";
 	$result = mysqli_query($con,"SELECT entry FROM $namw WHERE id=1");
 	while($row=mysqli_fetch_array($result)){
 	echo $row['entry'];
 	}
 	if($_GET['view']!==$_SESSION['zuser']){
		echo'</label>';
	}
 	if($_GET['view']==$_SESSION['zuser']){
 		echo'</textarea>';
	echo'<input type="submit" name="submit" value="Save" id="button" />';
	echo'<input type="button" name="day" value="Add date" id="button1" />';
		}
	?>
</form>
</td>
<td id="right"></td>
</tr>
</table>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/create_element.js"></script>
<script type="text/javascript" src="js/indexjs.js"></script>
<script type="text/javascript" src="js/sloganpos.js"></script>	
<?php
 if(isset($_POST['submit'])){
 	$con = mysqli_connect("localhost","marchome_marc","password","marchome_notes");
 	$namw=$user_db."_notes";
 	$post=$_POST['notes'];
 	$post=htmlentities($post);
 	mysqli_query($con,"UPDATE $namw SET entry='$post' WHERE id=1 ");
 	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=notes.php?view='.$_SESSION['zuser'].'">';
 }
?>
