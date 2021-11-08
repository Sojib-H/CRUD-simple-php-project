<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
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
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<style>
		#home{
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
		#table{
		
		text-align: center;
		display:flex;
		justify-content:center;
		text-decoration: none !important;
		margin:0 auto;
	}
	#table td{
		font-size: 20px;
		padding:5px;
		/* margin: 10px; */
	}
	input{
		width: 350px;
		height: 32px;
	}
	.update{
		background-color: #004cf7;
		cursor: pointer;
		font-size: 15px;
		padding: 5px;
		color: #000000;
		border-radius: 5px;
	}
	</style>
</head>

<body>
	<a href="index.php" id="home">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0" id="table">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><input type="text" name="age" value="<?php echo $age;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update Information" class="update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
