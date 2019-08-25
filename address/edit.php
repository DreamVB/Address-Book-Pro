<?php
	session_start();
	require("inc/config.php");
	require("inc/functions.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Address Book - Edit</title>
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

<?php
	//Get URL parm count
	$c = count($_GET);
	//Check URL parms count.
	if($c == 0){
		_ErrorEditParms();
		return;
	}else{
		//Get ID from Parms
		$id = $_GET["id"];
		//Connect to database
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		//SQL statement
		$sql = "SELECT id,name,phone,email,website from address WHERE id='". $id . "'";
		
		//Execute SQL statement
		$result = $conn->query($sql);
		//Check results
		if ($result->num_rows > 0) {
			// Show address book data
			while($row = $result->fetch_assoc()) {
				//Get address data
				$name = $row["name"];
				$phone = $row["phone"];
				$email = $row["email"];
				$web = $row["website"];
			}
		//Close datanase.
		$conn->close();
		}
	}
	
?>
		<h2>Edit Address</h2>
		
		<div class="add-address">
			<form action="edit.php?id=<?php echo($id);?>&action=update" method="post">
				<label>Name:</label>
				<input type="text" required="yes" name="txtname" value="<?php echo($name);?>">
				<label>Phone Number:</label>
				<input type="text" required="yes" name="txtphone" value="<?php echo($phone);?>">
				<label>Email:</label>
				<input type="email" required="yes" name="txtemail" value="<?php echo($email);?>">
				<label>Website:</label>
				<input type="text" name="txtweb" value="<?php echo($web);?>">
				<input class="btn-button" type="submit" value="Update">
				<input class="btn-button btn-reset" type="reset" value="Clear">
			</form>
		</div>
		
		<?php
			//Add new address to the database
			$e = count($_GET);
			if($e == 2){
				$m = strtoupper($_GET["action"]);
				if($m == "UPDATE"){
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
					
					//SQL statement to execute
					
					$sql = "UPDATE address SET name=" . q_str($name) .
					", phone=" .q_str($phone) .",email=" . q_str($email) .
					",website=" . q_str($web) . " WHERE id='" .  $id . "'";
					
					//Execute sql statement
					$result = $conn->query($sql);
					
					//Update table record.
					$conn->close();
					//Retuen to index page.
					header("Location: index.php");
				}
			}
			
		?>
</div>
</div>
</body>
</html>