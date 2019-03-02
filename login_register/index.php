<!DOCTYPE html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <link href="css/login.css" rel="stylesheet"/>   
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <!-- For G-signin -->
    <!-- <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="242225634615-oksbv4vjnp76tm6up7s8d9dr1jqr2tpf.apps.googleusercontent.com"> -->
<script>


//signup / login
function callsignup(){
        $("#first").fadeOut("fast", function() {
        $("#second").fadeIn("fast");
    }); 
    }  
function callsignin(){
    $("#second").fadeOut("fast", function() {
    $("#first").fadeIn("fast");
    });
    }
      
             $(function() {
               $("form[name='login']").validate({
                 rules: {
                   
                   username : {
                     required: true,
                   },
                   password: {
                     required: true,
                     
                   }
                 },
                  messages: {
                   username : "Please enter username or email",
                  
                   password: {
                     required: "Please enter password",
                    
                   }
                   
                 },
                 submitHandler: function(form) {
                   form.submit();
                 }
               });
             });
             
    
    
    $(function() {
      
      $("form[name='registration']").validate({
        rules: {
          firstname: "required",
          lastname: "required",
          rusername:  "required",
          
          email: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 5
          }
        },
        
        messages: {
          firstname: "Please enter your firstname",
          lastname: "Please enter your lastname",
          rusername : "Please enter username",
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },   
          email: "Please enter a valid email address"
        },
      
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
    

//   G-sign in
//    function onSignIn(googleUser) {
//    var profile = googleUser.getBasicProfile();
//    alert('ID: ' + profile.getId()); 
//    console.log('Name: ' + profile.getName());
//    console.log('Image URL: ' + profile.getImageUrl());
//    console.log('Email: ' + profile.getEmail()); 
//    }

//    function signOut() {
//     var auth2 = gapi.auth2.getAuthInstance();
//     auth2.signOut().then(function () {
//       console.log('User signed out.');
//     });
//   }

// Username checker

$(document).ready(function() {
	var x_timer; 	
	$("#rusername").keyup(function (e){
		clearTimeout(x_timer);
		var user_name = $(this).val();
		x_timer = setTimeout(function(){
			check_username_ajax(user_name);
		}, 1000);
	});	

function check_username_ajax(username){
	$("#user-result").html('<img src="images/ajax-loader.gif" />');
	$.post('username-checker.php', {'username':username}, function(data) {
	  $("#user-result").html(data);
	});
}
});

</script>
</head>

<body>
<div class="preloader" id="preloader">
<?php require 'svg.php';?>

</div>


<!-- <video autoplay loop id="myVideo">
         <source src="videos/login.mp4" type="video/mp4">
         </video> -->


 <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1>Login</h1>
						 </div>
               </div>
               <?php if($_GET) 
                    echo $_GET['error'];
                   
                  unset($_GET['error']);
                   ?>
                     
                   <form action="login.php" method="post" name="login">
                           <div class="form-group">
                              <!-- <label for="exampleInputEmail1">Username or Email </label> -->
                              <input type="text" name="username"  class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Username or Email">
                           </div>
                           <div class="form-group">
                              <!-- <label for="exampleInputEmail1">Password</label> -->
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="form-group">
                              <p class="text-center">By signing up you accept our <a href="#">Terms Of Use</a></p>
                           </div>
                           <div class="col-md-12 text-center ">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 <span class="span-or">or</span>
                              </div>
                           </div>
                           <!-- <div class="col-md-12 mb-3">
                              <p class="text-center">
                                 <div class="g-signin2" data-width="250" data-longtile="true" data-onsuccess="onSignIn"></div>
                                 <a  href="#" onclick="onSignIn()"  class="google btn mybtn"><i class="fa fa-google-plus">
                                 </i> Signup using Google
                                 </a>
                              </p>
                           </div> -->
                           <div class="form-group">
                              <p class="text-center">Don't have account? <a href="#" onclick='callsignup()' id="signup">Sign up here</a></p>
                           </div>
                        </form>
                 
				</div>
			</div>
			  <div id="second">
			      <div class="myform form ">
                        <div class="logo mb-3">
                           <div class="col-md-12 text-center">
                              <h1 >Signup</h1>
                           </div>
                        </div>
                        <form action="register.php" method="post" name="registration">
                           <div class="form-group">
                              <!-- <label for="exampleInputEmail1">First Name</label> -->
                              <input type="text"  name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter Firstname">
                           </div>
                           <div class="form-group">
                              <!-- <label for="exampleInputEmail1">Last Name</label> -->
                              <input type="text"  name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Enter Lastname">
                           </div>
                           <div class="form-group">
                              <!-- <label for="exampleInputEmail1">User Name</label> -->
                              <input type="text"  name="rusername" class="form-control" id="rusername" aria-describedby="emailHelp" placeholder="Enter User Name">
                              <span id="user-result"></span>
                           </div>                           
                           <div class="form-group">
                              <!-- <label for="exampleInputEmail1">Email address</label> -->
                              <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <!-- <label for="exampleInputEmail1">Password</label> -->
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="form-group">
                              <!-- <label for="exampleInputEmail1">Mobile Number</label> -->
                              <input type="tel" name="number" id="number"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Mobile Number">
                           </div>
                           <div class="col-md-12 text-center mb-3">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Sign Up</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="form-group">
                                 <p class="text-center"><a href="#" onclick='callsignin()'id="signin">Already have an account?</a></p>
                              </div>
                           </div>
                            </div>
                        </form>
                     </div>
			</div>
		</div>
      </div>   
<script>    
//rebuild url for get

   if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", "index.php");
    }

// //preloader
// $(document).ready(function() {
// $(window).on("load", function() {
// preloaderFadeOutTime = 500;
// function hidePreloader() {
// var preloader = $('.preloader');
// preloader.fadeOut(preloaderFadeOutTime);
// }
// hidePreloader();
// });
// });

</script>
<script language="javascript" type="text/javascript">
     $(window).load(function() {
     $('#preloader').hide();
  });
</script>
</body>
</html>