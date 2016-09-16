<?php 
require'logged.php';
include("header.php");
include 'create_all_session.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
	<table id="maint">
		<tr>
			<td id="left">
			<?php 
			include'left.php'; 
			?>
			</td>
			<td id="middle">
				<table id="centertable">
					<thead>
					<tr><td>
					<div id='pagetitle'>Track your progress	</div>
					<hr width="75%" color="#ae161a"/>
					</td></tr>
					</thead>
					<tbody>
							<?php
							$user=$_GET['view'];
				$user_db=str_replace(".", "", $user);
				$user_db=$user_db.$last;
				$namw=$user_db."_done";
				$con=mysqli_connect("localhost","marchome_marc","password","marchome_done");
					$result = mysqli_query($con,"SELECT * FROM $namw ORDER BY time DESC");
					
					for($i=0; $i<15; $i++)
						
					  {
					  	if($row = mysqli_fetch_array($result)){
					  	$nday=$row['time'];
					  	$nday=date("m/d/Y",strtotime($nday));

					  	if($_SESSION['user']===$_GET['view']){		
					  		$msg=$row['message'];
					  		$msg=str_replace("his","your",$msg);

					  	echo"<tr><td id='label'>"."You " .$msg."<label id='sccmsg'> ".$nday."</label><hr></td></tr>";

					  	}
					  	elseif($_SESSION['user']!==$_GET['view']){
					  		$msg=$row['message'];
					  		$msg=str_replace("his","their",$msg);
					  	echo"<tr><td id='label'>". $first." ".$last." ". $msg."<label id='sccmsg'> ".$nday."</label><hr></td></tr>";

					  	}
						}					  
					  }
				?>
				</tbody>
				</table>
			</td>
			<td id="right"></td>
		</tr>
	</table>
</body>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/indexjs.js"></script>
</html>
