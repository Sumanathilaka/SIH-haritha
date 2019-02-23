
<?php

$uploaddir = 'C:\Apache24\htdocs\1social\pic\ ';
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
}



?> 