<?php

// Enter username and password
$username = 'adminR4Ltur9';
$password = 'zjQeA1RT-wYr';

define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT'));

// Create database connection using PHP Data Object (PDO)
$db = new mysqli(DB_HOST,$username,$password,'php');

var_dump($db);

// Identify name of table within database
$table = 'tb_provider';
$serviceType=$_REQUEST['serviceType'];

// Create the query - here we grab everything from the table
$stmt = $db->query('SELECT * from '.$table." where profession='".$serviceType."'");

var_dump($stmt);

// Close connection to database
$db = NULL;
header('Content-Type: application/json');
$results = $stmt->fetch_all(MYSQLI_ASSOC);
$json=json_encode($results);
echo $json;
exit();
