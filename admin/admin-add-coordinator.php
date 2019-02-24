<?php

include 'admin-verify-loggedin.php';
include 'db-connect.php'; 

$uploaddir = 'images/';

$_SESSION['admin_add_coordinator_status'] = "FAILED";
$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];
$latitude = $_POST['lat'];
$longitude = $_POST['lng'];
$postalcode = $_POST['postalcode'];
$profile_pic = NULL;
$password = "password";
$role = "COORDINATOR";

if (count($_FILES) > 0) {
    if ($_FILES['profile_pic']['tmp_name'] != NULL) {
		$upload_file_path = $uploaddir . basename($_FILES['profile_pic']['tmp_name']);
        $profile_pic = file_put_contents($upload_file_path, file_get_contents($_FILES['profile_pic']['tmp_name']));
    }
}

$verify_response = verify_data($username, $name, $email, $telephone, $address, $latitude, $longitude, $postalcode);

if(!$verify_response['status']){
	$_SESSION['admin_add_coordinator_error'] = $verify_response['error_message'];
	header("Location: admin-manage-coordinators.php");
	exit;
}

$stmt = $conn->prepare("SELECT * FROM login WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows != 0){
	$_SESSION['admin_add_coordinator_error'] = "Username already exists";
	header("Location: admin-manage-coordinators.php");
	exit;
}
$stmt->close();

$stmt1 = $conn->prepare("INSERT INTO login (username, password, role) VALUES (?,?,?)");
$stmt2 = $conn->prepare("INSERT INTO coordinator (username, name, email, mobile, address, latitude, longitude, postalcode, image_id) VALUES (?,?,?,?,?,?,?,?,?)");

if($stmt1 and $stmt2) {
	if($stmt1->bind_param("sss", $username, $password, $role) and $stmt2->bind_param("sssisddis", $username, $name, $email, $telephone, $address, $latitude, $longitude, $postalcode, $upload_file_path)) {
		if($stmt1->execute() and $stmt2->execute()) {
			$_SESSION['admin_add_coordinator_status'] = "SUCCESS";
		}
	}
}

$conn->close();

header("Location: admin-manage-coordinators.php");


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function verify_data($username, $name, $email, $telephone, $address, $latitude, $longitude, $postalcode) {
	$username = test_input($username);
	$name = test_input($name);
	$email = test_input($email);
	$telephone = test_input($telephone);
	$address = test_input($address);
	$latitude = test_input($latitude);
	$longitude = test_input($longitude);
	$postalcode = test_input($postalcode);

    $verify_response['status'] = false;

	if(empty($username)) {
		$verify_response['error_message'] = "Username cannot be empty";
		return $verify_response;
	}
	if(empty($name)) {
		$verify_response['error_message'] = "Name cannot be empty";
		return $verify_response;
	}
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		$verify_response['error_message'] = "Only letters and white space allowed"; 
		return $verify_response;
	}
	if(empty($email)) {
		$verify_response['error_message'] = "Email cannot be empty";
		return $verify_response;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$verify_response['error_message'] = "Invalid email format"; 
		return $verify_response;
	}
	if(empty($telephone)) {
		$verify_response['error_message'] = "Telephone cannot be empty";
		return $verify_response;
	}
	if(!is_numeric($telephone)) {
		$verify_response['error_message'] = "Telephone number must be numeric";
		return $verify_response;
	}
	if(strlen((string)$telephone)>10) {
		$verify_response['error_message'] = "Telephone number can have maximum 10 digits";
		return $verify_response;
	}
	if(empty($address)) {
		$verify_response['error_message'] = "Address cannot be empty";
		return $verify_response;
	}
	if(empty($longitude) || empty($latitude)) {
		$verify_response['error_message'] = "Location cannot be empty";
		return $verify_response;
	}
	if(!is_numeric($latitude) || !is_numeric($longitude)) {
		$verify_response['error_message'] = "Invalid coordinates";
		return $verify_response;
	}
	if(empty($postalcode)) {
		$verify_response['error_message'] = "Postal code cannot be empty";
		return $verify_response;
	}
	if(!is_numeric($postalcode)) {
		$verify_response['error_message'] = "Postal code must be numeric";
		return $verify_response;
	}
	if(strlen((string)$postalcode)>6) {
		$verify_response['error_message'] = "Postal code can have maximum 6 digits";
		return $verify_response;
	}

    $verify_response['status'] = true;
	return $verify_response;
}
?>