<?php 

session_start();
$_SESSION["username"] = 'venky';
$username = $_SESSION["username"];
// include 'coordinator_verify_loggedin.php';

?>

<!DOCTYPE html> 
<html>

<head>
 <?php include 'coordinator_head.php'; ?>
</head>

<body class="w3-theme-l5">

<!-- Navbar -->
<?php include 'coordinator_navbar.php'; ?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <?php include 'coordinator_side_panel.php'; ?>          
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
    <!-- Retrieve posts  -->
    <?php 
    include 'db-connect.php';
    $username = $_SESSION["username"] ;
    $sql2 = "
      SELECT userdetails.username, notification.notification  , userdetails.image_id
      FROM notification INNER JOIN userdetails
      WHERE notification.username = userdetails.username and userdetails.coordinator = '$username' and ( notification.notificationtype = 5 or notification.notificationtype = 7)   
      ORDER BY notification.notificationid DESC
    ";
    $sql3 = " 
    UPDATE notification  
    SET notificationtype = 7 
    WHERE notificationtype = 5 and username in ( SELECT username FROM userdetails WHERE coordinator='$username')
    " ;
    $result1= mysqli_query($conn, $sql3);
    $result= mysqli_query($conn, $sql2);
   // echo mysqli_num_rows($result) ;
   // echo $username ;
    if (mysqli_num_rows($result) > 0) {

      while($row = $result->fetch_assoc()) {
        $name=$row['username'];
        $notification=$row['notification'] ;
        $image_id=$row['image_id'] ;  
        if($image_id == NULL) {
          $image_id = "./images/avatar.png";
        }
        else {
          $image_id = "./images/".$image_id;
        }
    ?>

    <div class="w3-container w3-card w3-white w3-round w3-margin-bottom w3-margin-right w3-margin-left"><br>
      <img src= "<?php echo $image_id; ?>" width="40" height="40" class="w3-circle"/>
      <span class="w3-right w3-opacity"><?php echo $time; ?></span>
      <b> <?php echo $name; ?></b><br>
      <hr class="w3-clear">
      <p><?php echo $notification; ?></p>

      
      </div>

      <!-- Retrieve comments of post -->
      
<?php
  } 
}

  

?>
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column <--></-->
    <div class="w3-col m2"> 
      <?php include 'admin-coordinator-request.php'; ?>
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<?php include 'coordinator_footer.php'; ?>
 
</body>
</html> 

