<?php

include 'admin-verify-loggedin.php';
include 'db-connect.php';

$stmt = $conn->prepare("SELECT * FROM coordinator_request");
$stmt->bind_param();
$stmt->execute();
$result = $stmt->get_result();

$coordinator_requests = "";
while($row = $result->fetch_assoc()) {
  $username = $row['username'];

  $usr_stmt = $conn->prepare("SELECT name, image_id FROM userdetails WHERE username=?");
  $usr_stmt->bind_param("s", $username);
  $usr_stmt->execute();
  $usr_result = $usr_stmt->get_result();

  while($usr_row = $usr_result->fetch_assoc()) {
    $name = $usr_row['name'];
    $profile_pic = $usr_row['image_id'];
    if($profile_pic == NULL) {
      $profile_pic = "./img/avatar.png";
    }

    $coordinator_requests = $coordinator_requests .
      '<div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Coordinator Request</p>
          <form action="admin-view-volunteer.php" method="post">
            <div style="cursor:pointer;" onclick="submitForm(this)">
              <img src="'. $profile_pic .'" alt="Avatar" style="width:50%"><br>
              <span>'. $name .'</span>
              <input type="hidden" name="username" value="'. $username .'">
            </div>
          </form>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <form action="admin-accept-coordinator-request.php" method="post">
                <input type="hidden" name="username" value="'. $username .'">
                <button class="w3-button w3-block w3-green w3-section" title="Accept" onclick="submitForm(this)"><i class="fa fa-check"></i></button>
              </form>
            </div>
            <div class="w3-half">
              <form action="admin-reject-coordinator-request.php" method="post">
                <input type="hidden" name="username" value="'. $username .'">
                <button class="w3-button w3-block w3-red w3-section" title="Reject" onclick="submitForm(this)"><i class="fa fa-remove"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <br>';
  }
}  

echo $coordinator_requests;   
?>

<script>
  // Used to submit closest form
function submitForm(input) {
  $(input).closest("form").submit();
}
</script>