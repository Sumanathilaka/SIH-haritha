<?php 

include 'admin-verify-loggedin.php'; 
include 'db-connect.php';

$vol_stmt = $conn->prepare("SELECT latitude, longitude FROM userdetails");
$vol_stmt->execute();
$result = $vol_stmt->get_result();

$volunteer_lat = array();
$volunteer_lng = array();
while($row = $result->fetch_assoc()) {
  array_push($volunteer_lat, $row['latitude']);
  array_push($volunteer_lng, $row['longitude']);
}
$vol_stmt->close();

$coord_stmt = $conn->prepare("SELECT latitude, longitude FROM coordinator");
$coord_stmt->execute();
$result = $coord_stmt->get_result();

$coordinator_lat = array();
$coordinator_lng = array();
while($row = $result->fetch_assoc()) {
  array_push($coordinator_lat, $row['latitude']);
  array_push($coordinator_lng, $row['longitude']);
}
$coord_stmt->close();
?>

<!DOCTYPE html>
<html>

<head>
  <?php include 'admin-head.php'; ?>
  <style>
    #map {
      height: 500px;
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
    
      <div id="map" class="w3-margin-left w3-margin-bottom"></div>      
    
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
  // In the following example, markers appear when the user clicks on the map.
  function initialize() {
    var bangalore = { lat: 12.97, lng: 77.59 };
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: bangalore
    });

    // Add a marker for each coordinator in the map.
    <?php for($index=0 ; $index<count($coordinator_lng) ; $index++) { ?>
        var location = { lat: <?php echo $coordinator_lat[$index]; ?>, lng: <?php echo $coordinator_lng[$index]; ?> };
        var marker = addCoordinatorMarker(location, map);
    <?php } ?>

    // Add a marker for each volunteer in the map.
    <?php for($index=0 ; $index<count($volunteer_lng) ; $index++) { ?>
        var location = { lat: <?php echo $volunteer_lat[$index]; ?>, lng: <?php echo $volunteer_lng[$index]; ?> };
        var marker = addVolunteerMarker(location, map);
    <?php } ?>

    // Adds a marker to the map.
    function addCoordinatorMarker(location, map) {
      var marker = new google.maps.Marker({
        position: location,
        icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
        map: map
      });
    }

    // Adds a marker to the map.
    function addVolunteerMarker(location, map) {
      var marker = new google.maps.Marker({
        position: location,
        icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
        map: map
      });
    }
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUq0Rqaf-6xMQFrxjlPR__DtQNKx61YqE&callback=initialize&libraries=places" async defer></script>
</body>
</html>

