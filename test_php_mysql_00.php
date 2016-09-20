///////////////////////////////////////////////////////////////////////////////////////
<?php

	echo "FileName: addpeople.php";
	echo "<br>";
	echo "Data    : 2016-09-18";
	echo "<br>";

	$servername = "localhost";
	$username = "root";
	$password = "12345";
	// connect to mysqlserver
	$conn = mysql_connect($servername, $username, $password);
	if (!$conn) {
		die("Couldn't connect: " . mysql_error());
	} else {
		echo "Connect Success!";
		echo "<br>";
	}
	// select db
	mysql_select_db("my_db", $conn);
	// insert data into table: Persons
	$sql = "INSERT INTO Persons(FirstName, LastName, Age)
		VALUES
		('$_POST[firstname]', '$_POST[lastname]', '$_POST[age]')";
	if(!mysql_query($sql, $conn)) {
		die("Error: " . mysql_error());
	} else {
		echo "Insert Data Success!  ";
	}
	echo "1 record added";

	mysql_close($conn);

?>
