<?php 


include 'db-connect.php';
session_start();
$_SESSION['username'] = 'venky';
$username = 'venky' ;
$vol_stmt = $conn->prepare("
  SELECT latitude, longitude , name, image_id
  FROM userdetails 
  WHERE userdetails.coordinator = '$username' 
  ");
$vol_stmt->execute();
$result = $vol_stmt->get_result();

$volunteer_lat = array();
$volunteer_lng = array();
$volunteer_users = array() ;
$volunteer_pics = array() ;
while($row = $result->fetch_assoc()) {
  array_push($volunteer_lat, $row['latitude']);
  array_push($volunteer_lng, $row['longitude']);
  array_push($volunteer_users, $row['name']);

  $image_id = $row['image_id'];
  if($image_id == NULL) {
    $image_id = "./images/avatar.png";
  }
  else {
    $image_id = "./images/".$image_id;
  }
  array_push($volunteer_pics, $image_id);
}
$vol_stmt->close();


?>

<!DOCTYPE html>
<html>

<head>
  <?php include 'coordinator_head.php'; ?>
  <style>
    #map {
      height: 500px;
    }
  </style>
</head>

<body class="w3-theme-l5">

<!-- Navbar -->
<?php include "coordinator_navbar.php"; ?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <?php include "coordinator_side_panel.php"; ?>          
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
<?php include "coordinator_footer.php"; ?>
 
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

    var infowindow;
    // Add a marker for each volunteer in the map.
    <?php for($index=0 ; $index<count($volunteer_lng) ; $index++) { ?>
        var location = { lat: <?php echo $volunteer_lat[$index]; ?>, lng: <?php echo $volunteer_lng[$index]; ?> };
        var contentString = '<img src= "<?php echo $volunteer_pics[$index]; ?>" width="40" height="40" class="w3-circle"/><?php echo $volunteer_users[$index]; ?>';
        var marker = addVolunteerMarker(location, map, contentString);
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
    function addVolunteerMarker(location, map, contentString) {
      var marker = new google.maps.Marker({
        position: location,
        icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
        map: map
      });
      var infowindow = new google.maps.InfoWindow({
          content: contentString
        });
      marker.addListener('mouseover', function() {
           infowindow.open(map, marker);
       });
      marker.addListener('mouseout', function() {
           infowindow.close(map, marker);
       });
    }
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUq0Rqaf-6xMQFrxjlPR__DtQNKx61YqE&callback=initialize&libraries=places" async defer></script>
</body>
</html>

