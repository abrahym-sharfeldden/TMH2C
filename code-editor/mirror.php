<link rel='stylesheet' src='style.css'>
<?php
$code_inpt = $_POST['type'];
	echo "<style>
	table, tr, td {
		border: 5px ridge black;
	}
	p, h1, h2, h3 {
	text-align: center;
	}
	</style>";
	$ms = 1000;
	if ($ms === 1000) {
		$seconds = 5 * $ms;
	}
	if ($code_inpt === 'java') {
		echo "<!DOCTYPE html> <html> <head> <div> <body> <applet code='" . $_POST['input'] . "' height='300' width='300'> </applet> </body> </div> </head> </html>";
	}
	if ($code_inpt === 'html') {
		$code = $_POST['input'];
		echo $code;
		echo "<meta http-equiv='refresh' content='5;editor.html'>";
		echo "<link rel='stylesheet' src='style.css'>";
		if ($code === " ") {
			echo "<p><b><i>spaz</i> says: </b><h1>error</h1></p> <p>no input</p><br/><br/><p><image alt='spaz' src='spaz.jpg' height='300' width='300'></p>";
		} else {
			echo "this page will automatically go back to the editor in  ";
			echo $seconds--;
			echo " milliseconds (5 seconds)";
		}
	}
	if ($code_inpt === "html" && $code === ' ') {
		echo "no input ~spaz";
	}
	if ($code_inpt === "java" && $code === ' ') {
		echo "no input";
	}
?>