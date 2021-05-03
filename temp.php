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
/*
$query = "SELECT * FROM Users;";
if ($result = $mysqli->query($query)) {
	
	while ($row = $result->fetch_assoc()) {
		echoP($row["user_id"]);
	}
	
	$result->free();
}
*/
echo '<label for="users">Select a user:</label>';
echo '<select name="users" id="users">';
$query = "SELECT * FROM Users;";
if ($result = $mysqli->query($query)) {
	
	while ($row = $result->fetch_assoc()) {
		echo "<option value='" . $row["user_id"] . "'>" . $row["user_id"] . "</option>";
	}
	$result->free();
}
echo "</select>";

$mysqli->close();

?>