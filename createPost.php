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

$post = $_POST["post"];
$user = $_POST["user"];

if ($post == "") {
	echoP("Error, post is empty");
	exit();
}
if ($user == "") {
	echoP("Error, username is empty");
	exit();
}

$query = "INSERT INTO Posts (content, author_id) VALUES ('" . $post . "', '" . $user . "');";

if (!($mysqli->query($query))) {
	$message = "Error, post was unable to be added";
	echoP($message);
	exit();
}

$message = "Successfully Posted";
echoP($message);

$mysqli->close();

?>