<?php 
include 'admin-verify-loggedin.php';
include 'db-connect.php';

$_SESSION['admin_remove_volunteer_status'] = "FAILED";
$username = $_POST['username'];

$stmt = $conn->prepare("SELECT * FROM userdetails WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) {
  $_SESSION['admin_remove_volunteer_error'] = "Invalid username";
  header("Location: admin-manage-volunteers.php");
  exit();
}

$stmt1 = $conn->prepare("DELETE FROM userdetails WHERE username=?");
$stmt2 = $conn->prepare("DELETE FROM login WHERE username=?");
if($stmt1 and $stmt2) {
  if($stmt1->bind_param("s", $username) and $stmt2->bind_param("s", $username)) {
    if($stmt1->execute() and $stmt2->execute()) {
      $_SESSION['admin_remove_volunteer_status'] = "SUCCESS";
    }
  }
}

header("Location: admin-manage-volunteers.php");

?>