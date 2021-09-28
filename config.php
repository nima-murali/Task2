<?php
	// making connection with the db

	$servername = "localhost";
	$username = "root";
	$password = "";
	#$dbname = "myDB";


	$connect 	= new mysqli($servername,$username,$password);
	if ($connect->connect_error) {
		echo "Error connect db";
	}

	$db_sql 	= "CREATE DATABASE IF NOT EXISTS users";
	if ($connect->query($db_sql) == false) {
		echo "Already exist";
		#return true;
	}
	$table_sql = "CREATE TABLE IF NOT EXISTS users.usertable(id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,email VARCHAR(30) NOT NULL, password VARCHAR(10) NOT NULL)";


	if ($connect->query($table_sql) == false) {
		echo "table not created";
	}
?>