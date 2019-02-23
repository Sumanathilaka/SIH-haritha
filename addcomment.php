
<?php

$time=date("Y-m-d H:i:s",time());



include_once('db-connect.php');

$comment=mysqli_real_escape_string($conn, $_POST['comment']);
$username=mysqli_real_escape_string($conn, $_POST['username']);
$postid=mysqli_real_escape_string($conn, $_POST['postid']);

echo $comment;
echo $username;
echo $postid;

$sql = " INSERT INTO comment(username,comment,time,post_id) VALUES ('$username','$comment','$time','$postid')";
 
 if (mysqli_query($conn, $sql) === TRUE) {
echo "<script>window.location.href='home.php';</script>";
} else {
   echo "";
}



?> 