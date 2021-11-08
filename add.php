<html>
<head>
	<title>Add Data</title>
	<style>
		#go_back{
			color:#000000;
			padding:.5em;
			font-size:25px;
			width:100px;
			text-align: center;
			display:flex;
			justify-content:center;
			text-decoration: none !important;
			margin:0 auto;
			background-color:#004cf7;
			border-radius:10px;
		}
		font,a{
			font-size:25px;
			display:flex;
			justify-content:center;
			
		}
		
	</style>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a id='go_back' href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
		
		//display success message
		echo "<font color='green'>Data added successfully.</font><br/>";
		echo "<a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
