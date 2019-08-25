<?php
	session_start();
	require("inc/config.php");
	require("inc/functions.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Address Book - Add New</title>
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
	
		<?php _AddHeader();?>
		
		<h2>Add Address</h2>
		
		<div class="add-address">
			<form action="add.php?method=post" method="post">
				<label>Name:</label>
				<input type="text" required="yes" name="txtname">
				<label>Phone Number:</label>
				<input type="text" required="yes" name="txtphone">
				<label>Email:</label>
				<input type="email" required="yes" name="txtemail">
				<label>Website:</label>
				<input type="text" name="txtweb">
				<input class='btn-button' type='submit' value='Add'>
				<input class="btn-button btn-reset" type="reset" value="Clear">
			</form>
		</div>
		
		<?php
			//Add new address to the database
			$c = count($_GET);
			if($c > 0){
				$m = strtoupper($_GET["method"]);
				if($m == "POST"){

					//Connect to database
					$conn = new mysqli($servername, $username, $password, $dbname);
	
					// Check connection
					if ($conn->connect_error) {
    					die("Connection failed: " . $conn->connect_error);
					}
					
					$name = $_POST["txtname"];
					$phone = $_POST["txtphone"];
					$email = $_POST["txtemail"];
					$web = $_POST["txtweb"];
					
					$sql = "INSERT INTO address(name,phone,email,website)\n";
					$sql = $sql ."VALUE(" . q_str($name) . "," . q_str($phone)
					 . "," . q_str($email) . "," . q_str($web) . ")";
					 
					//Execute sql statement
					$result = $conn->query($sql);
					//Close dtaabase
					$conn->close();
					//Return back to the home page.

					header("Location: index.php");
				}
				else{
					_ErrorParms();
					return;
				}
			}
		?>
		
</div>
</div>
</body>
</html>