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
	
	$pws_len = strlen($_POST['txtpass']);
	
	//Check username and password lengths.
	if($pws_len==0){
		echo "Password is required.";
		return;
	}
	else{
		//Compare the strings
		if($adminpass != $_POST['txtpass']){
			_ErrorWrongPassword();
			return;
		}
		else{
			$_SESSION['logged'] = "yes";
			//Redirect to master page
			header( 'Location: index.php');
		}
	}
?>

</body>
</html>