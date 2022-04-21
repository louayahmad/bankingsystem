<?php
$server = "localhost";
$username = "ahmadl1_louayahmad20";
$password = 'Redhawks2023@';
$databaseName = "ahmadl1_bankingproject";

  $connectionDatabase = new mysqli($server, $username, $password, $databaseName);

  if ($connectionDatabase->connect_error) {
    die("Connection failed: " . $connectionDatabase->connect_error);
  }

  $arrayOfData = $connectionDatabase->query("SELECT * from useraccounts where id = '$_SESSION[userId]'");
  $userData = $arrayOfData->fetch_assoc();
?>
