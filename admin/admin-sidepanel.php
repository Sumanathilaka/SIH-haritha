<?php 

include 'db-connect.php'; 

$username = $_SESSION["username"];

$stmt = $conn->prepare("SELECT name, email, telephone, profile_pic FROM admin WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) exit('No rows');

while($row = $result->fetch_assoc()) {
  $name = $row['name'];
  $email = $row['email'];
  $telephone = $row['telephone'];
  $profile_pic = $row['profile_pic'];
}

if($profile_pic == NULL) {
  $profile_pic = "./images/avatar.png";
}
else {
  $profile_pic = "./images/".$profile_pic;
}

$stmt->close();

$stmt = $conn->prepare("SELECT * FROM newquestion");
$stmt->execute();
$result = $stmt->get_result();
$new_questions_count = $result->num_rows;
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
    <a href="admin-manage-coordinators.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-pencil fa-fw w3-margin-right"></i> Manage Coordinators</a>
    <a href="admin-manage-volunteers.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-pencil fa-fw w3-margin-right"></i> Manage Volunteers</a>
    <a href="admin-get-map.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-map fa-fw w3-margin-right"></i> See all</a>
    <a href="admin-manage-QA.php" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-comments fa-fw w3-margin-right"></i> Q & A<span class="w3-badge w3-right w3-small w3-white w3-text-theme"><?php echo $new_questions_count; ?></span></a>
  </div>      
</div>
<br>