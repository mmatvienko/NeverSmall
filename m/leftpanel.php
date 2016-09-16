<div data-role="panel" id="leftpanel" data-position="left" data-display="push">
<title>NeverSmall</title>
<?php  
include('connect_to_mysql.php');
$sessionuser="";
$sessionuser= $_SESSION['zuser'];
?>
<ul data-role="listview">
	<li><?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='home.php?view=$sessionuser'>Home</a>";
			}	
			else{
				echo"<a href='home.php'>Home</a>";
			}
			?>
	
		<li><?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='search.php?view=$sessionuser'>Search</a>";
			}	
			else{
				echo"<a href='search.php'>Search</a>";
			}
			?></li>
	</li>
	
	<li><?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='workout.php?view=$sessionuser'>Workout</a>";
			}
			else{
				echo"<a href='workout.php'>Workout</a>";
			}
			?>
		
			<li>
			<?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='add_workout.php?view=$sessionuser' data-ajax='false'>Add a new workout</a>";
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
				echo "<a href='notes.php?view=$current' data-ajax='false'>Notes</a>";
			}
			else{
				echo"<a href='notes.php'>Notes</a>";
			}
			?></li>
	</li>
		
	<li><?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='settings.php?view=$sessionuser'>Settings</a>";
			}
			else{
				echo"<a href='settings.php'>Settings</a>";
			}
			?>
	
						<li><?php
			if (isset($_GET['view'])) {
				$current=$_GET['view'];
				echo "<a href='help.php?view=$current'>Help</a>";
			}
			else{
				echo"<a href='help.php'>Help</a>";
			}
			?></li>
	
		</li>
	<li><a href="logout.php">Logout</a></li>
</ul>
</div>
