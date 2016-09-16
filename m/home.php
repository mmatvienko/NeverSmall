<?php 
require 'logged.php';
include('../connect_to_mysql.php');
include '../functions.php';
ini_set('session.cookie_httponly', true);
?>

<!DOCTYPE html> 
<html> 
<head> 
	<title>NeverSmall</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head> 

<body> 
<div data-role="page">

		<?php include'leftpanel.php';
		 include'rightpanel.php'; ?>
					<div data-role="header">
						<a href="#leftpanel">Menu</a>
					<h1>Progress</h1>
						<a href="#rightpanel">Me</a>
					</div>
	<div data-role="content">


					<ul data-role="listview" >
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

					  	echo"<li id='label'>"."You " .$msg."<label id='sccmsg'> ".$nday."</label></li>";

					  	}
					  	elseif($_SESSION['user']!==$_GET['view']){
					  		$msg=$row['message'];
					  		$msg=str_replace("his","their",$msg);
					  	echo"<li id='label'>". $first." ".$last." ". $msg."<label id='sccmsg'> ".$nday."</label></li>";

					  	}
						}					  
					  }
				?>

				</ul>
	</div>
</div>
</body>
</html>
