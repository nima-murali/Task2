<?php
	session_start();
    if (!isset($_SESSION['email'])) {
        header("location:index.php");
    }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="home">
    <?php

    ?>
	<div class="loginhome">
		<h1>You have successfully logged in</h1>
		<a href="logout.php">Logout</a>	
	</div>
</body>
</html>