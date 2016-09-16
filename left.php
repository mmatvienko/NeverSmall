<?php
date_default_timezone_set('America/Chicago');
echo'<div id="leftcard" >';
$username=$_GET['view'];
$usersesh=$_SESSION['zuser']; 
$check_username=mysqli_query($con, "SELECT * FROM users WHERE user='$username'");

while($row=mysqli_fetch_assoc($check_username)){
$user=$row['user'];
$first=$row['firstname'];
$last=$row['lastname'];
$age=$row['age'];
$weight=$row['weight'];
$height=$row['height'];
$maxbench =$row['maxbench'];
$maxsquat =$row['maxsquat'];
}
$height1=intval($height/12);
$_SESSION['lheight'] = $height1."'".($height-$height1*12).'"';
if(!isset($first)){
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=logout.php">';
exit();
}
else{
//basic info right below
echo'<div id="lefttitle">'.$first." ".$last.'</div><br />';
echo'<div id="leftlabel">Age: '.$age."<br />Height: ".$_SESSION['lheight']."<br />";
echo'Bench press max: '.$maxbench.'lbs<br />Squat max: '.$maxsquat.'lbs'."<br />";
echo'All this while ';

if($weight<$maxbench&&$maxbench<$maxsquat){
	echo'only ';
}
echo'weighing '.$weight."lbs";
if($weight<$maxbench&&$maxbench<$maxsquat){
	echo'!'."<br /><br /></div>";
}
else{
	echo''."<br /><br /></div>";
}
//echoing the date
echo'<div id="leftdate">Today is the ';$day=date("d"); echo $day; switch ($day) {
	case '1':
		echo'st';
		break;
	
	case '2':
		echo'nd';
		break;

	case '3':
		echo'rd';
		break;
	case '21':
		echo'st';
		break;
	
	case '22':
		echo'nd';
		break;

	case '23':
		echo'rd';
		break;
	case '31':
		echo'st';
		break;
	default:
		echo'th';
		break;
} echo' of '.date("M")." ".date("Y")."."."</div>";
//echo"<br />checks  name in db from url ";
}


echo'</div>';
?>
