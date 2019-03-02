<?php
   include("config.php");
   session_start();
   $query = "INSERT INTO UserDetails (firstname, lastname, username, password, email, number, address, city, pincode, state, country, longitude, latitude) VALUES
   ('" . $_POST["firstname"] . "', '" . $_POST["lastname"] . "','" . $_POST["rusername"] . "', 
   '" .($_POST["password"]) . "', '" . $_POST["email"] . "', '" . $_POST["number"] . "',
   '" .($_POST["address"]) . "','" .($_POST["city"]) . "','" .($_POST["pincode"]) . "',
   '" .($_POST["state"]) . "','" .($_POST["country"]) . "','" .($_POST["longitude"]) . "','" .($_POST["latitude"]) . "')";
   
    mysqli_query($db, $query);
  	$_SESSION['username'] = $_POST['rusername'];
  	$_SESSION['success'] = "You are now logged in";
  	header('location: home.php');
 ?>  