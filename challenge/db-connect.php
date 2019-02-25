<?php

$db_host='localhost';
$db_user='root';
$db_pwd='';
$database='harithaharaa';


$conn = new mysqli($db_host,$db_user,$db_pwd,$database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
