<?php
/**
 * using mysqli_connect for database connection
 */

$databaseHost = '103.19.208.30';
$databaseName = 'mygis';
$databaseUsername = 'root';
$databasePassword = 'CSC2019Team';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

?>
