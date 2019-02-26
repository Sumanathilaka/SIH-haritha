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
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}


$conn->close();

header("Location: challenge.php");
   exit;


}


?> 

<!--
$uploadfile1 = $uploaddir . basename($_FILES['photo1']['name']);
$uploadfile2 = $uploaddir . basename($_FILES['photo2']['name']);
$pname1 = $_FILES['photo1']['name'];
$pname2 = $_FILES['photo2']['name'];
$location='NITC';
$time=date("Y-m-d H:i:s",time());
echo "<p>";
if ($pname1!=NULL){
file_put_contents($uploadfile1, file_get_contents($_FILES['photo1']['tmp_name']));
}
else{
  $pname1='null';
}
if ($pname2 != NULL){
file_put_contents($uploadfile2, file_get_contents($_FILES['photo2']['tmp_name']));
}
else{
  $pname2='null';
}
$username='viggnahs';
include_once('db-connect.php');
$text=mysqli_real_escape_string($conn, $_POST['post']);
$sql = " INSERT INTO postdetails(username,picture,text,location,time,picture2) VALUES ('$username','$pname1','$text','$location','$time','$pname2')";
 
 if (mysqli_query($conn, $sql) === TRUE) {
echo "<script>alert('Your Post is uploaded');window.location.href='home.php';</script>";
} else {
   echo "<script>alert('Something Went Wrong !!');window.location.href='home.php';</script>";
}-->