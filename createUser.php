<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "nickvelicer", "eik3Ke7X",
"nickvelicer");
function echoP($value) {
	echo "<p>" . $value . "</p>";
}

if ($mysqli->connect_errno) {
	echoP($mysqli->connect_error);
	exit();
}

$name = $_POST["user"];

if ($name == "") {
	echoP("Error, username was empty, user not added");
	exit();
}

$query = "INSERT INTO Users (user_id) VALUES ('" . $name . "');";

if (!($mysqli->query($query))) {
	$message = "Error, user was unable to be added";
	echoP($message);
	exit();
}
/*
$query = "SELECT * FROM Users;";
if ($result = $mysqli->query($query)) {
	
	while ($row = $result->fetch_assoc()) {
		echoP($row["user_id"]);
	}
	
	$result->free();
}
*/
$message = "New user successfully stored";
echoP($message);

$mysqli->close();

?>