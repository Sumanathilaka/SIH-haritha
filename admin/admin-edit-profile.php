<?php

include 'admin-verify-loggedin.php';
include 'db-connect.php'; 

$uploaddir = 'images/';

$username = $_SESSION['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$profile_pic = NULL;

if (count($_FILES) > 0) {
    if ($_FILES['profile_pic']['tmp_name'] != NULL) {
		$upload_file_path = $uploaddir . basename($_FILES['profile_pic']['tmp_name']);
        $profile_pic = file_put_contents($upload_file_path, file_get_contents($_FILES['profile_pic']['tmp_name']));
    }
}

$verify_response = verify_data($name, $email, $telephone);

if(!$verify_response['status']){
	$_SESSION['admin_edit_profile_error'] = $verify_response['error_message'];
	header("Location: admin-account-settings.php");
	exit;
}

$transaction_status = "FAILED";
if($profile_pic == NULL) {
	$stmt = $conn->prepare("UPDATE admin SET name=?,  email=?, telephone=? WHERE username=?");

	if($stmt) {
		if($stmt->bind_param("ssis", $name, $email, $telephone, $username)) {
			if($stmt->execute()) {
				$transaction_status = "SUCCESS";
			}
		}
	}
} else {
	$stmt = $conn->prepare("UPDATE admin SET name=?,  email=?, telephone=?, profile_pic=? WHERE username=?");

	if($stmt) {
		if($stmt->bind_param("ssiss", $name, $email, $telephone, $upload_file_path, $username)) {
			if($stmt->execute()) {
				$transaction_status = "SUCCESS";
			}
		}
	}
}

$stmt->close();
$conn->close();

if($transaction_status == "FAILED") {
	$_SESSION['admin_edit_profile_error'] = "Incorrect values";
}

header("Location: admin-account-settings.php");


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function verify_data($name, $email, $telephone) {
	$name = test_input($name);
	$email = test_input($email);
	$telephone = test_input($telephone);

    $verify_response['status'] = false;

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

    $verify_response['status'] = true;
	return $verify_response;
}
?>