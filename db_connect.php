<?php
$server = 'localhost';
$user = 'root';
$password = '';
$db_name = 'softhouse';

$db=mysql_connect($server, $user, $password);
mysql_select_db($db_name, $db);	

if (!$db) {
    die("Connection failed! :(<br>".mysqli_connect_error());
} 
?>