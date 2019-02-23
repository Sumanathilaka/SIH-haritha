
<?php

include_once('db-connect.php');

$username=mysqli_real_escape_string($conn, $_POST['username']);
$postid=mysqli_real_escape_string($conn, $_POST['postid']);
$report=mysqli_real_escape_string($conn, $_POST['report']);

 
$sql = " INSERT INTO report(reporter,postid,reason) VALUES ('$username','$postid','$report')";
 
 if (mysqli_query($conn, $sql) === TRUE) {
echo "<script>window.location.href='home.php';</script>";
} else {
   echo "";
}

?> 