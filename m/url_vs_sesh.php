<?php
$user1=$_SESSION['zuser'];
$user2=$_GET['view'];

if(isset($_GET['view'])||isset($_SESSION['zuser'])){
	if($user1!=$user2){
		echo "<META HTTP-EQUIV='Refresh' Content='0; URL=home.php?view=$user1'>";
	}
}
?>
