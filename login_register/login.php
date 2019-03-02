<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM login WHERE (username = '$myusername' OR email='$myusername') AND password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
      	
      if($count == 1) {
         $_SESSION['username'] = $myusername;
         header("location: home.php");
      }else {
         $error = "Incorrect Username or Password";
         header("location: index.php?error=".$error);
         echo $error;
      }
   }
?>