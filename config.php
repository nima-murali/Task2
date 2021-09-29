<?php
	// making connection with the db

	$servername = "localhost";
	$username = "root";
	$password = "";

	$connect 	= new mysqli($servername,$username,$password);
	#if ($connect->connect_error) {
	#	echo "Error connect db";
	#}

	$db_sql 	= "CREATE DATABASE IF NOT EXISTS registerdb";
	$connect->query($db_sql);

	$table_sql = "CREATE TABLE IF NOT EXISTS registerdb.registertable(id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,email VARCHAR(30) NOT NULL, password VARCHAR(500) NOT NULL)";

	$connect->query($table_sql);
?>