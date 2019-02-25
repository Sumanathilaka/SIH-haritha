<?php

include 'admin-verify-loggedin.php';

$admin_add_volunteer_status = "";
if(isset($_SESSION['admin_add_volunteer_status'])) {
  $admin_add_volunteer_status = $_SESSION['admin_add_volunteer_status']; 
  unset($_SESSION['admin_add_volunteer_status']);
  
  if($admin_add_volunteer_status == "SUCCESS") {
    echo "<script>alert('Volunteer was added successfully');</script>";
  } else if ($admin_add_volunteer_status == "FAILED") {
    echo "<script>alert('Sorry, volunteer could not be added');</script>";
  }
}

$admin_remove_volunteer_status = "";
if(isset($_SESSION['admin_remove_volunteer_status'])) {
  $admin_remove_volunteer_status = $_SESSION['admin_remove_volunteer_status']; 
  unset($_SESSION['admin_remove_volunteer_status']);
  
  if($admin_remove_volunteer_status == "SUCCESS") {
    echo "<script>alert('Volunteer was removed successfully');</script>";
  } else if ($admin_remove_volunteer_status == "FAILED") {
    echo "<script>alert('Sorry, volunteer could not be removed');</script>";
  }
}

$admin_add_volunteer_error = "";
if(isset($_SESSION['admin_add_volunteer_error'])) {
  $admin_add_volunteer_error = $_SESSION['admin_add_volunteer_error']; 
  unset($_SESSION['admin_add_volunteer_error']);
}

$admin_remove_volunteer_error = "";
if(isset($_SESSION['admin_remove_volunteer_error'])) {
  $admin_remove_volunteer_error = $_SESSION['admin_remove_volunteer_error']; 
  unset($_SESSION['admin_remove_volunteer_error']);
}

?>

<!DOCTYPE html>
<html>

<head>
  <?php include 'admin-head.php'; ?>
  <style>
    #map {
      height: 300px;
    }
  </style>
</head>

<body class="w3-theme-l5">

<!-- Navbar -->
<?php include "admin-navbar.php"; ?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <?php include "admin-sidepanel.php"; ?>          
    <!-- End Left Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m9">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Enter the username of the volunteer</h6>
              <form action="admin-remove-volunteer.php" method="post">
                <input class="w3-border w3-padding w3-block" type="text" name="username">
                <p class="w3-right w3-text-red" style="font-size: 12px;"><?php echo $admin_remove_volunteer_error; ?></p>
                <button type="button" class="w3-button w3-red w3-margin-top w3-margin-bottom" onclick="submitForm(this)"><i class="fa fa-minus"></i> &nbsp;Remove</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="w3-container w3-theme w3-margin-top w3-margin-left w3-margin-right">
        <h2>New Volunteer</h2>
      </div>
      <div class="w3-container w3-card w3-white w3-round w3-margin-left w3-margin-right"><br>
        <form action="admin-add-volunteer.php" method="post" enctype="multipart/form-data">
          <p class="w3-center"><img id="profile-pic" src="./images/avatar.png" class="w3-circle" style="height:124px;width:124px" alt="Avatar"></p>
          <p class="w3-center"><input type="file" name="profile_pic" accept="image/*" onchange="readURL(this);"></p>
          <label><b>Username</b></label>
          <input class="w3-input w3-margin-bottom" type="text" name="username">
          <label><b>Name</b></label>
          <input class="w3-input w3-margin-bottom" type="text" name="name">
          <label><b>Email</b></label>
          <input class="w3-input w3-margin-bottom" type="email" name="email">
          <label><b>Telephone</b></label>
          <input class="w3-input w3-margin-bottom" type="tel" name="telephone">
          <label><b>Address</b></label>
          <input class="w3-input w3-margin-bottom" type="text" name="address">
          <label><b>Location</b></label>
          <input id="lat" type="hidden" name="lat">
          <input id="lng" type="hidden" name="lng">
          <div id="map" class="w3-margin-top w3-margin-bottom"></div>
          <label><b>Postal Code</b></label>
          <input class="w3-input w3-margin-bottom" type="text" name="postalcode">
          <p class="w3-right w3-text-red" style="font-size: 12px;"><?php echo $admin_add_volunteer_error; ?></p>
          <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom w3-margin-top" onclick="submitForm(this)"><i class="fa fa-plus"></i> &nbsp;Add</button> 
        </form>
      </div>
      
    <!-- End Right Column -->
    </div>
        
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<?php include "admin-footer.php"; ?>
 
<script>
  // Used to submit closest form
function submitForm(input) {
  $(input).closest("form").submit();
}

// Used to display image on selecting
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $("#profile-pic")
              .attr("src", e.target.result)
      };

      reader.readAsDataURL(input.files[0]);
  }
}
</script>

<script>
  // In the following example, markers appear when the user clicks on the map.
  function initialize() {
    var bangalore = { lat: 12.97, lng: 77.59 };
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: bangalore
    });

    // Add a marker at the center of the map.
    var marker = addMarker(bangalore, map);

    // This event listener calls addMarker() when the map is clicked.
    google.maps.event.addListener(map, 'click', function(event) {
      marker.setMap(null);
      addMarker(event.latLng, map);

    });

  // Adds a marker to the map.
  function addMarker(location, map) {
    // Add the marker at the clicked location
    $("#lat").val(location.lat);
    $("#lng").val(location.lng);

    marker = new google.maps.Marker({
      position: location,
      map: map
    });

    return marker;
  }
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUq0Rqaf-6xMQFrxjlPR__DtQNKx61YqE&callback=initialize&libraries=places" async defer></script>
</body>
</html>

