
<?php

$time=date("Y-m-d H:i:s",time());
$db_host='localhost';
$db_user='deshan';
$db_pwd='ddash1234';
$database='harithahara';


$conn = new mysqli($db_host,$db_user,$db_pwd,$database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$comment=mysqli_real_escape_string($conn, $_POST['comment']);
$username=mysqli_real_escape_string($conn, $_POST['username']);
$postid=mysqli_real_escape_string($conn, $_POST['postid']);

$sql = " INSERT INTO comment(username,comment,time,post_id) VALUES ('$username','$comment','$time','$postid')";
 
 if (mysqli_query($conn, $sql) === TRUE) {
echo "<script>window.location.href='home.php';</script>";
} else {
   echo "";
}



?> 