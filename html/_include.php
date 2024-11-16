<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>posting-site</title>
</head>
<body>
<?php
# https://github.com/AMDRadeonRX6750XT/posting-site

session_start();

if (!isset($_SESSION['username']) && basename($_SERVER['PHP_SELF']) !== 'login.php') {
	header('Location: /login.php');
	die();
}

$db = new SQLite3('../db.db');
$db->exec('CREATE TABLE IF NOT EXISTS users (
	id INTEGER PRIMARY KEY, 
	username TEXT UNIQUE, 
	email TEXT UNIQUE, 
	password TEXT
)');

$db->close();

?>