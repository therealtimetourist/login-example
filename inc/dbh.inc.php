<?php
	$servername = "localhost";
	$dbuser = "root";
	$dbpwd = "root";
	$dbName = "loginsystemtut";
	
	$conn = mysqli_connect($servername, $dbuser, $dbpwd, $dbName);
	
	if(!conn){
		die("Connection Failed: " . mysqli_connect_error());
	}