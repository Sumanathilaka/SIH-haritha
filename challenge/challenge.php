<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Challenge Series</title>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:900" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

	<?php
$username='deshank';
include_once('db-connect.php');
 
$sql = "SELECT *
FROM challenges
where username='$username'";
$result= mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	$i = 0;
    while($row = mysqli_fetch_assoc($result)) {
		$i = $i +1;
           
$stage1=$row['stage1'];
$stage1_pic=$row['stage1_pic'];
$stage1_verified=$row['stage1_verified'];
$stage2=$row['stage2'];
$stage2_pic=$row['stage2_pic'];
$stage2_verified=$row['stage2_verified'];
$stage3=$row['stage3'];
$stage3_pic=$row['stage3_pic'];
$stage3_verified=$row['stage3_verified'];
$stage4=$row['stage4'];
$stage4_pic=$row['stage4_pic'];
$stage4_verified=$row['stage4_verified'];
$stage5=$row['stage5'];
$stage5_pic=$row['stage5_pic'];
$stage5_verified=$row['stage5_verified'];
?>

<section>
  <div class="container">
    <h1 class="text-center">Challenge <?php echo $i; ?></h1>
    <div class="timeline flex-container">

      <div class="timeline-item flex-items-default selected">
        <div class="timeline-content text-left animated bounceIn">
          <h3>Stage 1</h3>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident eveniet nulla amet, sapiente voluptatum praesentium.</p>-->
		  <?php
		  if ($stage1){?>
		  <img src="pics/<?php echo $stage1_pic ?>" style="height:150px; width:340px; align:center; position:relative; margin-left:0px;"></img>
		  
		  <?php if(!$stage1_verified) { ?>
          <div class="hexagon" style="background-color: red;"></div>
		  
          <i class="material-icons" style="margin-top:65px;">cancel</i>
		  <?php } 
		  else { ?>
			  <div class="hexagon2" style="background-color: #00FF00;"></div>
          <i class="material-icons" style="margin-top:65px;">check</i>
		  <?php }
			  
		  } 
		  else {
			  ?>
			  
			  <form action="extend_challenge.php" method="POST" enctype="multipart/form-data">
				Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="hidden" name="challenge" id="challenge" value="<?php echo $i; ?>">
			<input type="hidden" name="stage" id="stage" value="1">
			<input type="hidden" name="filename" id="filename" value="<?php echo $username; ?>_challenge<?php echo $i; ?>_stage1">
			<input type="submit" value="Upload Image" name="submit">
			</form>
			<?php
			  
		  }
		  ?>
        </div>
      </div>
      <div class="timeline-item flex-items-default">
        <div class="timeline-content text-left">
          <h3>Stage 2</h3>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident eveniet nulla amet, sapiente voluptatum praesentium.</p>-->
		  <?php
		  if ($stage2){?>
		  <img src="pics/<?php echo $stage2_pic ?>" style="height:150px; width:340px; align:center; position:relative; margin-left:0px;"></img>
		  
		  <?php if(!$stage2_verified) { ?>
          <div class="hexagon" style="background-color: red;"></div>
		  
          <i class="material-icons" style="margin-top:65px;">cancel</i>
		  <?php } 
		  else { ?>
			  <div class="hexagon2" style="background-color: #00FF00;"></div>
          <i class="material-icons" style="margin-top:65px;">check</i>
		  <?php }
			  
		  } 
		  else {
			  ?>
			  
			  <form action="extend_challenge.php" method="POST" enctype="multipart/form-data">
				Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="hidden" name="challenge" id="challenge" value="<?php echo $i; ?>">
			<input type="hidden" name="stage" id="stage" value="2">
			<input type="hidden" name="filename" id="filename" value="<?php echo $username; ?>_challenge<?php echo $i; ?>_stage2">
			<input type="submit" value="Upload Image" name="submit">
			</form>
			<?php
			  
		  }
		  ?>
        </div>
      </div>
      <div class="timeline-item flex-items-default">
        <div class="timeline-content text-left">
          <h3>Stage 3</h3>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident eveniet nulla amet, sapiente voluptatum praesentium.</p>-->
		  <?php
		  if ($stage3){?>
		  <img src="pics/<?php echo $stage3_pic ?>" style="height:150px; width:340px; align:center; position:relative; margin-left:0px;"></img>
		  
		  <?php if(!$stage3_verified) { ?>
          <div class="hexagon" style="background-color: red;"></div>
		  
          <i class="material-icons" style="margin-top:65px;">cancel</i>
		  <?php } 
		  else { ?>
			  <div class="hexagon2" style="background-color: #00FF00;"></div>
          <i class="material-icons" style="margin-top:65px;">check</i>
		  <?php }
			  
		  } 
		  else {
			  ?>
			  
			  <form action="extend_challenge.php" method="POST" enctype="multipart/form-data">
				Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="hidden" name="challenge" id="challenge" value="<?php echo $i; ?>">
			<input type="hidden" name="stage" id="stage" value="3">
			<input type="hidden" name="filename" id="filename" value="<?php echo $username; ?>_challenge<?php echo $i; ?>_stage3">
			<input type="submit" value="Upload Image" name="submit">
			</form>
			<?php
			  
		  }
		  ?>
        </div>
      </div>
      <div class="timeline-item flex-items-default">
        <div class="timeline-content text-left">
          <h3>Stage 4</h3>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident eveniet nulla amet, sapiente voluptatum praesentium.</p>-->
		  <?php
		  if ($stage4){?>
		  <img src="pics/<?php echo $stage4_pic ?>" style="height:150px; width:340px; align:center; position:relative; margin-left:0px;"></img>
		  
		  <?php if(!$stage4_verified) { ?>
          <div class="hexagon" style="background-color: red;"></div>
		  
          <i class="material-icons" style="margin-top:65px;">cancel</i>
		  <?php } 
		  else { ?>
			  <div class="hexagon2" style="background-color: #00FF00;"></div>
          <i class="material-icons" style="margin-top:65px;">check</i>
		  <?php }
			  
		  } 
		  else {
			  ?>
			  
			  <form action="extend_challenge.php" method="POST" enctype="multipart/form-data">
				Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="hidden" name="challenge" id="challenge" value="<?php echo $i; ?>">
			<input type="hidden" name="stage" id="stage" value="4">
			<input type="hidden" name="filename" id="filename" value="<?php echo $username; ?>_challenge<?php echo $i; ?>_stage4">
			<input type="submit" value="Upload Image" name="submit">
			</form>
			<?php
			  
		  }
		  ?>
        </div>
      </div>
      <div class="timeline-item flex-items-default">
        <div class="timeline-content text-left">
          <h3>Stage 5</h3>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident eveniet nulla amet, sapiente voluptatum praesentium.</p>-->
		  <?php
		  if ($stage5){?>
		  <img src="pics/<?php echo $stage5_pic ?>" style="height:150px; width:340px; align:center; position:relative; margin-left:0px;"></img>
		  
		  <?php if(!$stage5_verified) { ?>
          <div class="hexagon" style="background-color: red;"></div>
		  
          <i class="material-icons" style="margin-top:65px;">cancel</i>
		  <?php } 
		  else { ?>
			  <div class="hexagon2" style="background-color: #00FF00;"></div>
          <i class="material-icons" style="margin-top:65px;">check</i>
		  <?php }
			  
		  } 
		  else {
			  ?>
			  
			  <form action="extend_challenge.php" method="POST" enctype="multipart/form-data">
				Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="hidden" name="challenge" id="challenge" value="<?php echo $i; ?>">
			<input type="hidden" name="stage" id="stage" value="5">
			<input type="hidden" name="filename" id="filename" value="<?php echo $username; ?>_challenge<?php echo $i; ?>_stage5">
			<input type="submit" value="Upload Image" name="submit">
			</form>
			<?php
			  
		  }
		  
		  ?>
        </div>
      </div>

      <div class="dropdown animated bounceIn" style="left: -88px;">
        <div class="inner">
          <div class="arrow-down"></div>
        </div>
      </div>

    </div>
  </div>
</section>


<?php
           }
  }
?>


  

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
