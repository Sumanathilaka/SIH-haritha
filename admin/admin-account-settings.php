<?php

include 'admin-verify-loggedin.php';
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
  $profile_pic = "./img/avatar.png";
}

$stmt->close();
$conn->close();

$admin_edit_profile_error = "";
if(isset($_SESSION['admin_edit_profile_error'])) {
  $admin_edit_profile_error = $_SESSION['admin_edit_profile_error']; 
  unset($_SESSION['admin_edit_profile_error']);
}

?>

<!DOCTYPE html>
<html>

<head>
  <?php include 'admin-head.php'; ?>
</head>

<body class="w3-theme-l5">

<!-- Navbar -->
<?php include 'admin-navbar.php'; ?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">      
  <div class="w3-container w3-theme">
    <h2>Edit Profile</h2>
  </div>
  <div class="w3-container w3-card w3-white w3-round"><br>
    <form action="admin-edit-profile.php" method="post" enctype="multipart/form-data">
      <p class="w3-center"><img id="profile-pic" src="<?php echo $profile_pic; ?>" class="w3-circle" style="height:124px;width:124px" alt="Avatar"></p>
      <p class="w3-center"><input type="file" name="profile_pic" accept="image/*" onchange="readURL(this);"></p>
      <label><b>Name</b></label>
      <input class="w3-input w3-margin-bottom" type="text" name="name" value="<?php echo $name; ?>">
      <label><b>Email</b></label>
      <input class="w3-input w3-margin-bottom" type="email" name="email" value="<?php echo $email; ?>">
      <label><b>Telephone</b></label>
      <input class="w3-input w3-margin-bottom" type="tel" name="telephone" value="<?php echo $telephone; ?>">
      <p class="w3-right w3-text-red" style="font-size: 12px;"><?php echo $admin_edit_profile_error; ?></p>
      <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom w3-margin-top" onclick="submitForm(this)"><i class="fa fa-pencil"></i> &nbsp;Save</button> 
    </form>
  </div>  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<?php include 'admin-footer.php'; ?>
 
<script>
  // Used to submit closest form
function submitForm(input) {
  $(input).closest('form').submit();
}

// Used to display image on selecting
function readURL(input) {
  console.log('ll')
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-pic')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</body>
</html> 
