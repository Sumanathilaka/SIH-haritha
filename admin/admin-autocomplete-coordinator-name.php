<?php 

include 'admin-verify-loggedin.php';
include 'db-connect.php';

$output ="";

if(!empty($_POST['name'])){   
  $name= '%'.$_POST['name'].'%';
  $stmt = $conn->prepare("SELECT DISTINCT name, username, image_id FROM coordinator WHERE name like ?");
  $stmt->bind_param("s",$name);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $username = $row['username'];
        $image_id = $row['image_id'];
        if ($image_id == NULL) {
          $image_id = "./images/avatar.png";
        } else {
          $image_id = "./images/".$image_id;         
        }
        $output .="<div class='w3-padding autocomplete-item' style='cursor:pointer;' onclick=
                  \"autocompleteSearchbar(this, '".$name."','".$username."')\" 
                  onmouseover=\"changeBackgroundColor(this,'#ccc')\" 
                  onmouseout=\"changeBackgroundColor(this,'white')\">
                   <span><img class='w3-margin-right w3-circle' src='".$image_id."' height='20' width='20'></span>".$name."
                   </div>";                  
    }
  }
  else{
      $output .="<div No Result !</div>";
  }
}

echo $output;
?>





