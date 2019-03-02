
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else { 
    document.getElementById("error").innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  console.log("hello");
  document.getElementById("location").value = "Latitude: " + position.coords.latitude + "," +
  "Longitude: " + position.coords.longitude;
  document.getElementById("latitude").value = position.coords.latitude;
  document.getElementById("longitude").value = position.coords.longitude;

}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      document.getElementById("error").innerHTML = "Please provide location access"
      break;
    case error.POSITION_UNAVAILABLE:
      document.getElementById("error").innerHTML = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      document.getElementById("error").innerHTML = "The request to get location timed out."
      break;
    case error.UNKNOWN_ERROR:
      document.getElementById("error").innerHTML = "An unknown error occurred."
      break;
  }
}
