<?php
# https://github.com/AMDRadeonRX6750XT/posting-site
include '_include.php';

if (isset($_GET['username']) && isset($_GET['email']) && isset($_GET['password'])) {
	echo '<h1>';
	$db = new SQLite3('../db.db');
	
	$hashed_password = password_hash($_GET['password'], PASSWORD_BCRYPT); // Hash the password
	$stmt = $db->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
	$stmt->bindValue(':name', $_GET['username']);
	$stmt->bindValue(':email', $_GET['email']);
	$stmt->bindValue(':password', $hashed_password);
	$stmt->execute();

	$db->close();

	echo 'User account created.';

	echo '</h1>';
	exit;
}

?>

<form>
	<label for="username">Username:</label><br>
	<input type="text" id="username" name="username"><br>
	<label for="email">Email:</label><br>
	<input type="text" id="email" name="email"><br>
	<label for="password">Password:</label><br>
	<input type="password" id="password" name="password">
	<br>
	<input type="submit" value="Login/Signup">
</form>