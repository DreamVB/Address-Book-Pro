<?php
	require("inc/config.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Address Book</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	
		<?php
			$Header = file_get_contents('inc/header.php');
			echo($Header);
			$Header = "";
		?>
		
		<div style="overflow-x:auto;">
		<table>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Phone</td>
			<td>Contact</td>
			<td>Admin</td>
		</tr>
		
<?php

	//Connect to database
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	//SQL statement
	$sql = "SELECT * FROM address";
	//Execute SQL statement
	$result = $conn->query($sql);
	//Check results
	if ($result->num_rows > 0) {
    	// Show address book data
    	while($row = $result->fetch_assoc()) {
			$id = $row["id"];
			$name = $row["name"];
			echo "<tr><td>". $id ."</td>\n";
			echo "<td>" .$row["name"] ."</td>\n";
			echo "<td>" .$row["phone"] ."</td>\n";
			echo "<td><a class=email href=mailto:".$row["email"] .
			" target=_blank><img class=img-icon title=Email src=images/email.png></a><a href=" .
			$row["website"] ." target=_blank><img title='Visit Home-Page' class=img-icon src=images/home.png></a></td>\n";
			echo "<td><a class=link href=\"" ."edit.php?id=".$id.
			"\"" ." onclick=\"" ."return confirm('Are you sure you want to edit this address?')\"".">Edit</a> | <a class=link href=\"" ."delete.php?id=".$id.
			"\"" ." onclick=\"" ."return confirm('Are you sure want to delete this address?')\"".">Delete</a></td><tr>";
    	}
	}
	else
	{
    	echo "<span class=no-results>0 Results</span>";
	}
	
	//Close datanase.
	$conn->close();
?>

</table>
		
</div>	
</div>
</body>
</html>