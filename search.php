<?php 
require'logged.php';
include 'header.php'; 

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
	<table id="maint" id="fixed">
		<tr>
			<td id="left"><?php include'left.php';?></td>
			<td id="middle">
					<table >
					<thead>
						<div id='pagetitle'>Find your friends</div>
						<hr width="50%" color="#ae161a"/>
						</thead>
						<tr>
							<tbody>
							<form method="POST" action=<?php echo "search.php?view=$current";?>>
							<td>
							
								<div id="search">
									<input name="search" value="Search for others..." />
								</div>
							</td>
							<td>
								<input id="button" type="submit" name="submit" value="Search" />
							</td>
							<td><div id="trright"></div></td>
							<td>
								<label>Search by:</label>
							</td>
							<td>
								<div id="drop_choice">
								<select name="option">
								<option name="firstname">Firstname</option>
								<option name="user">User</option>
								</select>
								</div>
							</form>
							</td>
						</tr>
					</tbody>
					
				</table>
				<table>
										<tr>
						<td>
							<ol>
							<?php
								if(isset($_POST['submit'])){
									$search = $_POST['search'];
									$option= $_POST['option'];
									$thequery = mysqli_query($con, "SELECT * FROM users WHERE $option='$search'");
									if (mysqli_num_rows($thequery)==0) {
										# code...
										echo '<div id="errmsg">There were no people found under that '.$option.'. </div>';
									}
									if (mysqli_num_rows($thequery)!=0) {
									echo '<div id="sccmsg">'.mysqli_num_rows($thequery).' results matched your search!</div>';
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
										<a href='home.php?view=$user'><p id="titlesearch">$first $last</p></a>
									</td>
									<tr>
									<td>
									<p id="subtitlesearch">$user</p>
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
						</ol>
						</td>
					</tr>
				</table>
			</td>
			<td id="right"></td>
		</tr>
	</table>
</body>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/indexjs.js"></script>
</html>
