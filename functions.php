<?php
$user="";
function loggedincheck(){
	$con=mysqli_connect("localhost","marchome_marc","password","marchome_workout");
	if(isset($_COOKIE[safe("user")])&&isset($_COOKIE[safe("password")])){
		$password = $_COOKIE[safe("password")];
		$safeuser = $_COOKIE[safe("user")];
		$result = mysqli_query($con,"SELECT user FROM users WHERE safeuser='$safeuser' AND password='$password'");
		
			$user="";
		$row = mysqli_fetch_array($result);
			$user = $row['user'];
			if($user!=""){
		header("Location: home.php?view=$user");
		$_SESSION['Authenticated']=1;
		$_SESSION['user']=$user;
		}
		else if(mysqli_fetch_array($result)==false){
		header("Location: index.php");
		}
	}
	else{
		header("Location: index.php");
	}
}
		

function safe($word){
				$salt1="curtainpeople";
		$salt1=md5($salt1);
		$salt2="bedbeats";
		$salt2=md5($salt2);
		$salt3="closetpillow";
		$salt3=md5($salt3);
		$word=$salt3.$word.$salt1;
		$word=md5($word.$salt2);
		return $word;
}
function user($name){
	//adds host user to name
	echo $name="marchome_".$name;
}
function sfmsg($message){
	$message = htmlentities($message);
	$message = mysql_real_escape_string($message);
	if(get_magic_quotes_gpc()){
		$message=stripslashes($message);
	}
	return $message;
}
function rndmstr()
{
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}
?>
