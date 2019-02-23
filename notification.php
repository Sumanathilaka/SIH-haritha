<!DOCTYPE html>
<html>
<title>Haritha Hara</title>
<link rel="icon" href="nitc.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>



<body class="w3-theme-l5">

<?php
$username='deshank';


include_once('db-connect.php');
 
$sql = "SELECT username,name,email,mobile,address,location,coordinator,postalcode,image_id
FROM userdetails
where username='$username'";
$result= mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
           
$name=$row['name'];
$email=$row['email'];
$address=$row['address'];
$image_id=$row['image_id'];

           }
  }
?>

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-tree w3-margin-right"></i>Haritha Hara</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    
  </div>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
   <?php echo "<img src= 'pic/".$image_id."'"." width='25' height='25'  class='w3-circle'/>" ; ?>
  </a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center">   <?php echo "<img src= 'pic/".$image_id."'"." width='106' height='125' class='w3-circle'/>" ; ?> </p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> <?php echo $name; ?></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?php echo  $address; ?></p>
         <p><i class="fa fa-envelope fa-fw w3-margin-right w3-text-theme"></i> <?php echo $email;  ?></p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           
         </div>
          </div>
        </div>      
      </div>
      <br>
      

     
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
            
<!--notification -->
<?php
$sql2 = "SELECT notification,username,notificationid,notificationtype
FROM notification
where username='$username'
order by notificationid desc";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
    while($row = mysqli_fetch_assoc($result2)) {
           
$notification=$row['notification'];
$notificationtype=$row['notificationtype'];
if ($notificationtype==1){

?>
<div style="padding: 3px;">
 <img src="pic/following.png" width="30" height="30" class="w3-circle">
  <p class="w3-opacity"><?php echo  $notification; ?></p>
 </div>
<?php
  }
  }
  }
?>
            </div>
          </div>
        </div>
      </div>

      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Upcoming Events:</p>
          <img src="pic/blog-2.jpg" alt="Forest" style="width:100%;">
          <p><strong>Holiday - Activity</strong></p>
          <p>Friday 27<sup>th</sup> 15:00</p>
          <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
        </div>
      </div>
      <br>

       <?php

$sql = "SELECT username,image_id,name
FROM userdetails
where username
  not in(
select followee
from followtable
where follower='$username' )
limit 2;" ;
$result= mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      if($row['username'] != $username){
           
$namefollow=$row['name'];
$image_idfollow=$row['image_id'];
$followee_username=$row['username'];

 ?> <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
     <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <div class="w3-container">
          <p><h5>Follow</h5></p>
           <?php echo "<img src= 'pic/".$image_idfollow."'"." width='50%'  class='w3-circle'/>" ; ?><br>

          <span><?php echo $namefollow;  ?></span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">

           <form  action="follow.php" method="POST">
            <input type="hidden" name="follower" value=<?php  echo $username ?>>
            <input type="hidden" name="followee" value=<?php  echo $followee_username ?>>
             <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
               </form>
            </div>
          
          
        </div>
      </div>
    </div>
      <br>
<?php

}
}
}
?>
      
      <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
        <p>Developed By : <br>
          Incredible_6 <br>
        NITC</p>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
        <p>For Any Technical issue <br> <br>--Contact-- <br> Team Incredible_6 <br>8137027213</p>

      </div>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->


<footer class="w3-container w3-theme-d5">
  <center>
  <p>Powered by Incredible_6 SIH Grand Finale</a></p></center>
</footer>
 
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>



</body>
</html> 
