<?php 
include 'admin-verify-loggedin.php';
include 'db-connect.php';

$_SESSION['admin_remove_coordinator_status'] = "FAILED";
$username = $_POST['username'];

$stmt = $conn->prepare("SELECT role FROM login WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()) {
	if($row['role'] == "COORDINATOR") {
		$stmt1 = $conn->prepare("DELETE FROM coordinator WHERE username=?");
		$stmt2 = $conn->prepare("DELETE FROM login WHERE username=?");
		if($stmt1 and $stmt2) {
		  if($stmt1->bind_param("s", $username) and $stmt2->bind_param("s", $username)) {
		    if($stmt1->execute() and $stmt2->execute()) {
		      $_SESSION['admin_remove_coordinator_status'] = "SUCCESS";
		    }
		  }
		}
	}	
	else if($row['role'] == "COORDIVOLUNTEER") {
		$role = "VOLUNTEER";
		$stmt1 = $conn->prepare("DELETE FROM coordinator WHERE username=?");
		$stmt2 = $conn->prepare("UPDATE login SET role=? WHERE username=?");
		if($stmt1 and $stmt2) {
		  if($stmt1->bind_param("s", $username) and $stmt2->bind_param("ss", $role, $username)) {
		    if($stmt1->execute() and $stmt2->execute()) {
		      $_SESSION['admin_remove_coordinator_status'] = "SUCCESS";
		    }
		  }
		}
	}
}

if($_SESSION['admin_remove_coordinator_status'] == "FAILED") {
  $_SESSION['admin_remove_coordinator_error'] = "Invalid username";
}

header("Location: admin-manage-coordinators.php");

?>