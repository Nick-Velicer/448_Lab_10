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

$user = $_POST["users"];
echo "<h2>Posts from user " . $user . ":</h2>";
$query = "SELECT * FROM Posts WHERE author_id = '" . $user . "';";
if ($result = $mysqli->query($query)) {
	
	while ($row = $result->fetch_assoc()) {
		echoP($row["content"]);
	}
	
	$result->free();
}



$mysqli->close();

?>