<?php

include 'db-connect.php';

session_start();
if(!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit;
}

$username = $_SESSION['username'];
$role = "ADMIN";

$stmt = $conn->prepare("SELECT * FROM login WHERE username = ? AND role = ?");
$stmt->bind_param("ss", $username, $role);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows == 0){
	header("Location: login.php");
	exit;
}

$stmt->close();
$conn->close();

?>