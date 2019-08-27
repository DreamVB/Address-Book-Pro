<?pho
	require("inc/config.php");
	require("inc/functions.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	
		<!--Website Header-->
		<div class="container">
		<div class="header">
			<div class="logo">
				<img src="images/logo.png">
			</div>
			<h1>Address Book Pro</h1>
			<div class="links">
				<a href="index.php">Home</a>
				<a href="about.php">About</a>
			</div>
		</div>
		
		<form action="logusr.php" method="post">
		<div class="login">
			<label>Please enter your login password</label>
			<input type="password" required="yes" name="txtpass">
			<input class="btn-button" type="submit">
			<input class="btn-button btn-reset" type="reset">
		</div>
		</form>
		
		
	</body>
</html>