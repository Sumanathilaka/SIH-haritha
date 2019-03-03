<div class="w3-row-padding">
  <div class="w3-col m12">
    <div class="w3-card w3-round w3-white">
      <div class="w3-container w3-padding">
        <h6 class="w3-opacity">Feel Free to share your Ideas</h6>
         <form name="adding_post" id="adding_post" action="coordinator_add_post.php" method="POST" enctype="multipart/form-data">
          
        <input id="post_text" type="text" class="w3-border w3-padding" name="post" placeholder="Write Something..........." style="width: 100%"> </p>
        <span style="color: red;"><p id="post_error"> </p></span>
        <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
         <input type ="file" name="photo1" id="photo" class="w3-button w3-theme">
         <input type ="file" name="photo2" id="photo" class="w3-button w3-theme">
         <br>
          <input type="submit" value="Submit" class="w3-button w3-theme"  >

     </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    document.getElementById("adding_post").onsubmit = function () {
    var x = document.forms["adding_post"]["post"].value;
    
    var submit = true;

    if (x == null || x == "") {
        nameError = "Please enter some text ";
        document.getElementById("post_error").innerHTML = nameError;
        submit = false;
    }


    return submit;
}

function removeWarning() {
    document.getElementById(this.id + "_error").innerHTML = "";
}

document.getElementById("post_text").onkeyup = removeWarning;

</script>