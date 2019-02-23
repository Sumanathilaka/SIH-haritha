
<?php


$db_host='localhost';
$db_user='deshan';
$db_pwd='ddash1234';
$database='harithahara';


$conn = new mysqli($db_host,$db_user,$db_pwd,$database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$followee=mysqli_real_escape_string($conn, $_POST['followee']);
$username=mysqli_real_escape_string($conn, $_POST['follower']);


$sql = " INSERT INTO followtable(follower,followee) VALUES ('$username','$followee')";
 
 if (mysqli_query($conn, $sql) === TRUE) {
echo "<script>window.location.href='home.php';</script>";
} else {
   echo "";
}



?> 