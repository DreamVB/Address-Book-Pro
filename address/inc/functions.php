	<?php
		function _ErrorParms(){
			echo("<center>");
			echo("<h2>" . "Address Book Pro<br>v1.0" . "</h2>");
			echo("<span class=invaild-parms>Invaild URL Parameters.</span><br>\n");
			echo("<a class=link href=index.php>Go Back Home</a>");
			echo("</center>");
		}
		
		function _ErrorEditParms(){
			echo("<center>");
			echo("<span class=invaild-parms>Invaild URL Parameters.</span><br>\n");
			echo("</center>");
		}
		
		function _ErrorNotLoaggedin(){
			echo("<center>");
			echo("<span class=invaild-parms>Your are not logged in.Please login first<br><a href=login.php>Login</a></span><br>\n");
			echo("</center>");
		}
		
		function _ErrorWrongPassword(){
			echo("<center>");
			echo("<span class=invaild-parms>The password entered is incorrect.<br><a href=login.php>Login</a></span><br>\n");
			echo("</center>");
		}
		
		function q_str($s)
		{
			return "'" . $s . "'";
		}
		
		function _AddHeader(){
			$Header = file_get_contents('inc/header.php');
			echo($Header);
			$Header = "";
		}
		
	?>
	
	