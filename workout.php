<?php
require 'logged.php';
require'url_vs_sesh.php';
include("header.php");

$user=$_SESSION['user'];
$last=$_SESSION['last'];
$user_db=str_replace(".", "", $user).$last;
//echo $userc;
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
	<table>
		<tr>
			<td id="left"><?php include'left.php';?></td>
			<td id="middle">


				<?php
			if(isset($_GET['wo'])&&$_GET['f']=='n'){
				$woname=$_GET['wo'];
				$dayz=date("Y-m-d");
				$con=mysqli_connect("localhost","marchome_marc","password","marchome_creation_date");
				$namw= $user_db."_creation_date";
				mysqli_query($con,"UPDATE $namw SET time='$dayz'
				WHERE name='$woname'");
				$result = mysqli_query($con,"SELECT * FROM $namw WHERE name='$woname'");
				while($row = mysqli_fetch_array($result)){
					$fn= $row['finish_time'];
					$tm= $row['time'];
					$wk= $row['weeks'];

				}
					$wk=$wk*7;

					$df= strtotime($fn)-strtotime($tm);
					$days=$df/86400;
				 $daysafterstart= $wk-$days;
				 for($i=0;$i<100;$i++){
					
					/*if($wk<$daysafterstart){
					if(!isset($w4)){
						$w3=1;
						$w4=1;
						echo"<div id='titlez'>".$woname."</div>";
						echo"<div id='subtitlez'>Done!</div>";
					}
				 }*/
				 if($daysafterstart<7*$i){
				 
					if(!isset($w3)){
						$daysafterstart;
						$_SESSION['w']=$i;
						$w3="Week ".$i;
						echo"<div id='titlez'>".$woname."</div>";
						echo"<div id='subtitlez'>".$w3."</div>";
						$_SESSION['woset']=1;
					}
					
				 }
				 
				}     
			}

						if(isset($_GET['wo'])&&$_GET['f']=='y'){
				$woname=$_GET['wo'];
						$_SESSION['woset']=1;
						echo"<div id='titlez'>".$woname."</div>";
						echo"<div id='subtitlez'>Done!</div>";	 
			}


				?>
				<?php
if(!isset($_GET['wo'])){echo"

				<table >
				<thead>
					<div id='pagetitle'>Start or Finish a Workout</div>
				<hr width='75%' color='#ae161a'/>
				</thead>
					<tr>
						<td id='centrstat'>In Progress</td>
						<td id='centrstat'>Finished</td>
					</tr>
					<tr>
						<td width='50%'>
					<table id='borderstat'>
						<ol id='centertable'>";}
						?>

<?php

if(!isset($_GET['wo'])){//if a workout isnt clicked then it will loop through all the names and link them
$udd=date('Y-m-d');
$con=mysqli_connect("localhost","marchome_marc","password","marchome_creation_date");
$namw= $user_db."_creation_date";
$result = mysqli_query($con,"SELECT * FROM $namw");
$op="";
while($row = mysqli_fetch_array($result))
	{
		$row['time'];
		$row['finish_time'];
		$fn=$row['finish_time'];
		$ne=$row['name'];
		$ud=$row['id'];

		mysqli_query($con,"UPDATE $namw SET time='$udd' WHERE id='$ud'");



		if(strtotime($row['finish_time'])>strtotime($row['time'])){
			$checkup="no";
			
		}

		elseif(strtotime($row['finish_time'])<=strtotime($row['time'])){				
			$con=mysqli_connect("localhost","marchome_marc","password","marchome_checkfinish");
$namw= $user_db."_checkfinish";
		 $result1 = mysqli_query($con,"SELECT * FROM $namw WHERE name='$ne'");
while($row1 = mysqli_fetch_array($result1))
	{
		$op= $row1['done'];
			
		}
					 
			$checkup="yes";
			if(isset($fn)){
 if($op=="no"){
	$dayhj=date("Y-m-d");
	$con=mysqli_connect("localhost","marchome_marc","password","marchome_done");
$namw= $user_db."_done";
				mysqli_query($con,"INSERT INTO $namw VALUES ('','$dayhj',' finished his workout $ne')");
				}
				
				$con=mysqli_connect("localhost","marchome_marc","password","marchome_checkfinish");
$namw= $user_db."_checkfinish";
	mysqli_query($con,"UPDATE $namw SET done='yes'
				WHERE name='$ne'");
	

}
//echo $row['name'].$checkup."<br />";
		}
				
	}


				$con=mysqli_connect("localhost","marchome_marc","password","marchome_checkfinish");
$namw= $user_db."_checkfinish";
		$result = mysqli_query($con,"SELECT name FROM $namw WHERE done='no'");
		while($row = mysqli_fetch_array($result)){
		 $name=$row['name'];
		
			echo "<li>"."<a id='label1' href='workout.php?view=$user&wo=$name&f=n'>".$row['name']."</a>"."</li>";
		 
		}
 }

 if(!isset($_GET['wo'])){echo"
</ol>
					</table>
				</td>
				<td width='100%'>
						<table id='borderstat'>
							<ol id='centertable'>
";}

 if(!isset($_GET['wo'])){

		 $result = mysqli_query($con,"SELECT name FROM $namw WHERE done='yes'");
		while($row = mysqli_fetch_array($result)){
			$name=$row['name'];
			echo "<li>"."<a id='label1' href='workout.php?view=$user&wo=$name&f=y'>".$row['name']."</a>"."</li>";
		 
		}

	}
 if(!isset($_GET['wo'])){echo"
</ol>
						</table>  
					</td>
				</tr>

";}


	///////////////////////////// / / / / / / / //////////////////////////////
 //if a workout name is clicked
if(isset($_GET['wo'])&&($_GET['f']=="n")){

		 $woname=$_GET['wo'];

//check if set3 or set2 exist to later see how many boxes have to be displayed
for($i=0;$i<100;$i++){
			$set="set";
		$set=$set.$i;
		
		// if it doesnt exist then assign $i this will keep on happening until set does exist and $i doesnt get assigned
		$con=mysqli_connect("localhost","marchome_marc","password","marchome_woex");
$namw= $user_db."_"."$woname";
if(!($result = mysqli_query($con,"SELECT $set FROM $namw"))){
	if(!isset($sessionhigh)){
$sessionhigh=$i-1;


	}
}

}
			 $wox ="";

		echo '<form method="POST" action="workout.php?view='.$user.'&wo='.$woname.'&f=n">';
		$con=mysqli_connect("localhost","marchome_marc","password","marchome_woex");
$namw= $user_db."_".$woname;
	$result = mysqli_query($con,"SELECT * FROM $namw");
	if(!isset($_SESSION['woset'])){
		$_SESSION['woset']=0;
	}
if($_SESSION['woset']==1){
	while($row = mysqli_fetch_array($result)){
		echo "<br /><label id='label'>".'Day'.$row['id']."</label>"."<br />";
	//session high is the highest amount of exercise per day
		for($i=0; $i<=$sessionhigh; $i++){
			$exercise="exercise";
			$exercise=$exercise.$i;
			$day="day".$row['id'];
			$set="set";
			$set=$set.$i;
			$q="ex".$i;
			$sets=$row[$set];
			$num = $sessionhigh;
		echo "<label>".$row["$set"]." sets of ".$row["$exercise"]."</label><br /> ";
		//	echo $num;

				//echo "<label>".$row["$exercise"]."</label>";
				if(isset($row[$exercise])){
					//day is the the day
					//q is the 0th 1st 2nd etc. exercise 
					//f is the set
					for($f=0;$f<$sets;$f++){
					 
						$select=$day.$q."set".$f."weight";
						$select;
					 // echo 'hello';
						$wox=$woname;
						$wox.="weight";

						$val="";
						$w=1;
						$con=mysqli_connect("localhost","marchome_marc","password","marchome_wowe");
$namw= $user_db."_".$wox;
						$r = mysqli_query($con,"SELECT $select FROM $namw WHERE id='$w' ");
						 while($ro = mysqli_fetch_array($r)){
							$val=$ro["$select"];

							}
				echo "<input name='".$day.$q."set".$f."weight' type='text' value='".$val."'/>";
				}
				echo"<br />";
			}
		}
			
}
			
		}
		$be="";
$wox=$woname."weight";
		$result = mysqli_query($con,"SELECT * FROM $namw WHERE id='1'");
							#if(false == mysqli_fetch_array($result)){
						 while($re = mysqli_fetch_array($result)){
							$be=$re["day1ex0set0weight"];
							}
						#}
							if($be==null){
								echo '<input id="button" type="submit" name="submit" value="Start my workout" />';
								echo '<label id="errmsg"> Click this before typing in any numbers</label>';
								mysqli_query($con,"UPDATE $namw SET day1ex0set0weight=0
								WHERE id='1' "); 
							}
							else {
								echo '<input id="button" type="submit" name="submit" value="I\'m done" />'; 
							}
		
		echo'</form>';
		//create a form and a submit button
	}

	/* if the the submit utton is pressed the next will be done */
	if(isset($_POST['submit'])){
 $con=mysqli_connect("localhost","marchome_marc","password","marchome_creation_date");
$namw= $user_db."_creation_date";
		$result = mysqli_query($con,"SELECT * FROM $namw WHERE name='$woname'");
		while($row = mysqli_fetch_array($result)){
			if(!isset($row['finish_time'])){
			 
				//her the finish date will be set
				$con=mysqli_connect("localhost","marchome_marc","password","marchome_checkfinish");
$namw= $user_db."_"."checkfinish";
				$result = mysqli_query($con,"SELECT daysleft FROM $namw WHERE name='$woname'");

		while($row = mysqli_fetch_array($result)){
				 $dayplus =$row['daysleft'];
			}
			$con=mysqli_connect("localhost","marchome_marc","password","marchome_creation_date");
$namw= $user_db."_creation_date";
				$dayx=date("Y-m-d");
				$dayy = date('Y-m-d', strtotime($dayx. ' + '.$dayplus.' days'));
		mysqli_query($con,"UPDATE $namw SET time='$dayx'
				WHERE name='$woname'");
			 mysqli_query($con,"UPDATE $namw SET finish_time='$dayy'
				WHERE name='$woname'");

				
			}
		}
		$con=mysqli_connect("localhost","marchome_marc","password","marchome_woex");
$namw= $user_db."_"."$woname";
		$result = mysqli_query($con,"SELECT * FROM $namw");
		$string ="";
		$weights="";
		$update ="";
		while($row = mysqli_fetch_array($result)){
 
	//session high is the highest amount of exercise per day
		for($i=0; $i<=$sessionhigh; $i++){
			$exercise="exercise";
			$exercise=$exercise.$i;
			$day="day".$row['id'];
			$set="set";
			$set=$set.$i;
			$q="ex".$i;
			$sets=$row[$set];
			$num = $sessionhigh;
			

					//day is the the day
					//q is the 0th 1st 2nd etc. exercise 
					//f is the set

					for($f=0;$f<$sets;$f++){
					 $string= $string.",".($day.$q.'set'.$f.'weight')." INT";
					 $weights=$weights." ,"."'".($_POST[$day.$q.'set'.$f.'weight'])."'";
					 if($_POST[$day.$q.'set'.$f.'weight']==""){
						$_POST[$day.$q.'set'.$f.'weight']=0;
					 }
					 $update=$update.", ".($day.$q.'set'.$f.'weight')."=".($_POST[$day.$q.'set'.$f.'weight']);
						

					}
				

			}
			
	}/*
	echo $string;
			echo"<br />";
			echo $weights;$update="day0ex0set0we".$update;
*/$update=substr($update, 1);
		$ww=$woname."weight";
		$con=mysqli_connect("localhost","marchome_marc","password","marchome_wowe");
$namw= $user_db."_".$ww;
			$sql = "CREATE TABLE $namw 
		(
		id INT NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(id)$string)";
mysqli_query($con,$sql);
		$check=mysqli_query($con, "SELECT day1ex0set0weight FROM $namw ");

		$numrows= mysqli_num_rows($check);
		if($numrows == 0){//have checked
			$con=mysqli_connect("localhost","marchome_marc","password","marchome_creation_date");
$namw= $user_db."_creation_date";
			$result=mysqli_query($con, "SELECT weeks FROM $namw WHERE name='$woname' ");
			while($row = mysqli_fetch_array($result)){
					$wkss=$row['weeks'];
					$con=mysqli_connect("localhost","marchome_marc","password","marchome_wowe");
$namw= $user_db."_".$ww;
					for($i=0;$i<$wkss;$i++){

						mysqli_query($con,"INSERT INTO $namw
						VALUES ()");
						mysqli_query($con,"UPDATE $namw SET $update WHERE id='$w' ");
					}
				}
			}
mysqli_query($con,"UPDATE $namw SET $update WHERE id='$w' ");
//echo $update;

	
	}
?>

<?php
/////////////////////////////////////////finished workout///////////////////////////////
if(isset($_GET['wo'])){
	if($_GET['f']=="y"){


		 $woname=$_GET['wo'];

//check if set3 or set2 exist to later see how many boxes have to be displayed
for($i=0;$i<100;$i++){
			$set="set";
		$set=$set.$i;
		
		// if it doesnt exist then assign $i this will keep on happening until set does exist and $i doesnt get assigned
		$con=mysqli_connect("localhost","marchome_marc","password","marchome_woex");
$namw= $user_db."_".$woname;
if(!($result = mysqli_query($con,"SELECT $set FROM $namw"))){
	if(!isset($sessionhigh)){
$sessionhigh=$i-1;


	}
}

}
$con=mysqli_connect("localhost","marchome_marc","password","marchome_creation_date");
$namw= $user_db."_creation_date";
$result12 = mysqli_query($con,"SELECT weeks FROM $namw WHERE name='$woname' ");
$num12 = mysqli_fetch_array($result12);
$num12 = $num12['weeks'];
echo '<form method="POST" action="workout.php?view='.$user.'&wo='.$woname.'">';
 
	for($er=1;$er<=$num12;$er++){
		$con=mysqli_connect("localhost","marchome_marc","password","marchome_woex");
		$namw= $user_db."_".$woname;
		echo'<label id="label1">Week '.$er."</label>";
		 $result = mysqli_query($con,"SELECT * FROM $namw");
	while($row = mysqli_fetch_array($result)){
		echo "<br /><label id='label'>".'Day'.$row['id']."</label>"."<br />";
	//session high is the highest amount of exercise per day
		for($i=0; $i<=$sessionhigh; $i++){
			$exercise="exercise";
			$exercise=$exercise.$i;
			$day="day".$row['id'];
			$set="set";
			$set=$set.$i;
			$q="ex".$i;
			$sets=$row[$set];
			$num = $sessionhigh;
		echo "<label>".$row["$set"]." sets of ".$row["$exercise"]."</label><br /> ";
		//  echo $num;

				//echo "<label>".$row["$exercise"]."</label>";
				if(isset($row[$exercise])){
					//day is the the day
					//q is the 0th 1st 2nd etc. exercise 
					//f is the set
					for($f=0;$f<$sets;$f++){
					 
						$select;
						$select=$day.$q."set".$f."weight";
						$wox=$woname."weight";
						$con=mysqli_connect("localhost","marchome_marc","password","marchome_wowe");
						$namw= $user_db."_".$wox;
						$r = mysqli_query($con,"SELECT $select FROM $namw WHERE id='$er'");
						 while($ro = mysqli_fetch_array($r)){
							$val=$ro["$select"];

							} 
							$sfd=$f+1;
							echo'<label id="label">Set '.$sfd.": </label>";
				echo "<label id='label2'>".$val." </label>";
				}
				echo"<br />";
			}
		}
		////
			}
			/////
			}
		}
 
}

?>
<?php
if(isset($_POST['submit'])){
echo "<META HTTP-EQUIV='Refresh' Content='0; URL=workout.php?view=$user&wo=$woname&f=n'>"; 
}
?>

			</td>
			<td id="right"></td>
		</tr>
	</table>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/create_element.js"></script>
<script type="text/javascript" src="js/indexjs.js"></script>
</html
