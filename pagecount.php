<?php
// Prepare MySQL connection
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
	http_response_code(500);
	die("MySQL connection failed: " . $conn->connect_error . "<br>");
}

if ($conn->query("USE `assignment`;") === FALSE) {
	http_response_code(500);
	echo "Can't select!<br>" . $conn->error . "<br>";
}

$q = "SELECT COUNT(*) FROM `masterbarang`";
$result = $conn->query($q);
echo strval(ceil(intval($result->fetch_assoc()["COUNT(*)"])/10));

$conn->close();
?>