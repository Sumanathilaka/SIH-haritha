<?php 

include 'db-connect.php'; 

$stmt = $conn->prepare("SELECT profile_pic FROM admin WHERE username=?");
$stmt->bind_param("s", $username);
$username = $_SESSION["username"];
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows === 0) exit('No rows');

while($row = $result->fetch_assoc()) {
  $profile_pic = $row['profile_pic'];
}

if($profile_pic == NULL) {
  $profile_pic = "./images/avatar.png";
}
else {
  $profile_pic = "./images/".$profile_pic;
}

$stmt->close();
$conn->close();
?>

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="admin.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-tree w3-margin-right"></i>Haritha Hara</a>
  <div class="w3-dropdown-hover w3-hide-small w3-right w3-margin-left">
    <button class="w3-button w3-padding-large" title="Settings">
      <img src="<?php echo $profile_pic; ?>" class="w3-circle" style="height:27px;width:27px" alt="Avatar">
    </button>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="right:0;">
      <a href="admin-account-settings.php" class="w3-bar-item w3-button">Account Settings</a>
      <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    </div>
  </div>
  <div class="w3-right w3-dropdown-hover w3-hide-small" style="height: 50px;" >
    <form style="margin:0;" autocomplete="off" action="admin-view-volunteer.php" method="POST">
      <input name="name" class="search_text w3-input w3-transparent w3-text-white w3-border w3-border-grey w3-round-large" placeholder="Search" style="height: 34px; margin-top: 9px; padding-left: 14px;">
      <input class="username" type="hidden" name="username">
      <input class="url" type="hidden" name="url" value="admin-autocomplete-name.php">
      <div class="result w3-card-4 w3-bar-block w3-dropdown-content"></div>
      <button class="w3-button w3-right" title="Search" style="position: relative; top: -39px;" onclick="submitForm(this)"><i class="fa fa-search w3-text-white"></i></button>
    </form>
  </div>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
  <a href="admin.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
  <a href="admin-account-settings.php" class="w3-bar-item w3-button w3-padding-large">Account Settings</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
</div>


<div class="w3-margin">
  <div class="w3-dropdown-hover w3-hide-large w3-hide-medium w3-block" style="top: 55px;">
    <form autocomplete="off" action="admin-view-volunteer.php" method="POST">
      <input name="name" class="search_text w3-input w3-transparent w3-theme w3-text-white w3-round-large" placeholder="Search" style="height: 34px; margin-top: 9px; padding-left: 14px;">
      <input class="username" type="hidden" name="username">
      <input class="url" type="hidden" name="url" value="admin-autocomplete-name.php">
      <div class="result w3-card-4 w3-bar-block w3-dropdown-content"></div>
      <button class="w3-button w3-right" title="Search" style="position: relative; top: -37px;" onclick="submitForm(this)"><i class="fa fa-search w3-text-white"></i></button>
    </form>
  </div>
</div>

<script type="text/javascript"> 
// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}  

// Used to submit closest form
function submitForm(input) {
  $(input).closest("form").submit();
}
</script>

<script src="./js/autocomplete.js" type="text/javascript"></script>