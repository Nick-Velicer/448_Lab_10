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
$query = "SELECT * FROM Users;";
if ($result = $mysqli->query($query)) {
	
	while ($row = $result->fetch_assoc()) {
		echoP($row["user_id"]);
	}
	
	$result->free();
}

$mysqli->close();

?>