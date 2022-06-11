<?php
// Prepare MySQL connection
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
	die("MySQL connection failed: " . $conn->connect_error . "<br>");
}

$q = "DROP DATABASE IF EXISTS `assignment`;";
if ($conn->query($q) === FALSE) {
	http_response_code(500);
	echo "Can't drop database!<br>" . $conn->error . "<br>";
}

$q = "CREATE DATABASE IF NOT EXISTS `assignment`;";
if ($conn->query($q) === FALSE) {
	http_response_code(500);
	echo "Can't create database!<br>" . $conn->error . "<br>";
}

$q = "USE `assignment`;";
if ($conn->query($q) === FALSE) {
	http_response_code(500);
	echo "Can't use database!<br>" . $conn->error . "<br>";
}

$q = "CREATE TABLE IF NOT EXISTS `kategoribarang` (
  `KodeKategori` char(4) NOT NULL,
  `NamaKategori` varchar(50) NOT NULL,
  PRIMARY KEY (`KodeKategori`),
  UNIQUE KEY `NamaKategoriKey` (`NamaKategori`)
);";
if ($conn->query($q) === FALSE) {
	http_response_code(500);
	echo "Can't create table 'kategoribarang'!<br>" . $conn->error . "<br>";
}

$q = "INSERT INTO `kategoribarang` (`KodeKategori`, `NamaKategori`) VALUES
	('K001', 'Perlengkapan Mandi'),
	('K002', 'Alat Tulis Kantor'),
	('K003', 'Makanan');";
if ($conn->query($q) === FALSE) {
	http_response_code(500);
	echo "Can't insert values into table 'kategoribarang'!<br>" . $conn->error . "<br>";
}

$q = "CREATE TABLE IF NOT EXISTS `masterbarang` (
  `KodeBarang` char(4) NOT NULL,
  `NamaBarang` varchar(50) NOT NULL,
  `Kategori` varchar(50) NOT NULL,
  `Satuan` varchar(50) NOT NULL,
  `Jumlah` int(10) unsigned NOT NULL,
  `Harga` int(10) unsigned NOT NULL,
  PRIMARY KEY (`KodeBarang`),
  KEY `MasterBarangKategoriFK` (`Kategori`),
  CONSTRAINT `MasterBarangKategoriFK`
    FOREIGN KEY (`Kategori`)
    REFERENCES `kategoribarang` (`NamaKategori`)
    ON UPDATE CASCADE
	ON DELETE NO ACTION
);";
if ($conn->query($q) === FALSE) {
	http_response_code(500);
	echo "Can't create table 'masterbarang'!<br>" . $conn->error . "<br>";
}

$q = "CREATE TRIGGER `KategoriDeleteTrigger`
  BEFORE DELETE
  ON `kategoribarang` FOR EACH ROW
  DELETE FROM `masterbarang` WHERE `masterbarang`.`Kategori` = OLD.`NamaKategori`;"
if ($conn->query($q) === FALSE) {
	http_response_code(500);
	echo "Can't create trigger 'KategoriDeleteTrigger'!<br>" . $conn->error . "<br>";
}

$q = "INSERT INTO `masterbarang` (`KodeBarang`, `NamaBarang`, `Kategori`, `Satuan`, `Jumlah`, `Harga`) VALUES
	('B001', 'Sabun', 'Perlengkapan Mandi', 'Botol', 10, 25000),
	('B002', 'Pena', 'Alat Tulis Kantor', 'Lusin', 2, 20000),
	('B003', 'Roti Mawar', 'Makanan', 'Bungkus', 12, 8500);";
if ($conn->query($q) === FALSE) {
	http_response_code(500);
	echo "Can't insert values into table 'masterbarang'!<br>" . $conn->error . "<br>";
}

$conn->close();

header('Location: /');
?>