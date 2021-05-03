<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "nickvelicer", "eik3Ke7X",
"nickvelicer");
/* check connection */
function echoP($value) {
	echo "<p>" . $value . "</p>";
}

function m_query($q) {
	$mysqli->query($query);
}

if ($mysqli->connect_errno) {
	echoP($mysqli->connect_error);
	exit();
}
echoP("Connection succeeded.");


$query = "DROP TABLE Users;";
$mysqli->query($query);
$query = "DROP TABLE Posts";
$mysqli->query($query);

$query = "CREATE TABLE Users (user_id varchar(255) NOT NULL, PRIMARY KEY (user_id)) ENGINE=INNODB;";
$mysqli->query($query);
$query = "INSERT INTO Users (user_id) VALUES ('firstuser');";
$mysqli->query($query);
$query = "SELECT * FROM Users;";
if ($result = $mysqli->query($query)) {
	/* fetch associative array */
	while ($row = $result->fetch_assoc()) {
		echoP($row["user_id"]);
	}
	/* free result set */
	$result->free();
}

$query = "CREATE TABLE Posts (post_id int NOT NULL AUTO_INCREMENT, content varchar(255), author_id varchar(255), PRIMARY KEY (post_id), FOREIGN KEY (author_id) REFERENCES Users(user_id));";
if (!($mysqli->query($query))) {
	$message = "Error, post not properly initialized";
	echoP($message);
	exit();
}
$query = "INSERT INTO Posts (content, author_id) VALUES ('This is a test post', 'firstuser');";
if (!($mysqli->query($query))) {
	$message = "Error, user was unable to be added";
	echoP($message);
	exit();
}
$query = "SELECT content FROM Posts;";
if ($result = $mysqli->query($query)) {
	/* fetch associative array */
	while ($row = $result->fetch_assoc()) {
		echoP($row["content"]);
	}
	/* free result set */
	$result->free();
}

/* close connection */
$mysqli->close();
?>