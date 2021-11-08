<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homepage</title>
	<style>
	#add_data{
		color:#000000;
		padding:.5em;
		font-size:25px;
		width:150px;
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
		padding:1.5rem;
	}
	.edit,.delete{
		border-radius:5px;
		color:#000000;
		font-size:15px;
		padding:10px;
		text-decoration:none;
	}
	.edit{
		background-color:#004cf7;
	}
	.delete{
		background-color:#ed1e1e;
	}
	</style>
</head>

<body>
<a href="add.html" id="add_data">Add New Data</a><br/><br/>

	<table width='80%' border=0 id="table">

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Age</td>
		<td>Email</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['age']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td><a class='edit' href=\"edit.php?id=$res[id]\">Edit</a> | <a class='delete' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
