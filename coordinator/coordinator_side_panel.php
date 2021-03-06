<?php 

include 'db-connect.php'; 

$username = $_SESSION["username"];

$stmt = $conn->prepare("SELECT name, email, mobile, image_id FROM coordinator WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) exit('No rows');

while($row = $result->fetch_assoc()) {
  $name = $row['name'];
  $email = $row['email'];
  $telephone = $row['mobile'];
  $profile_pic = $row['image_id'];
}

if($profile_pic == NULL) {
  $profile_pic = "./images/avatar.png";
}
else {
  $profile_pic = "./images/".$profile_pic;
}

$stmt->close();

$stmt = $conn->prepare("
  SELECT * FROM notification,userdetails WHERE notification.notificationtype = 5 and userdetails.username=notification.username and userdetails.coordinator = ? 
");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$new_users_count = $result->num_rows;
$stmt->close();

$stmt = $conn->prepare("
  SELECT * FROM challenges,userdetails WHERE challenges.challenge_state=1 and challenges.seen = 0 and userdetails.username=challenges.username and userdetails.coordinator = ? 
");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$new_challenges_count = $result->num_rows;
$stmt->close();


$conn->close();
?>

<!-- Profile -->
<div class="w3-card w3-round w3-white">
  <div class="w3-container">
   <h4 class="w3-center">My Profile</h4>
   <p class="w3-center"><img src="<?php echo $profile_pic; ?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
   <hr>
   <p><i class="fa fa-user fa-fw w3-margin-right w3-text-theme"></i> <?php echo $name; ?></p>
   <p><i class="fa fa-envelope fa-fw w3-margin-right w3-text-theme"></i> <?php echo $email; ?></p>
   <p><i class="fa fa-phone fa-fw w3-margin-right w3-text-theme"></i> <?php echo $telephone; ?></p>
  </div>
</div>
<br>

<!-- Accordion -->
<div class="w3-card w3-round">
  <div class="w3-white">
    <a href="coordinator_verification.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-tree fa-fw w3-margin-right"></i> Challenge notifications <span class="w3-badge w3-right w3-small w3-white w3-text-theme"><?php echo $new_challenges_count; ?></span></a>
    <a href="coordinator_newusers.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-pencil fa-fw w3-margin-right"></i> New Users <span class="w3-badge w3-right w3-small w3-white w3-text-theme"><?php echo $new_users_count; ?></span></a>
    <a href="coordinator_get_map.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-map fa-fw w3-margin-right"></i> View Volunteers</a>
  </div>      
</div>
<br>