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
$name = $price = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nama_kategori = safe_input($_POST["name"]);
	$stmt = $conn->prepare("INSERT
	INTO `kategoribarang`
		(`KodeKategori`, `NamaKategori`)
	VALUES (
		IFNULL((SELECT
			CONCAT('K', LPAD(CAST(CAST(RIGHT(`a`.`KodeKategori`, 3) AS UNSIGNED) + 1 AS CHAR), 3, '0'))
		FROM `kategoribarang` AS `a`
		INNER JOIN `kategoribarang` AS `b` ON `a`.`KodeKategori` = `b`.`KodeKategori`
		ORDER BY `a`.`KodeKategori` DESC
		LIMIT 1), 'K001'),
		?
	);");
	$stmt->bind_param('s', $nama_kategori);
	if ($stmt->execute() === TRUE) {
		echo("Data inserted successfully");
	} else {
	http_response_code(500);
		echo("Error: " . $q . "<br>" . $conn->error);
	}
	$stmt->close();
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