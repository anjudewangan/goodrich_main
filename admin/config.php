<?php
session_start();
    
    $dbhost='localhost';
	$dbuser='root';
	$dbpass='';
	$dbname ='goodrich_db';
	/* $dbhost='localhost';
	$dbuser='root';
	$dbpass='';
	$dbname ='woce_db'; */
	$con =  mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) ;
		
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
?>
