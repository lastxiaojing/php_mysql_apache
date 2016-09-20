<?php

	// servername or ip [+port]  默认port:3306 在my.cnf中设置
	$servername = "localhost";
	// username
	$username = "root";
	// password
	$password = "12345";
	// connect mysql
	$con = mysql_connect($servername, $username, $password);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	} else {
		print("Connect MYSQL Success!\n");		
	}

	// create database
	if (mysql_query("CREATE DATABASE IF NOT EXISTS my_db", $con)) {
		print("CREATE DATABASE SUCCESS!\n");
	} else {
		print("Error creating database: ". mysql_error());
	}
	// select db
	mysql_select_db("my_db", $con);	
	// create table
	$sql = "CREATE TABLE IF NOT EXISTS Persons
		(
			personID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(personID),
			FirstName varchar(15),
			LastName varchar(15),
			Age int
		)";
	if (mysql_query($sql, $con)) {
		print("CREATE TABLE SUCCESS!\n");
	} else {
		print("Error creating database: Persons. ". mysql_error() . "\n");
	}
	// insert data
//	if (mysql_query("INSERT INTO Persons (FirstName, LastName, Age)
//		VALUES ('Peter', 'Griffin', '35')")) {
//		print("INSERT DATA SUCCESS!\n");
//	} else {
//		print("INSERT DATA INTO table: Psersons ERROR!\n");
//		die("ERROR: " . mysql_error());
//	}
//	if (mysql_query("INSERT INTO Persons (FirstName, LastName, Age)
//		VALUES('Glenn', 'Quagmire', '33')")) {
//		print("INSERT DATA SUCCESS!\n");
//	} else {
//		print("INSERT DATA INTO table: Psersons ERROR!\n");
//		die("ERROR: " . mysql_error());
//	}
//	if (mysql_query("INSERT INTO Persons (FirstName, LastName, Age)
//		VALUES('Glenn', 'Quagmire', '33')")) {
//		print("INSERT DATA SUCCESS!\n");
//	} else {
//		print("INSERT DATA INTO table: Persons ERROR!\n");
//		die("ERROR: " . mysql_error());
//	}

	// select
	$result = mysql_query("SELECT * FROM Persons");
	while($row = mysql_fetch_array($result)) {
		echo $row['FirstName'] . " " . $row['LastName'];
		// echo '<br />';
		echo "\n";
	}

	// drop database
	// if (mysql_query("DROP DATABASE IF EXISTS my_db", $con)) {
	// 	print("DROP DATABASE SUCCESS!\n");
	// } else {
	// 	print("Error droping database: ". mysql_error());
	// }
	// close connect
	mysql_close($con);
?>
