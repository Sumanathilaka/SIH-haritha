<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>