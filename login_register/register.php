<?php
   include("config.php");
   session_start();
   
    $pincode =$_POST['pincode'];
    $sql = "SELECT username FROM coordinator WHERE postalcode = '$pincode'";
    $result = mysqli_query($db,$sql);
    $count = mysqli_num_rows($result);
    $coordinator="";

    if($count >= 1) {
        $row = $result->fetch_assoc();
        $coordinator = $row['username'];
    }else {
       $error = "No coordinator in your area";
      //  header("location: index.php?error=".$error);
    }

   $query = "INSERT INTO userdetails (name, username, email, mobile,
    address, city, pincode, state, country, longitude, latitude, coordinator) VALUES
   ('" . $_POST["name"] . "','" . $_POST["rusername"] . "', 
    '" . $_POST["email"] . "', '" . $_POST["number"] . "',
   '" .$_POST["address"] . "','" .$_POST["city"] . "','" .$_POST["pincode"] . "',
   '" .$_POST["state"] . "','" .$_POST["country"] . "','" .$_POST["longitude"] . "',
   '" .$_POST["latitude"] . "','".$coordinator ."')";
   
   $result = mysqli_query($db, $query);
   if($result){
    $_SESSION['username'] = $_POST['rusername'];
   }
    
    $query = "INSERT INTO login (username, email, password, role) VALUES
    ('" . $_POST["rusername"] . "','" . $_POST["email"] . "','" . $_POST["password"] . "', 'volunteer')";
    $result = mysqli_query($db, $query);

    $notification = "A volunteer has been registered";
    $query = "INSERT INTO notification (username, notification, notificationtype) VALUES
    ('" . $_POST["rusername"] . "','".$notification ."','5')";
    echo $query;
    $result = mysqli_query($db, $query);

    
    $_SESSION['success'] = "You are now logged in";

    if(isset($_SESSION['username'])){
    	header('location: home.php');
    }
 ?>  