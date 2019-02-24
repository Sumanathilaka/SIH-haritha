<?php 

session_start();
$_SESSION["username"] = 'devu1997';

include 'admin-verify-loggedin.php';

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
      <?php include 'admin-sidepanel.php'; ?>          
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
    <!-- Retrieve posts  -->
    <?php 
    include 'db-connect.php';

    $sql2 = "SELECT postdetails.username, post_id, picture, text, postdetails.location, time, picture2, userdetails.name, image_id, posttype FROM postdetails, userdetails WHERE postdetails.username=userdetails.username ORDER BY time DESC;" ;
    $result= mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result) > 0) {
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
    ?>

    <div class="w3-container w3-card w3-white w3-round w3-margin-bottom w3-margin-right w3-margin-left"><br>
      <img src= "<?php echo $image_id; ?>" width="40" height="40" class="w3-circle"/>
      <span class="w3-right w3-opacity"><?php echo $time; ?></span>
      <b> <?php echo $name; ?></b><br>
      <hr class="w3-clear">
      <p><?php echo $text; ?></p>

      <?php 
      if ($image_id2 == $zero && $image_id1 != $zero) {
        echo "<img src= '".$image_id1."'"." width='100%'  height='500' class='w3-margin-bottom'>";
      } 
      elseif ($image_id2 != $zero) {
        echo '<div class="w3-row-padding" style="margin:0 -16px">
          <div class="w3-half">
            "<img src= "'.$image_id1.'" width="100%"  class="w3-margin-bottom">
          </div>
          <div class="w3-half">
            "<img src= "'.$image_id2.'" width="100%"  class="w3-margin-bottom">
          </div></div>';
      }
      ?>

      <hr>
      <div style="background-color:#E0E0E0 ;padding: 20px ; border: 1px" class="w3-margin-bottom"> 

      <!-- Retrieve comments of post -->
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

          <b><?php echo "<img src= '".$image_idcomment."'"." width='20' height='20' class='w3-circle w3-margin-right'/>" ;  echo $namecom; ?></b>
          <span class="w3-right w3-opacity"><?php echo $time2; ?></span>
          <p><?php echo $text1; ?> </p>
          
      <?php
        }
      }
      ?>

      </div>
    </div> 

<?php
  } 
}
?>
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
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
<?php include 'admin-footer.php'; ?>
 
</body>
</html> 
