<html>
<head>
	<title>Login | NeverSmall</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>

<div data-role="page">
<?php
session_start(); 
include('connect_to_mysql.php');
include 'functions.php';
ini_set('session.cookie_httponly', true);
$wronguser = "";
$wrongpass = "";
	if(isset($_COOKIE[safe("user")])){
		loggedincheck();	
	}
if(isset($_POST['user'])&&($_POST['password'])){

		sleep(1);
		$remember="";

		$user=$_POST['user'];
		$password=$_POST['password'];

		$salt1="curtainpeople";
		$salt1=md5($salt1);
		$salt2="bedbeats";
		$salt2=md5($salt2);
		$salt3="closetpillow";
		$salt3=md5($salt3);
		$password=$salt3.$password.$salt1;
		$password=md5($password.$salt2);
		$repassword="";
		$repassword=$salt3.$repassword.$salt1;
		$repassword=md5($repassword.$salt2);

		$check=mysqli_query($con, "SELECT user FROM users WHERE user='$user' ");
		$numrows= mysqli_num_rows($check);
		if($numrows != 1){
			$wronguser=1;
		}
		else{


			$checkp=mysqli_query($con, "SELECT *  FROM users WHERE password='$password' AND user='$user'");

			$xdr="";
			$last = "";
        	$userdb = "";
			$remember = "";
		while($row=mysqli_fetch_assoc($checkp)){
				$password_db=$row['password'];
				$user_db=$row['user'];
				$first_db=$row['firstname'];
				$last_db=$row['lastname'];
				$age_db=$row['age'];
				$weight_db=$row['weight'];
				$height_db=$row['height'];
				$id_db=$row['id'];
				$dob_db=$row['dob'];
				$maxbench_db =$row['maxbench'];
				$maxsquat_db =$row['maxsquat'];
				$xdr=$password_db;
			}
			if($xdr == $password){
				if(isset($_POST['remember'])){
				$remember=$_POST['remember'];
					if($remember=="on"){
						$userx = safe($user_db);
					setcookie(safe("user"),$userx,time()+31536000);
					setcookie(safe("password"),$password_db,time()+31536000);
					}
				}
				$_SESSION['password']=$password_db;
				$_SESSION['user']=$user_db;
				$_SESSION['zuser']=$user_db;
				$_SESSION['first']=$first_db;
				$_SESSION['last']=$last_db;
				$_SESSION['age']=$age_db;
				$_SESSION['weight']=$weight_db;
				$_SESSION['height']=$height_db; 
				$_SESSION['id']	=$id_db;
				$_SESSION['maxbench']=$maxbench_db;
				$_SESSION['maxsquat']=$maxsquat_db;
				$_SESSION['Authenticated']=1;
				$birthDate = $dob_db;
        		//explode the date to get month, day and year
        		$birthDate = explode("-", $birthDate);
        		//get age from date or birthdate
        		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y")-$birthDate[0])-1):(date("Y")-$birthDate[0]));
        		

				mysqli_query($con,"UPDATE users SET age=$age
				WHERE user='$user_db' AND lastname='$last_db'");
				//add all new databases here so that any user, old or new can access them

				$user=$_SESSION['zuser'];
				$orguser=$_SESSION['zuser'];
				$last=$_SESSION['last'];
				$user_db=str_replace(".", "", $user);
				$user_db=$user_db.$last_db;
				$namw=$user_db."_"."log";
				$result = mysqli_query($con,"SELECT safeuser FROM users WHERE user='$orguser'");
				$orgusersafe = safe($orguser);
				mysqli_query($con,"UPDATE users SET safeuser='$orgusersafe' WHERE user='$orguser'");

				$con=mysqli_connect("localhost","marchome_marc","password","marchome_notes");
				$namw=$user_db."_"."notes";
				$result = mysqli_query($con,"SELECT entry FROM $namw");
				
				if(false == $result){
					$sql = "CREATE TABLE $namw(id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id),entry VARCHAR(2147483647))";
					mysqli_query($con,$sql);
					$sql = "INSERT INTO $namw VALUES ('','Enter your notes here...')";
					mysqli_query($con,$sql);
				  }

				  $namw=$user_db."_"."log";
				$con=mysqli_connect("localhost","marchome_marc","password","marchome_log");
				$result = mysqli_query($con,"SELECT regular FROM $namw");
				
				if(false == $result){

				  }
				if(true==$result){
					$regular = $_SERVER['REMOTE_ADDR'];
					$proxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
					$time = $_SERVER['REQUEST_TIME'];
					$time = date('r', $time);
					$login="true";
					mysqli_query($con,"INSERT INTO $namw (regular, proxy, time, login) VALUES ('$regular','$proxy','$time','$login')");
				echo "<META HTTP-EQUIV='Refresh' Content='0; URL=home.php?view=$orguser'>"; 
				} 
			}
			else{
				$wrongpass=1;
			}

		}
	}
?>
	<div data-role="header" id="header">
		<a href="signup.php">Sign Up</a>
		<h1>Login</h1>
	</div>

	<div data-role="content">

		<form action="index.php" method="POST" data-ajax="true">
<table id="greattd">
	<tr>
	<td>
		<label for="user" ><strong>User</strong></label><br />
		<input type="text" name="user" />
	</td>
	
	<td>
		<label  for="password" id="darktitle"><strong>Password</strong></label><br />
		<input type="password" name="password" />
	</td>
	</tr>
	<tr>
	<td>
		<input type="submit" name="login" value="Login" id="button" />
	</td>
	<td>	
		<label for="remember">Remember Me
		<input type="checkbox" name="remember"  data-mini="true"/>
		 </label>
		</form>
	</td>
	</tr>
</table>

				<?php 
						if($wrongpass==1){
							echo'<div id=errmsg>Wrong password.</div>';
						}
						if($wronguser==1){
							echo'<div id=errmsg>Wrong user.</div>';
						}

				?>
	</div>
				<ol id="message">
				<div id="nvtitle">Get big with NeverSmall.</div>
				<li>Manage your workouts.</li>
				<li>Keep track of your progress.</li>
				<li>Watch your friends make progress.</li>
				<li>Make more gains than ever before.</li>
			</ol>
</div>

</body>
</html>
