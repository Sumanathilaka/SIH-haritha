<?php

$db_host='localhost';
$db_user='deshan';
$db_pwd='ddash1234';
$database='harithahara';


$conn = new mysqli($db_host,$db_user,$db_pwd,$database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
