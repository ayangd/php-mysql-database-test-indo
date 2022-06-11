<?php
// Prepare MySQL connection
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
	die("MySQL connection failed: " . $conn->connect_error . "<br>");
}

if ($conn->query("USE `assignment`;") === FALSE) {
	echo "Can't select!<br>" . $conn->error . "<br>";
}

$stmt = $conn->prepare("SELECT `KodeKategori`, `NamaKategori` FROM `kategoribarang` ORDER BY `KodeKategori`;");
$stmt->execute();
$result = $stmt->get_result();

$return_arr = array();
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		array_push($return_arr, array(
			'KodeKategori' => $row['KodeKategori'],
			'NamaKategori' => $row['NamaKategori']
		));
	}
}
echo json_encode($return_arr);
$stmt->close();
$conn->close();
?>