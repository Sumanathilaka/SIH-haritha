<?php
include_once('db-connect.php');

$username = 'test';
$sql = "SELECT * FROM coordinator_details where username='$username'";
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
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-tree w3-margin-right"></i>Haritha Hara</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications" onclick="location='Notification.php'"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
   
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
              <h6 class="w3-opacity">Feel Free to share your Ideas</h6>
               <form action="addpost.php" method="POST" enctype="multipart/form-data">
              <input type="text" class="w3-border w3-padding" name="post" placeholder="Write Something..........." style="width: 100%"> </p>
              <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
               <input type ="file" name="photo1" id="photo" class="w3-button w3-theme">
               <input type ="file" name="photo2" id="photo" class="w3-button w3-theme">
                  <input type="submit" value="Submit" class="w3-button w3-theme" >

           </form>
            </div>
          </div>
        </div>
      </div>

<!-- taking post details from dataset  -->
 <?php
$sql2 = "
  SELECT postdetails.username, post_id, picture, text, postdetails.location, time, picture2,userdetails.name, image_id
  FROM postdetails, userdetails
  WHERE userdetails.coordinator = '$username' and postdetails.username = userdetails.username
  ORDER BY time DESC
";
$result= mysqli_query($conn, $sql2);
echo mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {           
      $name=$row['name'];
      $image_id1=$row['picture'];
      $image_id2=$row['picture2'];
      $text=$row['text'];
      $location=$row['location'];
      $time=$row['time'];
      $image_id=$row['image_id'];
      $zero='null';
      $post=$row['post_id'];
  
      if ($image_id2 == $zero && $image_id1 != $zero) {

?>
 <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
         <?php echo "<img src= 'pic/".$image_id."'"." width='40'  class='w3-circle'/>" ; ?>
        <span class="w3-right w3-opacity"><?php echo $time; ?></span>
        <b> <?php echo $name; ?></b><br>
        <hr class="w3-clear">
        <p><?php echo $text; ?></p>
          <?php echo "<img src= 'pic/".$image_id1."'"." width='100%'  height='500' class='w3-margin-bottom'>" ; ?>
          <br>
<hr><hr>
    <div style="background-color:#E0E0E0 ;padding: 20px ; border: 1px">  
          <!-- comment retrieving from the database and echo -->
  <?php

  $sql3 = "
  SELECT comment,time,comment.username,name,image_id
  FROM comment,userdetails
  Where comment.post_id='$post' AND comment.username = userdetails.username
  ORDER BY time DESC
  ";
$result5= mysqli_query($conn, $sql3);

if (mysqli_num_rows($result5) > 0) {
    while($row = mysqli_fetch_assoc($result5)) {

      $time2=$row['time'];
      $image_idcomment=$row['image_id'];
      $text1=$row['comment'];
      $namecom=$row['name'];

?>

           <?php echo "<img src= 'pic/".$image_idcomment."'"." width='20'  class='w3-circle'/>" ;  echo $namecom; ?>
           <span class="w3-right w3-opacity"><?php echo $time2; ?></span>
           <p><?php echo $text1; ?> </p>
    
<?php
}
}
?></div>
      <form action="addcomment.php" method="POST" enctype="multipart/form-data">
      <input type="text" class="w3-border w3-padding" name="comment" placeholder="Comment Something..........." style="width: 100%"> </p>
      <input type="hidden" name="username" value=<?php  echo $username ?> >
      <input type="hidden" name="postid" value=<?php  echo $post ?> >
      <button type="submit" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
        </form>
      </div> 

<?php
 }
    
 elseif ($image_id1 == $zero){

      ?>
  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <?php echo "<img src= 'pic/".$image_id."'"." width='40'  class='w3-circle'/>" ; ?>
        <span class="w3-right w3-opacity"><?php echo $time; ?></span>
      <b> <?php echo $name; ?></b><br>
        <hr class="w3-clear">
       <p><?php echo $text; ?></p>
<hr><hr>
        
        <div style="background-color:#E0E0E0 ;padding: 20px ; border: 1px">         <!-- comment retrieving from the database and echo -->
 <?php

 $sql3 = "SELECT comment,time,comment.username,name,image_id
FROM comment,userdetails
Where comment.post_id='$post' AND comment.username=userdetails.username
ORDER BY time DESC" ;

$result5= mysqli_query($conn, $sql3);

if (mysqli_num_rows($result5) > 0) {
    while($row = mysqli_fetch_assoc($result5)) {

$time2=$row['time'];
$image_idcomment=$row['image_id'];
$text1=$row['comment'];
$namecom=$row['name'];

?>
     <?php echo "<img src= 'pic/".$image_idcomment."'"." width='20'  class='w3-circle'/>" ;  echo "  "; echo $namecom; ?>
           <span class="w3-right w3-opacity"><?php echo $time2; ?></span>
           <p><?php echo $text1; ?> </p>
    
<?php
}
}
?>
</div>
      <form action="addcomment.php" method="POST" enctype="multipart/form-data">
              <input type="text" class="w3-border w3-padding" name="comment" placeholder="Comment Something..........." style="width: 100%"> </p>
                  <input type="hidden" name="username" value=<?php  echo $username ?> >
                  <input type="hidden" name="postid" value=<?php  echo $post ?> >
      <button type="submit" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
        </form>
      </div> 
   <?php
}
else{
    
    ?>

    <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <?php echo "<img src= 'pic/".$image_id."'"." width='40'  class='w3-circle'/>" ; ?>
        <span class="w3-right w3-opacity"><?php echo $time; ?></span>
       <b> <?php echo $name; ?></b><br>
        <hr class="w3-clear">
           <p><?php echo $text; ?></p>
     

          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
                <?php echo "<img src= 'pic/".$image_id1."'"." width='100%'  class='w3-margin-bottom'>" ; ?>
             </div>

            <div class="w3-half">
             <?php echo "<img src= 'pic/".$image_id2."'"." width='100%'  class='w3-margin-bottom'>" ; ?>
          </div>
        </div>
      
<hr><hr>
    <div style="background-color:#E0E0E0 ;padding: 20px ; border: 1px">  

                      <!-- comment retrieving from the database and echo -->
 <?php
$sql3 = "SELECT comment,time,comment.username,name,image_id
FROM comment,userdetails
Where comment.post_id='$post' AND comment.username=userdetails.username
ORDER BY time DESC" ;

$result5= mysqli_query($conn, $sql3);

if (mysqli_num_rows($result5) > 0) {
    while($row = mysqli_fetch_assoc($result5)) {

$time2=$row['time'];
$image_idcomment=$row['image_id'];
$text1=$row['comment'];
$namecom=$row['name'];

?>
     <?php echo "<img src= 'pic/".$image_idcomment."'"." width='20'  class='w3-circle'/>" ;  echo $namecom; ?>
           <span class="w3-right w3-opacity"><?php echo $time2; ?></span>
           <p><?php echo $text1; ?> </p>
    
<?php
}
}
?>
</div>
     <form action="addcomment.php" method="POST" enctype="multipart/form-data">
              <input type="text" class="w3-border w3-padding" name="comment" placeholder="Comment Something..........." style="width: 100%"> </p>
             <input type="hidden" name="username" value=<?php  echo $username ?> >
             <input type="hidden" name="postid" value=<?php  echo $post ?> >
      <button type="submit" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
        </form>
      </div>
      
 
   <?php
}
      }
  }
   ?>
      
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
