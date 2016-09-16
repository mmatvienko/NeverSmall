<?php 
require 'logged.php';
include('../connect_to_mysql.php');
include '../functions.php';
ini_set('session.cookie_httponly', true);
?>
<!DOCTYPE html> 
<html> 
<head> 
	<title>Stats</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0-beta.1/jquery.mobile-1.3.0-beta.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.0-beta.1/jquery.mobile-1.3.0-beta.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head> 

<body> 
<div data-role="page">
		<?php 
		include'leftpanel.php';
		 include'rightpanel.php'; 
		?>
					<div data-role="header">
						<a href="#leftpanel">Menu</a>
					<h1>Stats</h1>
						<a href="#rightpanel">Me</a>
					</div>
	<div data-role="content">
		<div></div>
		<div data-role="controlgroup">
			<div data-role="collapsible" data-corners="false" data-inset="false">
 		 	 <h3>Bench Max</h3>
 		 	 <div data-role="listview">
   									<?php
						$user=str_replace(".", "", $user);
						$user_c=$user.$last;
							$con=mysqli_connect("localhost","marchome_marc","password","marchome_maxbench");
							$namw=$user_c."_maxbench";
							$result = mysqli_query($con,"SELECT * FROM $namw ORDER BY time DESC");
							while($row = mysqli_fetch_array($result))
  							{
  							echo "<li  id='centeralign'  id='centeralign'>";
							echo "<span id='stattd'>" . $row['weight']."lbs ";
							echo"on the </span>";
							echo $row['time'] = "<span id='sccmsg'>".date('d/M/Y', strtotime($row['time']))."</span>";

 							
  							echo "</li>";
  							}
						?>
					</div>
			</div>

			<div data-role="collapsible" data-corners="false" data-inset="false">
		   <h3>Squat Max</h3>
		   <div data-role="listview">
 			 						<?php
							$con=mysqli_connect("localhost","marchome_marc","password","marchome_maxsquat");
							$namw=$user_c."_maxsquat";
							$result = mysqli_query($con,"SELECT * FROM $namw ORDER BY time DESC");
							while($row = mysqli_fetch_array($result))
 							{
 							echo "<li  id='centeralign'>";
							echo "<span id='stattd'>" . $row['weight']."lbs ";
							echo"on the </span>";
							$row['time'] = "<span id='sccmsg'>".date('d/M/Y', strtotime($row['time']))."</span>";
 							echo $row['time'] . "</td>";
 							echo "</li>";
 							}
						?>
					</div>
			</div>

			<div data-role="collapsible" data-corners="false" data-inset="false">
		   <h3>Weight</h3>
		   <div data-role="listview">
 			 						<?php
						$user=str_replace(".", "", $user);
						$user_c=$user.$last;
							$con=mysqli_connect("localhost","marchome_marc","password","marchome_height");
							$namw=$user_c."_height";
							$result = mysqli_query($con,"SELECT * FROM $namw ORDER BY time DESC");
							while($row = mysqli_fetch_array($result))
  							{
  							echo "<li  id='centeralign'>";
  							$row['height'];
  							$height1=intval($row['height']/12);
							$lheight = $height1."'".($row['height']-$height1*12).'"';
							echo "<span id='stattd'>" . $lheight;
							echo"on the </span>";
							echo $row['time'] = "<span id='sccmsg'>".date('d/M/Y', strtotime($row['time']))."</span>";

 							
  							echo "</li>";
  							}
						?>
					</div>
			</div>

			<div data-role="collapsible" data-corners="false" data-inset="false">
		   <h3>Height</h3>
		   <div data-role="listview">
 			 <?php
							$con=mysqli_connect("localhost","marchome_marc","password","marchome_weight");
							$namw=$user_c."_weight";
							$result = mysqli_query($con,"SELECT * FROM $namw ORDER BY time DESC");
							while($row = mysqli_fetch_array($result))
 							{
 							echo "<li  id='centeralign'>";
							echo "<span id='stattd'>" . $row['weight']."lbs ";
							echo"on the </span>";
							$row['time'] = "<span id='sccmsg'>".date('d/M/Y', strtotime($row['time']))."</span>";
 							echo $row['time'] . "</td>";
 							echo "</li>";
 							}
						?>
					</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
Viewpo
