<?php

include 'admin-verify-loggedin.php';
include 'db-connect.php';

$username = $_POST['username'];
$role = "COORDVOLUNTEER";

if($stmt = $conn->prepare("UPDATE login SET role=? WHERE username=?")) {
  if($stmt->bind_param("ss", $role, $username)) {
    if($stmt->execute()) {
      $usr_stmt = $conn->prepare("SELECT * FROM userdetails WHERE username=?");
      $usr_stmt->bind_param("s", $username);
      $usr_stmt->execute();
      $usr_result = $usr_stmt->get_result();

      while($usr_row = $usr_result->fetch_assoc()) {
        $name = $usr_row['name'];
        $email = $usr_row['email'];
        $mobile = $usr_row['mobile'];
        $address = $usr_row['address'];
        $latitude = $usr_row['latitude'];
        $longitude = $usr_row['longitude'];
        $postalcode = $usr_row['postalcode'];
        $profile_pic = $usr_row['image_id'];

        if($coord_stmt = $conn->prepare("INSERT INTO coordinator (username, name, email, mobile, address, latitude, longitude, postalcode, image_id) VALUES (?,?,?,?,?,?,?,?,?)")) {
          if($coord_stmt->bind_param("sssisddis", $username, $name, $email, $mobile, $address, $latitude, $longitude, $postalcode, $image_id)) {
            if($coord_stmt->execute()) {
              if($req_stmt = $conn->prepare("DELETE FROM coordinator_request WHERE username=?")) {
                if($req_stmt->bind_param("s", $username)) {
                  if($req_stmt->execute()) {
                    $notification = "Congratulations, now you are a coordinator.";
                    $notificationtype = 1;
                    $notif_stmt = $conn->prepare("INSERT INTO notification (username, notification, notificationtype) VALUES (?,?,?)");
                    $notif_stmt->bind_param("ssi", $username, $notification, $notificationtype);
                    $notif_stmt->execute();
                    $notif_stmt->close();
                  }   
                }
              }
              $req_stmt->close();
            }
          }
        }
        $coord_stmt->close();
      }
      $usr_stmt->close();
    }
  }
}
$stmt->close();
$conn->close();

header("Location: admin.php");
?>