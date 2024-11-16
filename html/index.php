
<!-- https://github.com/AMDRadeonRX6750XT/posting-site -->
<h1>
<?php
	include '_include.php';
	if ($_GET['username']) {
		$_SESSION['username'] = $_GET['username'];
	}
	echo 'Hi, ' . htmlspecialchars($_SESSION['username']) . '!';
?>
</h1>