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
<!-- for Location -->
   <script src="js/location.js"> </script>
</head>

<body>
<div class="preloader" id="preloader">
<?php require 'svg.php';?>
</div>

<video autoplay loop id="myVideo">
         <source src="videos/login.mp4" type="video/mp4">
         </video>

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
                              <input type="text"  name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name">
                           </div>
                           <div class="form-group">
                              <input type="text"  name="rusername" class="form-control" id="rusername" aria-describedby="emailHelp" placeholder="Enter Username">
                              <span id="user-result"></span>
                           </div>                           
                           <div class="form-group">
                              <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="form-group">
                              <input type="tel" name="number" id="number"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Mobile Number">
                           </div>
                           <div class="form-group">
                              <div class="row">
                              <div class="col-md-6 text center">
                              <input type="text" name="address" id="address"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Door No. / Street">
                              </div>
                              <div class="col-md-6 text center">
                              <input type="text" name="city" id="city"  class="form-control" aria-describedby="emailHelp" placeholder="City/District/Town">
                              </div>
                           </div>
                           </div>
  
                           <div class="form-group">
                              <div class="row">
                              <div class="col-md-4 text center">
                              <input type="text" name="pincode" id="pincode" class="form-control" aria-describedby="emailHelp" placeholder="Pincode">
                              </div>                              
                              <div class="col-md-4 text center">
                              <input type="text" name="state" id="state"  class="form-control" aria-describedby="emailHelp" placeholder="State">
                              </div>                              
                              <div class="col-md-4 text center">
                              <input type="text" name="country" id="country"  class="form-control" aria-describedby="emailHelp" placeholder="Country">
                              </div>                              
                           </div>
                           </div>
                           <div class="form-group">
                              <div class="row">
                              <div class="col-md-6 text center">
                              <input type="text" name="location" id="location"  class="form-control" aria-describedby="emailHelp" placeholder="Location">
                              </div>
                              <div class="col-md-6 text center">
                              <button type="button" onclick="getLocation()" class="btn btn-outline-info">Get location
                                 <i class="fa fa-map-marker"></i>
                              </button>
                              </div>
                               <p id="error" style="color:red;"></p>
                           </div>
                           <input type="hidden" name="latitude" id="latitude">
                           <input type="hidden" name="longitude" id="longitude">

                        </div>
                           <div class="col-md-12 text-center mb-3">
                              <button type="submit"  class=" btn btn-block mybtn btn-primary tx-tfm">Sign Up</button>
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
</script>


<script language="javascript" type="text/javascript">

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


     $(window).load(function() {
     $('#preloader').hide();
  });
</script>

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
          name: "required",
          rusername:  "required",
          location: "required",
          number:"required",
          city: "required",
          pincode:"required",
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
          name: "Please enter your name",
          rusername : "Please enter username",
          location : "Please give location",
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

</body>
</html>