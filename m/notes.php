<!DOCTYPE html> 
<html> 
<head> 
	<title>Notes</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.0-beta.1/jquery.mobile-1.3.0-beta.1.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0-beta.1/jquery.mobile-1.3.0-beta.1.min.css" />
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head> 

<body> 
<div data-role="page" >

		<?php 
require 'logged.php';
include('../connect_to_mysql.php');
include '../functions.php';
ini_set('session.cookie_httponly', true);
		include'leftpanel.php';
		 include'rightpanel.php'; 
		?>
					<div data-role="header">
						<a href="#leftpanel">Menu</a>
					<h1>Notes</h1>
						<a href="#rightpanel">Me</a>
					</div>

	<div data-role="content">
	<script type="text/javascript" src="js/mainjs.js"></script>
		<form method="POST" action=<?php "/notes.php?view=".$_SESSION['user'] ?> >
	<?php 
	if($_GET['view']==$_SESSION['zuser']){
		echo'<textarea name = "notes" id="notes" type ="text" >';
	}
		if($_GET['view']!==$_SESSION['zuser']){
		echo'<label name = "notes" id="notes" type ="text" >';
	}
	$user=$_GET['view'];
	$user_db=str_replace(".", "", $user);
	$user_db=$user_db.$last;
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
	echo'<input type="submit" name="submit" value="Save" id="button"/>';
	echo'<div type="button" data-role="button" id="button1" data-mini="true">Add a day</div>';
		}
	?>
</form>
<?php
 if(isset($_POST['submit'])){
 	$con = mysqli_connect("localhost","marchome_marc","password","marchome_notes");
 	$namw=$user_db."_notes";
 	$post=$_POST['notes'];
 	$post=htmlentities($post);
 	mysqli_query($con,"UPDATE $namw SET entry='$post' WHERE id=1 ");
 	
 }
?>
</div>
</div>
</body>
</html>
