<?php 
 
 include 'db-connect.php' ;
 $username=$_POST['username'];
 $reason = $_POST['question'];
 $challenge_id=$_POST['challenge_id'] ;
 $notificationtype = 6;
$challenge_state=3 ;

 if(isset($_POST['approve']))
 	{
 		$challenge_state = 2 ; 
 	}
 	

 //echo 1 ;
 //echo $username ;
 //echo $reason ;
 //echo $challenge_id ;

 $sql = " INSERT INTO notification(username,notification,notificationtype) VALUES('$username', '$reason' , '$notificationtype')  ";
 

 
 if (mysqli_query($conn, $sql) === FALSE) {
   echo "<script>alert('Something Went Wrong !!');window.location.href='coordinator_verification.php';</script>";
}

 $sql1= " UPDATE  challenges
 		SET challenge_state = '$challenge_state'
 		WHERE challenge_id = '$challenge_id' 
 		" ;
if (mysqli_query($conn, $sql1) === TRUE) {
echo "<script>alert('Challenge status has been updated ');window.location.href='coordinator_verification.php';</script>";
} else {
   echo "<script>alert('Something Went Wrong !!');window.location.href='coordinator_verification.php';</script>";
}


?>