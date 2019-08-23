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
		
		function q_str($s)
		{
			return "'" . $s . "'";
		}
		
	?>
	
	