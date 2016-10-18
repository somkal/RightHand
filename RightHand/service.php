<?php

// // Enter username and password
// $username = 'adminR4Ltur9';
// $password = 'zjQeA1RT-wYr';

define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT'));
define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));

if(!DB_HOST){
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'root';
	$dbname = 'righthand';	
}else{
	$dbhost = DB_HOST;
	$dbuser = DB_USER;
	$dbpass = DB_PASS;
	$dbname = 'php';
}

sleep(rand(2,4));

// Create database connection without using PHP Data Object (PDO)
$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Identify name of table within database
$table = 'tb_provider';
$serviceType = $_REQUEST['serviceType'];

// Create the query - here we grab everything from the table
$stmt = $db->query('SELECT * from '.$table." where profession='".$serviceType."'");

// Close connection to database
$db = NULL;
header('Content-Type: application/json');
$results = array();
while($row=$stmt->fetch_assoc()){
	$results[] = $row;
}
$json = json_encode($results);
echo $json;
exit();
