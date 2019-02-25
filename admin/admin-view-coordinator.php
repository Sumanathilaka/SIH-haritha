<?php

include 'admin-verify-loggedin.php';
include 'db-connect.php'; 

$username = $_POST['username'];

$verify_response = verify_data($username);

if(!$verify_response['status']){
	$_SESSION['admin_view_coordinator_error'] = $verify_response['error_message'];
	header("Location: admin-manage-coordinators.php");
	exit;
}

$stmt = $conn->prepare("SELECT * FROM coordinator WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows == 0){
	$_SESSION['admin_view_coordinator_error'] = "Incorrect username";
	header("Location: admin-manage-coordinators.php");
	exit;
}

$stmt->close();


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function verify_data($username) {
	$username = test_input($username);

    $verify_response['status'] = false;

	if(empty($username)) {
		$verify_response['error_message'] = "Username cannot be empty";
		return $verify_response;
	}

    $verify_response['status'] = true;
	return $verify_response;
}
?>