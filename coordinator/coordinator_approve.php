<form id="approve" method="POST" action="coordinator_approve_add.php">

	<input type="hidden" name="username" value="<?php echo $var ; ?>">
	<input type="hidden" name="challenge_id" value="<?php echo $challenge_id ; ?>">
	<label><b>Reason</b></label>
    <input id="question" class="w3-border w3-padding w3-block w3-margin-bottom" type="text" name="question">
    <span style="color: red;"><p id="post_error"> </p></span>
    <button type="submit" class="w3-button w3-theme w3-margin-top w3-margin-bottom w3-green" name="approve" ><i class="fa fa-plus"></i> &nbsp;Approve</button>
	<button type="submit" class="w3-button w3-theme w3-margin-top w3-margin-bottom w3-red" name="reject" ><i class="fa fa-minus"></i> &nbsp;Reject</button>


</form>

  <script type="text/javascript">
      document.getElementById("approve").onsubmit = function () {
      var x = document.forms["approve"]["question"].value;
      
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

  document.getElementById("question").onkeyup = removeWarning;

  </script>
	
