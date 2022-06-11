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

$page = isset($_GET["page"]) ? $_GET["page"] : "1";
$stmt = $conn->prepare("SELECT `KodeBarang`, `NamaBarang`, `Kategori`, `Satuan`, `Jumlah`, `Harga` FROM `masterbarang` LIMIT ?,10;");
$pageOffset = (intval($page) - 1) * 10;
$stmt->bind_param('i', $pageOffset);
$stmt->execute();
$result = $stmt->get_result();

$return_arr = array();
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		array_push($return_arr, array(
			'KodeBarang' => $row['KodeBarang'],
			'NamaBarang' => $row['NamaBarang'],
			'Kategori' => $row['Kategori'],
			'Satuan' => $row['Satuan'],
			'Jumlah' => $row['Jumlah'],
			'Harga' => $row['Harga']
		));
	}
}
echo json_encode($return_arr);
$stmt->close();
$conn->close();
?>