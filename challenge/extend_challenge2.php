<?php


$uploaddir = 'C:\xampp\htdocs\SIH\challenge\pics\\';
$challenge=$_POST['challenge'];
$stage=$_POST['stage'];
$filename=$_POST['filename'];
echo $challenge;
echo $stage;
echo $filename;

if ($_FILES["fileToUpload"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["fileToUpload"]["error"] . "<br />";
    }
else{
$imageName = $filename . '.' . pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION);
move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploaddir . $imageName);

echo $imageName;

$username='deshank';
include_once('db-connect.php');

echo "<br>";

$sql = "UPDATE challenges SET stage".$stage."=1  WHERE challenge_no=".$challenge." AND username='".$username."'";
echo $sql;
echo "<br>";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$sql = "UPDATE challenges SET stage".$stage."_pic='".$imageName."'  WHERE challenge_no=".$challenge." AND username='".$username."'";
echo $sql;
echo "<br>";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
echo "<br>";

$text = "Sorry for the last post. Changed the picture of stage ".$stage." of challenge ".$challenge;
$posttype = 1;
$picture2 = 'null';

$sql = "INSERT INTO postdetails(username,picture,text,posttype,picture2) VALUES ('$username','$imageName','$text',$posttype,'$picture2')";
echo $sql;
echo "<br>";
 
 if (mysqli_query($conn, $sql) === TRUE) {
echo "Record updated successfully";
} else {
   echo "Error updating record: " . $conn->error;
}

echo "<br>";

$sql = "SELECT MAX(post_id) AS max FROM postdetails";
$result= mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$postid = $row['max'];



//$rowSQL = mysqli_query( "SELECT MAX(post_id) AS max FROM `postdetails`;" );
//echo $rowSQL;
//$row = mysql_fetch_array( $rowSQL );
//$postid = $row['max'];
//echo "<br>";

$sql = "UPDATE challenges SET stage".$stage."_postid='".$postid."'  WHERE challenge_no=".$challenge." AND username='".$username."'";
echo $sql;
echo "<br>";
if (mysqli_query($conn, $sql) === TRUE) {
echo "Record updated successfully";
} else {
   echo "Error updating record: " . $conn->error;
}


$conn->close();
header("Location: ../myprofile.php");
}
?>