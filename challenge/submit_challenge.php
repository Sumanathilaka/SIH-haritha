<?php

$username='deshank';
$challenge=$_POST['challenge'];
echo $challenge;
echo "<br>";

include_once('db-connect.php');

$sql = "SELECT stage1_pic,stage5_pic FROM challenges WHERE challenge_no=".$challenge." AND username='".$username."'";
echo $sql;
echo "<br>";
$result= mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$picture = $row['stage1_pic'];
$picture2 = $row['stage5_pic'];

echo $picture;
echo "<br>";
echo $picture2;
echo "<br>";

$text = "Hurrah just completed challenge ".$challenge.". Have a glimpse from where I started and where I ended.";
$posttype = 2;

$sql = "INSERT INTO postdetails(username,picture,text,posttype,picture2) VALUES ('$username','$picture','$text',$posttype,'$picture2')";
echo $sql;
echo "<br>";
 
 if (mysqli_query($conn, $sql) === TRUE) {
echo "Record updated successfully";
} else {
   echo "Error updating record: " . $conn->error;
}

$sql = "UPDATE challenges SET challenge_state=1  WHERE challenge_no=".$challenge." AND username='".$username."'";
echo $sql;
echo "<br>";
if (mysqli_query($conn, $sql) === TRUE) {
echo "Record updated successfully";
} else {
   echo "Error updating record: " . $conn->error;
}
header("Location:  ../myprofile.php");

?>