<!DOCTYPE>
<link rel="icon" type="image/png" href="Bodybuilder.png">
<link rel="stylesheet" type="text/css" href="style/headerstyle.css">
<meta name="viewport" content="width=device width, initial-scale=0.5">
<title>NeverSmall</title>
<?php  include('connect_to_mysql.php');
$sessionuser="";
$sessionuser= $_SESSION['zuser'];
?>
<div class="table">
<ul>
	<li><?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='home.php?view=$sessionuser'>Home</a>";
			}	
			else{
				echo"<a href='home.php'>Home</a>";
			}
			?>
	<ul>
		<li><?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='search.php?view=$sessionuser'>Search for people</a>";
			}	
			else{
				echo"<a href='search.php'>Search for people</a>";
			}
			?></li>
	</li>
	</ul>
	<li><?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='workout.php?view=$sessionuser'>Workout</a>";
			}
			else{
				echo"<a href='workout.php'>Workout</a>";
			}
			?>
		<ul>
			<li>
			<?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='add_workout.php?view=$sessionuser'>Add a new workout</a>";
			}
			else{
				echo"<a href='add_workout.php'>Add a new workout</a>";
			}
			?>
			</li>
			<li>
			<?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='friends_workout.php?view=$sessionuser'>Add a friend's workout</a>";
			}
			else{
				echo"<a href='friends_workout.php'>Add a friend's workout</a>";
			}
			?>
			</li>
			<li><?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='stats.php?view=$current'>Stats</a>";
			}
			else{
				echo"<a href='stats.php'>Stats</a>";
			}
			?></li>
			<li><?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='notes.php?view=$current'>Notes</a>";
			}
			else{
				echo"<a href='notes.php'>Notes</a>";
			}
			?></li>
	</li>
		</ul>
	<li><?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='settings.php?view=$sessionuser'>Settings</a>";
			}
			else{
				echo"<a href='settings.php'>Settings</a>";
			}
			?>
			<ul>
						<li><?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='help.php?view=$current'>Help</a>";
			}
			else{
				echo"<a href='help.php'>Help</a>";
			}
			?></li>
			</ul>
		</li>
	<li><a href="logout.php">Logout</a></li>
</ul>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/indexjs.js"></script>
<link rel="stylesheet" type="text/css" href="style/style.css">
