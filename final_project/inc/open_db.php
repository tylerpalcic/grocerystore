<?php
$servername = 'localhost';
$username = 'palcic';
$password = 'ZT37M';
$dbname = 'palcic';

try {
	$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
	$error_message = $e->getMessage();
	echo $error_message;
	exit();
}
?>