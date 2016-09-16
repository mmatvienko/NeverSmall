<?php
require 'logged.php';
?>
<div data-role="page">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/style.css">
	<?php include'leftpanel.php';
		 include'rightpanel.php'; ?>
					<div data-role="header">
						<a href="#leftpanel">Menu</a>
					<h1>Help!!</h1>
						<a href="#rightpanel">Me</a>
					</div>
	<div data-role="content">

	<div id="lefttitle" id="createworkout">How to create a workout<hr width="25%"/></div>
	<table >
		<tr>
		<td >
		<img src="../images/img1.jpg" height="300px">
		</td>
		<td>
		<label>The name of your workout cannot contain any spaces, anything after the space will removed.</label>
		<br /><label>In the amount of weeks box, enter any amount of weeks you want to repeat you workout for.</label>
		<br /><label>In the exercise box enter the the exercise. Next to that, in parentheses, enter the amount of reps you want to do it for.</label>
		<br /><label>In the set box just enter how many sets you want to do your exercise for.</label>
		</td>
		</tr>
	</table>
	
	<table id="tabletoright">
		<tr>
		<td>
		<label>Once your first day is complete press the "Add this day to the list" button.</label>
		<br /><label>Now just add some other exercises for the next couple days.</label>
		<br /><label>When you are done, add you last day to the list before pressing Submit</label>
		</td>
		<td>
		<img src="../images/img2.jpg" >
		</td>
		</tr>
	</table>
	<br>
	<hr />
	<br /><br /><br />
	<div id="lefttitle" id="createworkout">How start your workout<hr width="25%"/></div>
	<table>
		<tr>
		<td>
		<img src="../images/img3.jpg" height="150px">
		</td>
		<td>
		<label>Once you have created you workout, it will appear on the workout page.</label>
		</td>
		</tr>
	</table>
	
	<table>
		<tr>
		<td>
		<label>Once you have opened you workout, this button will appear. Click for all of your sets to appear.</label>
		</td>
		<td>
		<img src="../images/img4.jpg" height="50px">
		</td>
		</tr>
	</table>
	
	<table>
		<tr>
		<td>
		<img src="../images/img5.jpg" height="200px">
		</td>
		<td>
		<label>Now that the structure of your workout has shown up, click the "Start my workout" one last time</label>
		<br><label>Once you have clicked it the second time, a clock will start running counting down the weeks.</label>
		</td>
		</tr>
	</table>
	
	<table>
		<tr>
		<td>
		<label>At first all of the boxes will be filled with zeros, this is a good sign.</label>
		<br /><label> Now you can type in your weights and save them.</label>
		<br><label>It does not matter when you save, as long as you finish your workout by the end of the week.</label>
		</td>
		<td>
		<img src="../images/img6.jpg" height="150px">
		<img src="../images/img7.jpg" height="150px">
		</td>
		</tr>
	</table>
	
	<br>
	<hr />
	<br /><br /><br />
	
	<table>
	<tr>
	<td>
	
	</td>
	<td>
	
	</td>
	</tr>
	</table>
	<div id= "help">
		<label>Send an email here to report any bugs and/or ask for help: </label><label><a href="mailto:help@neversmall.com">help@neversmall.com</a></label><br>
	</div>

</div>
</div>
<style type="text/css">
#lefttitle{
	text-align: center;
}
label{
	color:#ff9933;
	font-family: verdana, ariel;
	font-size: 16px;
}
hr{
	align: center;
}
#help{
	text-align: center;
}
#lefttitle{
font-size: 24px;
color:#ae161a;
font-family: verdana, ariel;
}
</style>
