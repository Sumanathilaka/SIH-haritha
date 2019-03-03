<?php 

session_start();
$_SESSION["username"] = 'venky';
$username = $_SESSION["username"];
// include 'coordinator_verify_loggedin.php';

?>

<!DOCTYPE html> 
<html>

<head>
 <?php include 'coordinator_head.php'; ?>
</head>

<body class="w3-theme-l5">

<!-- Navbar -->
<?php include 'coordinator_navbar.php'; ?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <?php include 'coordinator_side_panel.php'; ?>          
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
    <!-- Retrieve posts  -->
    <?php 
    include 'db-connect.php';
    $username = $_SESSION["username"] ;
    $sql2 = "
      SELECT challenges.username,challenges.stage1_pic,challenges.stage2_pic,challenges.stage3_pic,challenges.stage4_pic,challenges.stage5_pic,challenges.stage1_postid,challenges.stage2_postid,challenges.stage3_postid,challenges.stage4_postid,challenges.stage5_postid, userdetails.image_id, challenges.challenge_id ,userdetails.name  
      FROM challenges , userdetails
      WHERE challenges.challenge_state=1 and userdetails.coordinator = '$username' and userdetails.username=challenges.username and  ( challenges.seen = 1 or challenges.seen=0 ) 

      ORDER BY challenges.challenge_id
      
    ";
    $result= mysqli_query($conn, $sql2);
    $sql3 = " 
    UPDATE challenges 
    SET seen = 1
    WHERE seen = 0 and challenge_state = 1 and username in (
    SELECT username FROM userdetails WHERE coordinator = '$username'  
    )
    " ;
    $result1= mysqli_query($conn, $sql3);
    //echo $username ;
    //echo mysqli_num_rows($result) ;

    if (mysqli_num_rows($result) > 0) {

      while($row = $result->fetch_assoc()) {
        $var=$row['username'] ;
        $challenge_id=$row['challenge_id'] ; 
        $name=$row['name'];
        $image_id=$row['image_id'] ;
        $image_id1=$row['stage1_pic'];
        $image_id2=$row['stage2_pic'];
        $image_id3=$row['stage3_pic'];
        $image_id4=$row['stage4_pic'];
        $image_id5=$row['stage5_pic'];
        $post_id1=$row['stage1_postid'] ;
        $post_id2=$row['stage2_postid'] ;
        $post_id3=$row['stage3_postid'] ;
        $post_id4=$row['stage4_postid'] ;
        $post_id5=$row['stage5_postid'] ;

        if($image_id == NULL) {
          $image_id = "./images/avatar.png";
        }
        else {
          $image_id = "./images/".$image_id;
        }
        if($image_id1 == NULL) {
          $image_id = "./images/avatar.png";
        }
        else {
          $image_id1 = "./images/".$image_id1;
        }
        if($image_id2 == NULL) {
          $image_id2 = "./images/avatar.png";
        }
        else {
          $image_id2 = "./images/".$image_id2;
        }
        if($image_id3 == NULL) {
          $image_id3 = "./images/avatar.png";
        }
        else {
          $image_id3 = "./images/".$image_id3;
        }
        if($image_id4 == NULL) {
          $image_id4 = "./images/avatar.png";
        }
        else {
          $image_id4 = "./images/".$image_id4;
        }
        if($image_id5 == NULL) {
          $image_id5 = "./images/avatar.png";
        }
        else {
          $image_id5 = "./images/".$image_id5;
        }
        
    ?>

    <div class="w3-container w3-card w3-white w3-round w3-margin-bottom w3-margin-right w3-margin-left"><br>
      <img src= "<?php echo $image_id; ?>" width="40" height="40" class="w3-circle"/>
      <span class="w3-right w3-opacity"><?php  ?></span>
      <b> <?php echo $name; ?></b><br>
      <hr class="w3-clear">
      

      
     <img src= "<?php echo $image_id1; ?>" width="100%" height=250" class="w3-margin-bottom"/>


      <!-- Retrieve reports of post -->
      <?php 

      $sql3 = "SELECT  r.reason , u.image_id , u.username 
       FROM report as r , userdetails as u 
        WHERE r.postid= '$post_id1' and u.username = r.reporter
        ORDER BY r.reportid DESC" ;
      $result5= mysqli_query($conn, $sql3);
      
      if (mysqli_num_rows($result5) > 0) {
      ?>
      <hr>
      <div style="background-color:#E0E0E0 ;padding: 20px ; border: 1px" class="w3-margin-bottom"> 
      <?php
        while($row = mysqli_fetch_assoc($result5)) {
         // $time2=$row['time'];
          $image_idcomment=$row['image_id'];
          if($image_idcomment == NULL) {
            $image_idcomment = "./images/avatar.png";
          }
          else {
            $image_idcomment = "./images/".$image_idcomment;
          }
          $text1=$row['reason'];
          $namecom=$row['username'];
      ?>

          <b><?php echo "<img src= '".$image_idcomment."'"." width='20' height='20' class='w3-circle w3-margin-right'/>" ;  echo $namecom; ?></b>
          <span class="w3-right w3-opacity"><?php  ?></span>
          <p><?php echo $text1; ?> </p>
          
        <?php
        } 
        ?>
      </div>
      <?php
      }
      ?>
      <img src= "<?php echo $image_id2; ?>" width="100%" height=250" class="w3-margin-bottom"/>
      
      <?php 

      $sql3 = "SELECT  r.reason , u.image_id , u.username 
       FROM report as r , userdetails as u 
        WHERE r.postid= '$post_id2' and u.username = r.reporter
        ORDER BY r.reportid DESC" ;
      $result5= mysqli_query($conn, $sql3);
      
      if (mysqli_num_rows($result5) > 0) {
      ?>
      <hr>
      <div style="background-color:#E0E0E0 ;padding: 20px ; border: 1px" class="w3-margin-bottom"> 
      <?php
        while($row = mysqli_fetch_assoc($result5)) {
         // $time2=$row['time'];
          $image_idcomment=$row['image_id'];
          if($image_idcomment == NULL) {
            $image_idcomment = "./images/avatar.png";
          }
          else {
            $image_idcomment = "./images/".$image_idcomment;
          }
          $text1=$row['reason'];
          $namecom=$row['username'];
      ?>

          <b><?php echo "<img src= '".$image_idcomment."'"." width='20' height='20' class='w3-circle w3-margin-right'/>" ;  echo $namecom; ?></b>
          <span class="w3-right w3-opacity"><?php  ?></span>
          <p><?php echo $text1; ?> </p>
          
        <?php
        } 
        ?>
      </div>
      <?php
      }
      ?>
      
      <img src= "<?php echo $image_id3; ?>" width="100%" height=250" class="w3-margin-bottom"/>
      
      <?php 

      $sql3 = "SELECT  r.reason , u.image_id , u.username 
       FROM report as r , userdetails as u 
        WHERE r.postid= '$post_id3' and u.username = r.reporter
        ORDER BY r.reportid DESC" ;
      $result5= mysqli_query($conn, $sql3);
      
      if (mysqli_num_rows($result5) > 0) {
      ?>
      <hr>
      <div style="background-color:#E0E0E0 ;padding: 20px ; border: 1px" class="w3-margin-bottom"> 
      <?php
        while($row = mysqli_fetch_assoc($result5)) {
         // $time2=$row['time'];
          $image_idcomment=$row['image_id'];
          if($image_idcomment == NULL) {
            $image_idcomment = "./images/avatar.png";
          }
          else {
            $image_idcomment = "./images/".$image_idcomment;
          }
          $text1=$row['reason'];
          $namecom=$row['username'];
      ?>

          <b><?php echo "<img src= '".$image_idcomment."'"." width='20' height='20' class='w3-circle w3-margin-right'/>" ;  echo $namecom; ?></b>
          <span class="w3-right w3-opacity"><?php  ?></span>
          <p><?php echo $text1; ?> </p>
          
        <?php
        } 
        ?>
      </div>
      <?php
      }
      ?>
    
    <img src= "<?php echo $image_id4; ?>" width="100%" height=250" class="w3-margin-bottom"/>
      
      <?php 

      $sql3 = "SELECT  r.reason , u.image_id , u.username 
       FROM report as r , userdetails as u 
        WHERE r.postid= '$post_id4' and u.username = r.reporter
        ORDER BY r.reportid DESC" ;
      $result5= mysqli_query($conn, $sql3);
      
      if (mysqli_num_rows($result5) > 0) {
      ?>
      <hr>
      <div style="background-color:#E0E0E0 ;padding: 20px ; border: 1px" class="w3-margin-bottom"> 
      <?php
        while($row = mysqli_fetch_assoc($result5)) {
         // $time2=$row['time'];
          $image_idcomment=$row['image_id'];
          if($image_idcomment == NULL) {
            $image_idcomment = "./images/avatar.png";
          }
          else {
            $image_idcomment = "./images/".$image_idcomment;
          }
          $text1=$row['reason'];
          $namecom=$row['username'];
      ?>

          <b><?php echo "<img src= '".$image_idcomment."'"." width='20' height='20' class='w3-circle w3-margin-right'/>" ;  echo $namecom; ?></b>
          <span class="w3-right w3-opacity"><?php  ?></span>
          <p><?php echo $text1; ?> </p>
          
        <?php
        } 
        ?>
      </div>
      <?php
      }
      ?>

      <img src= "<?php echo $image_id5; ?>" width="100%" height=250" class="w3-margin-bottom"/>
      
      <?php 

      $sql3 = "
        SELECT  r.reason , u.image_id , u.username 
        FROM report as r , userdetails as u 
        WHERE r.postid= '$post_id5' and u.username = r.reporter
        ORDER BY r.reportid DESC
      " ;
      $result5= mysqli_query($conn, $sql3);
      
      if (mysqli_num_rows($result5) > 0) {
      ?>
      <hr>
      <div style="background-color:#E0E0E0 ;padding: 20px ; border: 1px" class="w3-margin-bottom"> 
      <?php
        while($row = mysqli_fetch_assoc($result5)) {
         // $time2=$row['time'];
          $image_idcomment=$row['image_id'];
          if($image_idcomment == NULL) {
            $image_idcomment = "./images/avatar.png";
          }
          else {
            $image_idcomment = "./images/".$image_idcomment;
          }
          $text1=$row['reason'];
          $namecom=$row['username'];
      ?>

          <b><?php echo "<img src= '".$image_idcomment."'"." width='20' height='20' class='w3-circle w3-margin-right'/>" ;  echo $namecom; ?></b>
          <span class="w3-right w3-opacity"><?php  ?></span>
          <p><?php echo $text1; ?> </p>
          
        <?php
        } 
        ?>
      </div>
      <?php
      }
      include 'coordinator_approve.php' ;
      ?>
      
    </div> 

<?php
  

  } 
   }
?>
  
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column <--></-->
    <div class="w3-col m2"> 
      <?php include 'admin-coordinator-request.php'; ?>
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<?php include 'coordinator_footer.php'; ?>
 
</body>
</html> 

