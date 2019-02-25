<?php

include 'admin-verify-loggedin.php';
include 'db-connect.php';

$username = $_POST['username'];
$notificationtype = 1;

if($req_stmt = $conn->prepare("DELETE FROM coordinator_request WHERE username=?")) {
  if($req_stmt->bind_param("s", $username)) {
    if($req_stmt->execute()) {
      $notification = "Sorry, your request to become coordinator was rejected.";
      $notif_stmt = $conn->prepare("INSERT INTO notification (username, notification, notificationtype) VALUES (?,?,?)");
      $notif_stmt->bind_param("ssi", $username, $notification, $notificationtype);
      $notif_stmt->execute();
      $notif_stmt->close();
    }   
  }
}
$req_stmt->close();
$conn->close();

header("Location: admin.php");
?>