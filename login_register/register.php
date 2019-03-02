<?php
   include("config.php");
   session_start();
   $query = "INSERT INTO UserDetails (FirstName, LastName, UserName, Password, Email, MobileNumber) VALUES
   ('" . $_POST["firstname"] . "', '" . $_POST["lastname"] . "','" . $_POST["rusername"] . "', '" .($_POST["password"]) . "', '" . $_POST["email"] . "', '" . $_POST["number"] . "')";
   
    mysqli_query($db, $query);
  	$_SESSION['username'] = $_POST['username'];
  	$_SESSION['success'] = "You are now logged in";
  	header('location: home.php');
 ?>  