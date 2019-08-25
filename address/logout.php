<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Address Book</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	
<?php
	require("inc/config.php");
	require("inc/functions.php");
	session_start();
	
	$_SESSION['logged'] = "";
	//End session
	session_destroy();
	//Redirect back to main page.
	header( 'Location: index.php');
?>

</body>
</html>