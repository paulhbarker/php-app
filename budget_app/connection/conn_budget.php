<?php

/*
 * PDO connection
 */

$server = 'localhost';
$dbname= 'dthrmthr_budget';
$userName = 'dthrmthr_client';
$pass = '%Q{Gb&@lggt-';
$dsn = 'mysql:host='.$server.';dbname='.$dbname;

// Now create the actual connection object and assign it to a variable
try {
	$db = new PDO($dsn, $userName, $pass);
} catch(PDOException $e) {
   	header('Location: errors/500.php');
   	exit;
}

?>