<?php
$email = $_GET['v'];
?>
<html>
<head>
    <title>Welcome new User</title>
    <link rel="stylesheet" type="text/css" href="welcome_new_users.css">
</head>
<body>
    <div class = "bg-image"></div>
    <div class = "bg-text">
      <h1 class= "user-message">Registered Successfully. We are ready to serve you!!!
      </h1>
    <a href="#" onclick="window.location.href='subjects.php?v=<?php echo $email ?>'">Next</a>
    </div>
      
</body>
    
</html>