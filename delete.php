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

// Get POST
$no = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$kode_barang = safe_input($_POST["code"]);
	$stmt = $conn->prepare("DELETE FROM `masterbarang` WHERE `KodeBarang` = ?;");
	$stmt->bind_param('s', $kode_barang);
	if ($stmt->execute() === TRUE) {
		echo("Data deleted successfully");
	} else {
		http_response_code(500);
		echo("Error: " . $q . "<br>" . $conn->error);
	}
} else {
	http_response_code(405);
	echo "POST request expected.";
}

$conn->close();

function safe_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	if (ctype_space($data) || $data == '') {
		http_response_code(400);
		die('Bad Request');
	}
	return $data;
}

?>