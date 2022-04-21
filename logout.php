<?php
session_start();
session_destroy();
error_reporting(E_ALL | E_WARNING | E_NOTICE);
ini_set('display_errors', TRUE);
flush();
header('location:./index.php');
die('You should be at the homepage by now...');
?>