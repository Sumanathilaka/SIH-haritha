<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM UserDetails WHERE (UserName = '$myusername' OR Email='$myusername') AND Password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
      	
      if($count == 1) {
         $_SESSION['username'] = $myusername;
         header("location: home.php");
      }else {
         $error = "Incorrect Username or Password";
         // $_COOKIE['error'] = $error;

         header("location: index.php?error=".$error);
         echo $error;
      }
   }
?>