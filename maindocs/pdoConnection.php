<?php

$server = "localhost";
$username = "ahmadl1_louayahmad20";
$password = 'Redhawks2023@';
$databaseName = "ahmadl1_bankingproject";
$dsn = "mysql:host=$server;$databaseName";


$pdo = new PDO($dsn, $username, $password);
?>