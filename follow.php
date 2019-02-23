
<?php


include_once('db-connect.php');
$followee=mysqli_real_escape_string($conn, $_POST['followee']);
$username=mysqli_real_escape_string($conn, $_POST['follower']);
$one=1;

$msg= $username." followed you";

$sql1 = " INSERT INTO notification(username,notification,notificationtype) VALUES ('$followee','$msg','$one')";
mysqli_query($conn, $sql1);


$sql = " INSERT INTO followtable(follower,followee) VALUES ('$username','$followee')";
 
 if (mysqli_query($conn, $sql) === TRUE) {
echo "<script>window.location.href='home.php';</script>";
} else {
   echo "";
}




?> 