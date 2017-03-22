<?php
$code = $_POST['code'];
echo $code;
if ($code === " " || $code === null) {
	echo "no code";
}
?>