<?php
	require("inc/config.php");
	require("inc/functions.php");
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>

	<?php
	//Check if logged
    if((isset($_SESSION['logged']))
        and
    ($_SESSION['logged'] == "yes")){
    	
    }else{
		_ErrorNotLoaggedin("");
		return;
	}
	?>


<?php
	//Get url parms count
	$c = count($_GET);
	//Check url parms count is zero
	if($c == 0){
		echo("<center>");
		echo("<h2>" . $AddrBookTitle . "</h2>");
		echo("<span class=invaild-parms>Invaild URL Parameters.</span><br>\n");
		echo("<a class=link href=index.php>Go Back Home</a>");
		echo("</center>");
		return;
	}
	//Get url id
	$id = $_GET['id'];
	//Delete from the database and reload main page.
			
	//Connect to database
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "DELETE FROM `address` WHERE id=" . $id;
	//Execute sql statement
	$result = $conn->query($sql);
	//Close dtaabase
	$conn->close();
	//Return back to the home page.
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
	</body>
</html>