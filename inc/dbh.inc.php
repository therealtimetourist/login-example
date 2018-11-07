<?php
	$servername = "localhost";
	$dbuser = "root";
	$dbpwd = "root";
	$dbName = "cousa";
	
	$conn = mysqli_connect($servername, $dbuser, $dbpwd, $dbName);
	
	if(!conn){
		die("Connection Failed: " . mysqli_connect_error());
	}