<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";
// Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully<br>";
	//create database
	$sql = "CREATE database if NOT EXISTS hotel;";
	if (mysqli_query($conn, $sql)) {
		echo "database is successfully created!<br>";
	}
	else
	{
		echo "creating is error".mysqli_error($conn)."<br>";
	}

?> 