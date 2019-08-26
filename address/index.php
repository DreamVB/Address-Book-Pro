<?php
	require("inc/config.php");
	require("inc/functions.php");
	session_start();
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
		 _AddHeader();
	?>
	
		<div style="overflow-x:auto;">
		<table id="tblAddress">
		<tr class="t_header noselect2">
			<td>#</td>
			<td>Company / Name</td>
			<td>Phone</td>
			<td>Contact</td>
			<td>Admin</td>
		</tr>
		
		<input id="myInput" type="text" name="txtfind" placeholder="Search for names..." onkeyup="findNames();">
		<br/>
		
	<script>
		function findNames() {
		  // Declare variables
		  var input, filter, table, tr, td, i, txtfind;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("tblAddress");
		  tr = table.getElementsByTagName("tr");
		  
		  for (i = 1; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[1];
		    if (td) {
		      txtfind = td.textContent || td.innerText;
		      if (txtfind.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
		    }
		  }
		}
	</script>
	
<?php

	//Connect to database
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	//SQL statement
	$sql = "SELECT * FROM address ORDER BY name ASC";
	//Execute SQL statement
	$result = $conn->query($sql);
	//Check results
	if ($result->num_rows > 0) {
    	// Show address book data
    	while($row = $result->fetch_assoc()) {
			$id = $row["id"];
			$name = $row["name"];
			echo "<tr><td class=bold>". $id ."</td>\n";
			echo "<td>" .$row["name"] ."</td>\n";
			echo "<td>" . "&#x260E; " .$row["phone"] ."</td>\n";
			echo "<td><a class=email href=mailto:".$row["email"] .
			" target=_blank><img class=img-icon title=Email src=images/email.png></a><a href=" .
			$row["website"] ." target=_blank><img title='Visit Home-Page' class=img-icon src=images/home.png></a></td>";
		
	//Check if logged
    if((isset($_SESSION['logged']))
        and
    ($_SESSION['logged'] == "yes")){
    	$logged = TRUE;
    }else{
		$logged = FALSE;
	}
	
		if($logged){
			echo "<td><a class=link href=\"" ."edit.php?id=".$id.
			"\"" ." onclick=\"" ."return confirm('Are you sure you want to edit this address?')\"".">Edit</a> | <a class=link href=\"" ."delete.php?id=".$id.
			"\"" ." onclick=\"" ."return confirm('Are you sure want to delete this address?')\"".">Delete</a></td></tr>";
		}
		else{
			echo "<td class=noselect>Please login to edit</td></tr>";
		}
		
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