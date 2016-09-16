<!DOCTYPE html> 
<html> 
	<head> 
	<title>Sign Up | NeverSmall</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
	<script type="text/javascript" src="js/mainjs.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head> 

<body> 
<div data-role="page">
	<div data-role="header" id="header">
		<a href="index.php">Log In</a>
		<h1>Sign Up</h1>
	</div>

	<div data-role="content">
<?php
$passmatch=""; 
$alreg=""; 
$succrea=""; 
?>
<?php
 include('../connect_to_mysql.php');
include('../functions.php'); 

						if(isset($_POST['submit'])){
							$first=$_POST['first'];
							$last=$_POST['last'];
							$first=ucwords(strtolower($first));
							$last=ucwords(strtolower($last));
							$age=$_POST['age'];

							
							//date in mm/dd/yyyy format; or it can be in other formats as well
        				    //yyyy/dd/mm
        				    $birthDate = $age;
        				    $dob=$age;
        				    //explode the date to get month, day and year
        				    $birthDate = explode("-", $birthDate);
        				    //get age from date or birthdate
        				  //  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y")-$birthDate[0])-1):(date("Y")-$birthDate[0]));
        				    

							$maxbench=$_POST['maxbench'];
							$maxsquat=$_POST['maxsquat'];
							$weight=$_POST['weight'];
							$user=$_POST['user'];
							$password=$_POST['password'];
							$height=$_POST['inches']+($_POST['feet']*12);
							$repassword=$_POST['repassword'];

							$salt1="curtainpeople";
							$salt1=md5($salt1);
							$salt2="bedbeats";
							$salt2=md5($salt2);
							$salt3="closetpillow";
							$salt3=md5($salt3);
							$password=$salt3.$password.$salt1;
							$password=md5($password.$salt2);
							$repassword=$salt3.$repassword.$salt1;
							$repassword=md5($repassword.$salt2);

							$check_username=mysqli_query($con, "SELECT user FROM users WHERE user='$user'");
							$numrows_username=mysqli_num_rows($check_username);

							if($numrows_username!=0){
								$alreg=1;
							}

							elseif($first==""||$last==""||$user==""||$password==""||$age==""||$weight==""||$height==""||$maxbench==""||$maxsquat==""||$repassword==""){
								$passmatch=1;
							}

							elseif (($first!=""&&$last!=""&&$user!=""&&$password!=""&&$age!=""&&$weight!=""&&$height!=""&&$maxbench!=""&&$maxsquat!=""&&$repassword!="")&&($password==$repassword)) {
								$safeuser=safe($user);
								
								 mysqli_query($con,"INSERT INTO users (id,firstname, lastname, user, password, dob, age, weight, height, maxbench, maxsquat, safeuser) 
								 VALUES ('','$first','$last','$user','$password','$dob','$age','$weight','$height','$maxbench','$maxsquat','$safeuser')");
										$user_db=str_replace(".", "", $user);
										$user_db=$user_db.$last;
										$date=date("Y-m-d");
								 		#$con=mysqli_connect("localhost","root","root","$user_db");
								 		$con=mysqli_connect("localhost","marchome_marc","password","marchome_creation_date");
								 		$namw=$user_db."_"."creation_date";
										$sql = "CREATE TABLE $namw (id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id),time DATE,finish_time DATE,name VARCHAR(15),weeks INT)";
										mysqli_query($con,$sql);
										
										$con=mysqli_connect("localhost","marchome_marc","password","marchome_done");
								 		$namw=$user_db."_"."done";
										$sql = "CREATE TABLE $namw (id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id),time DATE,message VARCHAR(800))";
										mysqli_query($con,$sql);
										
										$con=mysqli_connect("localhost","marchome_marc","password","marchome_maxbench");
								 		$namw=$user_db."_"."maxbench";
										$sql = "CREATE TABLE $namw (id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id),time DATE,weight INT)";
										mysqli_query($con,$sql);
										mysqli_query($con,"INSERT INTO $namw (id, time, weight) VALUES ('','$date','$maxbench')");
										
										$con=mysqli_connect("localhost","marchome_marc","password","marchome_maxsquat");
								 		$namw=$user_db."_"."maxsquat";
										$sql = "CREATE TABLE $namw (id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id),time DATE,weight INT)";
										mysqli_query($con,$sql);
										mysqli_query($con,"INSERT INTO $namw (id, time, weight) VALUES ('','$date','$maxsquat')");
										
										$con=mysqli_connect("localhost","marchome_marc","password","marchome_checkfinish");
								 		$namw=$user_db."_"."checkfinish";
										$sql = "CREATE TABLE $namw (id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id),name VARCHAR(32),daysleft INT,doneclick INT, done VARCHAR(3))";
										mysqli_query($con,$sql);
										/////////////////
										
										$con=mysqli_connect("localhost","marchome_marc","password","marchome_height");
								 		$namw=$user_db."_"."height";
										$sql = "CREATE TABLE $namw (id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id),time DATE,height INT)";
										mysqli_query($con,$sql);
										mysqli_query($con,"INSERT INTO $namw (id, time, height) VALUES ('','$date','$height')");
										
										$con=mysqli_connect("localhost","marchome_marc","password","marchome_weight");
								 		$namw=$user_db."_"."weight";
										$sql = "CREATE TABLE $namw (id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id),time DATE,weight INT)";
										mysqli_query($con,$sql);
										mysqli_query($con,"INSERT INTO $namw (id, time, weight) VALUES ('','$date','$weight')");
										/////////////////////////
										
										$con=mysqli_connect("localhost","marchome_marc","password","marchome_done");
								 		$namw=$user_db."_"."done";
										mysqli_query($con,"INSERT INTO $namw (id, time, message) VALUES ('','$date',' joined NeverSmall')");

										$con=mysqli_connect("localhost","marchome_marc","password","marchome_log");
								 		$namw=$user_db."_"."log";
										$sql="CREATE TABLE $namw (regular VARCHAR(30),proxy VARCHAR(30),time VARCHAR(30),login VARCHAR(30))";
										mysqli_query($con,$sql);	
										$regular = $_SERVER['REMOTE_ADDR'];
										if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
										$proxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
									}else{
										$proxy = "n/a";
									}
										$time = $_SERVER['REQUEST_TIME'];
										$time = date('l, F j, Y g:i a', $time);
										$login="true";						 		
										mysqli_query($con,"INSERT INTO $namw (regular, proxy, time, login) VALUES ('$regular','$proxy','$time','$login')");
										$email=$first.' '.$last.' joined NeverSmall. Their user name is: '.$user;
										mail('marc.m.home@gmail.com','NeverSmall',$email);
										echo "<META HTTP-EQUIV='Refresh' Content='0; URL=index.php'>";

							}

							elseif (($first!=""&&$last!=""&&$user!=""&&$password!=""&&$age!=""&&$weight!=""&&$height!=""&&$maxbench!=""&&$maxsquat!=""&&$repassword!="")&&($password!=$repassword)) {
								$passmatch=1;
							}
						}

					?>
		<form method="POST" action="signup.php" data-ajax="true">
							<?php

					if($passmatch==1){
						echo "<p id='errmsg'> Please fill out all the fields and allow the passwords to match. </p>";
					}
					if($alreg==1){
						echo "<p id='errmsg'> That user has already been registered. </p>";
					}
					if($succrea==1){
						 echo "<p id='sccmsg'> Your user was created successfully. </p>";
					}
				?>
					<tr>
					<td>
						<label for="first"><strong>First Name</strong></label>
						<input type="text" name="first" id="first"/>
					</td>
					<td>
						<label id = "darktitle" for="age"><strong>Date of Birth</strong></label><br />
						<input type="date" name="age"/>
					</td>
					</tr>

					<tr>
					<td>
						<label for="last"><strong>Last Name</strong></label><br />
						<input type="text" name="last" />
					</td>
					<td>
						<label id = "darktitle" for="weight"><strong>Weight (lbs)</strong></label><br />
						<input type="text" name="weight" />
					</td>
					</tr>

					<tr>
					<td>
						<label for="user"><strong>User</strong></label><br />
						<input type="text" name="user" />
					</td>
					<td>
						<label id = "darktitle" for="height"><strong>Height</strong></label><br />
						<label id = "darktitle">ft.</label>
						<select name="feet" >
							<option value = "4">4</option>
							<option value = "5">5</option>
							<option value = "6">6</option>
							<option value = "7">7</option>
						</select><label id = "darktitle">in.</label>
						<select name="inches" >
							<option value = "0">0</option>
							<option value = "1">1</option>
							<option value = "2">2</option>
							<option value = "3">3</option>
							<option value = "4">4</option>
							<option value = "5">5</option>
							<option value = "6">6</option>
							<option value = "7">7</option>
							<option value = "8">8</option>
							<option value = "9">9</option>
							<option value = "10">10</option>
							<option value = "11">11</option>
						</select>
					</tr>

					<tr>
					<td>
						<label for="password"><strong>Password

						<div id="errmsg">
						<div id="valsbad"></div>
						</div>
						<div id="sccmsg">
						<div id="valsgood"></div>
						</div>
	
						<div id="errmsg">
						<div id="passbad"></div>
						</div>
						<div id="sccmsg">
						<div id="passgood"></div>
						</div>
						</strong>
				</label>
			<input id="pass" type="password" name="password" />
					</td>
					<td>
						<label id = "darktitle" for="maxbench"><strong>Max Bench(lbs)</strong></label><br />
						<input type="text" name="maxbench" />
					</td>
					</tr>

					<tr>
					<td>
						<label for="repassword"><strong>Re-enter Password</strong></label><br />
						<input id="repass" type="password" name="repassword" />
					</td>
					<td>
						<label id = "darktitle" for="maxsquat"><strong>Max Squat(lbs)</strong></label><br />
						<input type="text" name="maxsquat" />
					</td>
					</tr>

					<tr>
					<td>
						
					</td>
					<td>
						<input type="submit" name="submit" value="Submit" id="button" />
					</td>
					</tr>
					</form>		
	</div>
</div>
</body>
</html>
