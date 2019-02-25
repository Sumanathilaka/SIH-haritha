<?php

include 'admin-verify-loggedin.php';
include 'db-connect.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $question_id = $_POST['question_id'];
  $question = $_POST['question'];
  $answer = $_POST['answer'];

  if($stmt = $conn->prepare("INSERT INTO question (question, answer) VALUES (?,?)")) {
    if($stmt->bind_param("ss",$question, $answer)) {
      if($stmt->execute()) {
        $del_stmt = $conn->prepare("DELETE FROM newquestion WHERE question_id=?");
        $del_stmt->bind_param("i", $question_id);
        $del_stmt->execute();
        $del_stmt->close();
      }
    }
    $stmt->close(); 
  } 
}

$stmt = $conn->prepare("SELECT newquestion.question_id, newquestion.question_text, userdetails.name, userdetails.image_id FROM newquestion, userdetails WHERE userdetails.username = newquestion.username");
$stmt->execute();
$result = $stmt->get_result();

$new_questions = "";
while($row = $result->fetch_assoc()) {
  $new_question_id = $row['question_id'];
  $new_question = $row['question_text'];
  $name = $row['name'];
  $image_id = $row['image_id'];  
  if($image_id == NULL) {
    $image_id = "./images/avatar.png";
  }
  else {
    $image_id = "./images/".$image_id;
  }

  $new_questions = $new_questions . 
   '<div class="w3-container w3-card w3-white w3-round w3-margin "><br>
      <b><img src= "'.$image_id.'" width="20" height="20" class="w3-circle w3-margin-right"/>'. $name .'</b>
      <form id="admin-add-QA-form'.$new_question_id.'" action="admin-manage-QA.php" method="post">
        <p>'.$new_question.'</p>
        <input type="hidden" name="question_id" value="'.$new_question_id.'">
        <input type="hidden" name="question" value="'.$new_question.'">
        <textarea form_id="admin-add-QA-form'.$new_question_id.'" class="w3-border w3-padding w3-block" name="answer"></textarea>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom w3-margin-top" onclick="submitForm(this)"> &nbsp;Answer</button> 
      </form>
    </div>';
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
<?php include "admin-navbar.php"; ?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <?php include "admin-sidepanel.php"; ?>          
    <!-- End Left Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m9">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Enter the question and answer</h6>
              <form id="admin-manage-QA-form" action="admin-manage-QA.php" method="post">
                <label><b>Question</b></label>
                <input class="w3-border w3-padding w3-block w3-margin-bottom" type="text" name="question">
                <label><b>Answer</b></label>
                <textarea form_id="admin-manage-QA-form" row="6" class="w3-border w3-padding w3-block" name="answer"></textarea>
                <button type="button" class="w3-button w3-theme w3-margin-top w3-margin-bottom" onclick="submitForm(this)"><i class="fa fa-plus"></i> &nbsp;Add</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <?php echo $new_questions; ?>
    <!-- End Right Column -->
    </div>
        
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<?php include "admin-footer.php"; ?>
 
<script>
  // Used to submit closest form
function submitForm(input) {
  $(input).closest("form").submit();
}

// Used to display image on selecting
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $("#profile-pic")
              .attr("src", e.target.result)
      };

      reader.readAsDataURL(input.files[0]);
  }
}
</script>

</body>
</html>

