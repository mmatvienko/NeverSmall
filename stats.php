<?php
require'logged.php';
//require 'url_vs_sesh.php';
include("header.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
	<table >
		<tr>
			<td id="left">
			<?php
			include'left.php';
			?>

			</td>
			<td id="middle">

				<table id="stats">
					<head>
					<div id='pagetitle'>Track your progress	</div>
					<hr width="75%"color="#ae161a"/>
					</head>
					<tr>
						<td id="centrstat">Bench Press Max</td>
						<td id="centrstat">Squat Max</td>
					</tr>
					<tr>
						<td>
					<table id="borderstat">
						
						<?php
						$user=str_replace(".", "", $user);
						$user_c=$user.$last;
							$con=mysqli_connect("localhost","marchome_marc","password","marchome_maxbench");
							$namw=$user_c."_maxbench";
							$result = mysqli_query($con,"SELECT * FROM $namw ORDER BY time DESC");
							while($row = mysqli_fetch_array($result))
  							{
  							echo "<tr>";
							echo "<td id='stattd'>" . $row['weight']."lbs ";
							echo"on the ";
							echo $row['time'] = date('d/M/Y', strtotime($row['time']));

 							
  							echo "</tr>";
  							}
						?>
					</table>
					</td>
					<td>
						<table id="borderstat">
						<?php
							$con=mysqli_connect("localhost","marchome_marc","password","marchome_maxsquat");
							$namw=$user_c."_maxsquat";
							$result = mysqli_query($con,"SELECT * FROM $namw ORDER BY time DESC");
							while($row = mysqli_fetch_array($result))
 							{
 							echo "<tr>";
							echo "<td id='stattd'>" . $row['weight']."lbs ";
							echo"on the ";
							$row['time'] = date('d/M/Y', strtotime($row['time']));
 							echo $row['time'] . "</td>";
 							echo "</tr>";
 							}
						?>
						</table>
					</td>
					</tr>

							<tr>
						<td id="centrstat">Height</td>
						<td id="centrstat">Weight</td>
					</tr>
					<tr>
						<td>
					<table id="borderstat">
						
						<?php
						$user=str_replace(".", "", $user);
						$user_c=$user.$last;
							$con=mysqli_connect("localhost","marchome_marc","password","marchome_height");
							$namw=$user_c."_height";
							$result = mysqli_query($con,"SELECT * FROM $namw ORDER BY time DESC");
							while($row = mysqli_fetch_array($result))
  							{
  							echo "<tr>";
  							$row['height'];
  							$height1=intval($row['height']/12);
							$lheight = $height1."'".($row['height']-$height1*12).'"';
							echo "<td id='stattd'>" . $lheight;
							echo"on the ";
							echo $row['time'] = date('d/M/Y', strtotime($row['time']));

 							
  							echo "</tr>";
  							}
						?>
					</table>
					</td>
					<td>
						<table id="borderstat">
						<?php
							$con=mysqli_connect("localhost","marchome_marc","password","marchome_weight");
							$namw=$user_c."_weight";
							$result = mysqli_query($con,"SELECT * FROM $namw ORDER BY time DESC");
							while($row = mysqli_fetch_array($result))
 							{
 							echo "<tr>";
							echo "<td id='stattd'>" . $row['weight']."lbs ";
							echo"on the ";
							$row['time'] = date('d/M/Y', strtotime($row['time']));
 							echo $row['time'] . "</td>";
 							echo "</tr>";
 							}
						?>
						</table>
					</td>
					</tr>
				</table>
			</td>
			<td id="right"></td>
		</tr>
	</table>
</body>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/indexjs.js"></script>
		<script type="text/javascript" src="js/create_element.js"></script>
</html>
