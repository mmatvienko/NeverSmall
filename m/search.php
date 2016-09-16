<!DOCTYPE html> 
<html> 
<head> 
	<title>Search</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0-beta.1/jquery.mobile-1.3.0-beta.1.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.0-beta.1/jquery.mobile-1.3.0-beta.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head> 

<body> 
	<div data-role="page">
		<?php
		require 'logged.php';
include('connect_to_mysql.php');
		include 'functions.php';
		ini_set('session.cookie_httponly', true);
		 include'leftpanel.php';
		 include'rightpanel.php'; ?>
		<div data-role="header">
			<a href="#leftpanel">Menu</a>
		<h1>Search</h1>
			<a href="#rightpanel">Me</a>
		</div>

		<div data-role="content">
			<form method="POST" action=<?php echo "search.php?view=$current";?> data-ajax="true">
			<table>
							<tr>
							<td>
							
								<div id="search">
									<input name="search" value="Search for others..." onclick="value=''"/>
								</div>
							</td>
							<td>
								<input type="submit" name="submit" value="Search" />
							</td>
							<td><div id="trright"></div></td>
							</tr><tr>
							<td>
								<label>Search by:</label>
							
								<div id="drop_choice">
								<select name="option">
								<option name="firstname">Firstname</option>
								<option name="user">User</option>
								</select>
								</div>
							</td>
							</tr>
							</table>
							</form>
							<div data-role="listview">
							<?php
								if(isset($_POST['submit'])){
									$search = sfmsg($_POST['search']);
									$option= $_POST['option'];

									$thequery = mysqli_query($con, "SELECT * FROM users WHERE $option='$search'");
									if (mysqli_num_rows($thequery)==0) {
											echo '<br /><div id="errmsg">There were no people found under that '.$option.'. </div><br />';
									}
									if (mysqli_num_rows($thequery)!=0) {
									echo '<br /><div id="sccmsg">'.mysqli_num_rows($thequery).' results matched your search!</div><br />';
									}
									while($row=mysqli_fetch_assoc($thequery)){
									$user=$row['user'];
									$first=$row['firstname'];
									$last=$row['lastname'];
									$maxbench=$row['maxbench'];
									$maxsquat=$row['maxsquat'];
									$height=$row['height'];
									$weight=$row['weight'];
print<<<HERE
							<li>
								<table>
									<tr>
									<td>
										<a href='home.php?view=$user'><div id="titlesearch">$first $last</div></a>
									</td>
									<tr>
									<td>
									<div id="subtitlesearch">$user</div>
									</td>
									</tr>
									</tr>

									<tr>
										<td><label>Bench: </label><div id="subsearch">$maxbench</div></td>
										<td><label>Squat: </label><div id="subsearch">$maxsquat</div></td>
									</tr>

									<tr>
										<td><label>Height(in): </label><div id="subsearch">$height</div></td>
										<td><label>Weight(lbs): </label><div id="subsearch">$weight</div></td>
									</tr>
								</table>
							</li>
							<br />
HERE;
									}
							}		
							?>
						</div>

		</div>
	</div>
</body>
</html>
