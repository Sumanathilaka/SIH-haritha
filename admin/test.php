<?php

include 'admin-verify-loggedin.php';
include 'db-connect.php';

$username='deshank';

$stmt = $conn->prepare("SELECT name, email, mobile, address, location, coordinator, postalcode, image_id FROM userdetails WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0) exit('No rows');

while($row = $result->fetch_assoc()) {
  $name=$row['name'];
  $email=$row['email'];
  $mobile=$row['mobile'];
  $address=$row['address'];
  $image_id=$row['image_id'];
}
if($image_id == NULL) {
  $image_id = "./img/avatar.png";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
  <?php include 'admin-head.php'; ?>
</head>

<body class="w3-theme-l5">

<!-- Navbar -->
<?php include 'admin-navbar.php'; ?>

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
       <p class="w3-center"><img src="<?php echo $image_id; ?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
       <hr>
       <p><i class="fa fa-user fa-fw w3-margin-right w3-text-theme"></i> <?php echo $name; ?></p>
       <p><i class="fa fa-envelope fa-fw w3-margin-right w3-text-theme"></i> <?php echo $email; ?></p>
       <p><i class="fa fa-phone fa-fw w3-margin-right w3-text-theme"></i> <?php echo $mobile; ?></p>
       <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <?php echo $address; ?></p>
      </div>
    </div>
    <br>         
    <!-- End Left Column -->
    </div>

    <!-- Middle Column -->
    <div class="w3-col m7">
    
<!-- taking post details from dataset  -->
 <?php include 'db-connect.php';
 $username = 'deshank';

$sql2 = "SELECT postdetails.username, post_id, picture, text, postdetails.location, time, picture2, userdetails.name, image_id, posttype FROM postdetails, userdetails WHERE postdetails.username=userdetails.username AND postdetails.username='".$username."' ORDER BY time DESC;" ;
echo $sql2;
$result= mysqli_query($conn, $sql2);
if (mysqli_num_rows($result) > 0) {
  echo "string";
  while($row = $result->fetch_assoc()) {
    $name=$row['name'];
    $image_id1=$row['picture'];
    $image_id2=$row['picture2'];
    $text=$row['text'];
    $location=$row['location'];
    $time=$row['time'];
    $image_id=$row['image_id'];
    $zero='null';
    $post=$row['post_id'];
    $posttype=$row['posttype'];
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
       <?php include 'db-connect.php';

      $sql3 = "SELECT comment, time, comment.username, name, image_id FROM comment, userdetails WHERE comment.post_id='$post' AND comment.username=userdetails.username ORDER BY time DESC" ;
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
<?php include 'admin-footer.php'; ?>
 
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
